namespace Future\Log\Adapter;

use Future\Log\Formatter\FormatterInterface;

interface AdapterInterface
{
    public function setLogLevel(int! level) -> <AdapterInterface>;
    public function getLogLevel() -> int;

    public function setFormatter(<FormatterInterface> formatter) -> <AdapterInterface>;
    public function getFormatter() -> <FormatterInterface>;
}