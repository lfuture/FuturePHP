namespace Future\Log\Formatter;

use Future\Log\Formatter\AbstractFormatter;

class LineFormatter extends AbstractFormatter
{
    protected template = "[%date%] [%levelName%] %message%" {get, set};
    protected dateFormat = "Y-m-d H:i:s";

    public function format(array message) -> string | array
    {
        var format = this->template;
        if memstr(format, "%date%") {
			let format = str_replace("%date%", date(this->dateFormat, message["time"]), format);
		}

		if memstr(format, "%levelName%") {
			let format = str_replace("%levelName%", message["levelName"], format);
		}

		let format = str_replace("%message%", message["message"], format) . PHP_EOL;

		if typeof message["context"] === "array" {
			return this->interpolate(format, message["context"]);
		}

		return format;
    }

}