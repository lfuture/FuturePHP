namespace Future\Log;


class Log
{
    protected static loggers = [];

    public static function getLogger(string! module = "default", string! channel = "")
    {
        if !isset self::loggers[module] {
            var logger = self::createLogger("");
            let self::loggers[module] = logger;
        }

        return self::loggers[module];
    }

    public static function channel()
    {

    }

    public static function createLogger(string! name)
    {
        return "asdf";
    }

}