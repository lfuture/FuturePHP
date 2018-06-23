namespace Future\Log\Processor;

use Future\Log\Processor\ProcessorInterface;

class UidProcessor implements ProcessorInterface
{
    private uid;
    public function __construct()
    {
        let this->uid = uniqid("", true);
    }
    public function __invoke(array! message)
    {
        let message["extra"]["uid"] = this->uid;
    }
}