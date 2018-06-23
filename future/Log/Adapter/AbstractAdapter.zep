namespace Future\Log\Adapter;

use Future\Log\Level;
use Future\Log\Adapter\AdapterInterface;
use Future\Log\Formatter\FormatterInterface;
use Future\Log\Exception;

abstract class AbstractAdapter implements AdapterInterface
{
    protected level = Level::DEBUG;
    protected formatter;
    protected processors = [];

    public function setLogLevel(int! level) -> <AdapterInterface>
    {
        let this->level = level;
        return this;
    }
    public function getLogLevel() -> int
    {
        return this->level;
    }

    public function setFormatter(<FormatterInterface> formatter) -> <AdapterInterface>
    {
        let this->formatter = formatter;
        return this;
    }

    public function getFormatter() -> <FormatterInterface>
    {
        return this->formatter;
    }

    public function handle(array! message)
    {
        if !this->isHandling(message) {
            return false;
        }

        let message = this->processMessage(message);
        let message["formatted"] = this->getFormatter()->format(message);
        this->write(message);
    }

    abstract public function isHandling(array message);

    abstract protected function write(array message);

    public function processMessage(array! message) -> array
    {
        var processor;
        for processor in this->processors {
            let message = call_user_func(processor, message);
        }
        return message;
    }

    public function pushProcessor(object processor) -> <Logger>
    {
        if !is_callable(processor) {
            throw new Exception("processor must be valid callables " . var_export(processor, true));
        }
        array_unshift(this->processors, processor);
        return this;
    }

    public function popProcessor() -> <ProcessorInterface>
    {
        return array_shift(this->processors);
    }

    public function setProcessor(array! processors) -> <Logger>
    {
        let this->processors = processors;
        return this;
    }

    public function getProcessor()
    {
        return this->processors;
    }
}