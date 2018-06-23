namespace Future\Log;

class Message
{
    protected message {get};
    protected level {get};
    protected time {get};
    protected context {get};
    protected extra {get};
    public function __construct(int! level, string! message, float! time, array! context, array! extra = [])
    {
        let this->message = message,
            this->level = level,
            this->time = time,
            this->context = context,
            this->extra = extra;
    }
}