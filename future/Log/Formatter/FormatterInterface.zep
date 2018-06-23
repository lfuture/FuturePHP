namespace Future\Log\Formatter;

interface FormatterInterface
{
    public function format(array message) -> string | array;

    public function interpolate(string message, var context = null) -> string;
}