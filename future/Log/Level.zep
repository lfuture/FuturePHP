namespace Future\Log;

class Level
{
    const EMERGENCY = 0;
    const CRITICAL = 1;
    const ALERT = 2;
    const ERROR = 3;
    const WARNING = 4;
    const NOTICE = 5;
    const INFO = 6;
    const DEBUG = 7;

    protected static levelMap = [
    0:"EMERGENCY",
    1:"CRITICAL",
    2:"ALERT",
    3:"ERROR",
    4:"WARNING",
    5:"NOTICE",
    6:"INFO",
    7:"DEBUG"
    ];

    public static function getLevelName(int! level) -> string
    {
        return self::levelMap[level];
    }
}