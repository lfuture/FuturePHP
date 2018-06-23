namespace Future\Log;

interface LoggerInterface
{
    public function log(int! level, var message, array! context = []) -> <AdapterInterface>;
    public function debug(var message, array! context = []) -> <AdapterInterface>;
    public function error(var message, array! context = []) -> <AdapterInterface>;
    public function info(var message, array! context = []) -> <AdapterInterface>;
    public function notice(var message, array! context = []) -> <AdapterInterface>;
    public function warning(var message, array! context = []) -> <AdapterInterface>;
    public function alert(var message, array! context = []) -> <AdapterInterface>;
    public function critical(var message, array! context = []) -> <AdapterInterface>;
    public function emergency(var message, array! context = []) -> <AdapterInterface>;

}