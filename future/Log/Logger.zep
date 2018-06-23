namespace Future\Log;

use Future\Log\Adapter\AdapterInterface;
use Future\Log\Level;
use Future\Log\Exception;
use Future\Log\Message;

class Logger
{
    protected loggerName {get};

    protected adapters = [];

    protected static timezone;

    protected name {get, set};

    protected processors = [];

    protected transaction = false;

    protected queue = [];

    public function __construct(string! name, array! handlers = [], array! processors = [])
    {
        let this->name = name,
            this->handlers = handlers,
            this->processors = processors;
    }

    public function pushAdapter(<AdapterInterface> adapter) -> <Logger>
    {
        let this->adapters[] = adapter;
        return this;
    }

    public function popAdapter() -> <AdapterInterface> | null
    {
        var adapter = array_shift(this->adapters);
        return adapter;
    }

    public function setAdapters(array! adapters) -> <Logger>
    {
        let this->adapters = array_values(adapters);
        return this;
    }

    public function geAdapters() -> array
    {
        return this->adapters;
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

    public function log(int! level, var message, array! context = []) -> <Logger>
    {
        this->write(level, message, microtime(true), context);
        return this;
    }

    public function debug(var message, array! context = []) -> <Logger>
    {
        this->write(Level::DEBUG, message, microtime(true), context);
        return this;
    }

    public function error(var message, array! context = []) -> <Logger>
    {
        this->write(Level::ERROR, message, microtime(true), context);
        return this;
    }

    public function info(var message, array! context = []) -> <Logger>
    {
        this->write(Level::INFO, message, microtime(true), context);
        return this;
    }

    public function notice(var message, array! context = []) -> <Logger>
    {
        this->write(Level::DEBUG, message, microtime(true), context);
        return this;
    }

    public function warning(var message, array! context = []) -> <Logger>
    {
        this->write(Level::WARNING, message, microtime(true), context);
        return this;
    }

    public function alert(var message, array! context = []) -> <Logger>
    {
        this->write(Level::ALERT, message, microtime(true), context);
        return this;
    }

    public function critical(var message, array! context = []) -> <Logger>
    {
        this->write(Level::CRITICAL, message, microtime(true), context);
        return this;
    }

    public function emergency(var message, array! context = []) -> <Logger>
    {
        this->write(Level::EMERGENCY, message, microtime(true), context);
        return this;
    }

    protected function write(int! level, var messageString, float! time, array! context, array! extra = [])
    {
        if this->transaction {
            let this->queue[] = new Message(level, messageString, time, context, extra);
            return;
        }
        var adapter, processor, levelName = Level::getLevelName(level);
        var message = [
            "message":messageString,
            "level": level,
            "levelName": levelName,
            "module": this->name,
            "time": time,
            "context": context,
            "extra": extra
        ];

        for processor in this->processors {
            let message = call_user_func(processor, message);
        }

        for adapter in this->adapters {
            call_user_func([adapter, "handle"], message);
        }
    }

    public function begin() -> <AdapterInterface>
    {
        let this->transaction = true;
        return this;
    }

    public function commit() -> <AdapterInterface>
    {
        var message;
        if !this->transaction {
            throw new Exception("There is no active transaction");
        }
        let this->transaction = false;

        for message in this->queue {
            this->write(
                message->getLevel(),
                message->getMessage(),
                message->getTime(),
                message->getContext(),
                message->getExtra()
            );
        }
        let this->queue = [];
        return this;
    }

    public function rollback() -> <AdapterInterface>
    {
        if !this->transaction {
            throw new Exception("There is no transaction need rollback");
        }
        let this->transaction = false,
            this->queue = [];

        return this;
    }

    public function isTransaction() -> boolean
    {
        return this->transaction;
    }

    public function withName(string! name) -> <Logger>
    {
//        var logger = clone this;
//        logger->setName(name);
//        return logger;
    }

}