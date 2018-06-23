namespace Future\Log\Adapter;

use Future\Log\Exception;
use Future\Log\Formatter\LineFormatter;

class FileAdapter extends AbstractAdapter
{
    protected filePath;

    public function __construct(string! filePath)
    {
        let this->filePath = filePath;
    }

    public function write(array! message)
    {
        var handler;
        var file = rtrim(this->filePath, "/");
        let handler = fopen(file, "a");
        if typeof handler != "resource" {
            throw new Exception("Can't open log file '" . file . "'");
        }
        fwrite(handler, message["formatted"]);
        fclose(handler);
    }
    public function isHandling(array message) -> boolean
    {
        return message["level"] <= this->level;
    }

    public function getFormatter() -> <FormatterInterface>
    {
        if empty this->formatter {
            let this->formatter = new LineFormatter();
        }
        return this->formatter;
    }
}