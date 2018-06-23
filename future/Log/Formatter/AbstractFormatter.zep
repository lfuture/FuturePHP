namespace Future\Log\Formatter;

use Future\Log\Formatter\FormatterInterface;

abstract class  AbstractFormatter implements FormatterInterface
{
    public function interpolate(string message, var context = null) -> string
	{
		var replace, key, value;

		if typeof context == "array" && count(context) > 0 {
			let replace = [];
			for key, value in context {
				let replace["{" . key . "}"] = value;
			}
			return strtr(message, replace);
		}
		return message;
	}
}