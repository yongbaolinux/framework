<?php if(!defined('DRPATH')) exit('非法访问');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/11/25
 * Time: 12:25
 */
class core_log extends core_base{
    private  $_log_save_path;         //用文件存放日志时    日志文件的存放路径
    private  $_log_level;           //日志记录级别 安全级别高于此值的日志将不会被记录
    private  $_log_format;
    private  $_log_save_type;       //日志记录类型 可选：数据库 文件 缓存
    private  $_log_save_allowed_type=array('file','db','socket');    //所允许的记录类型
    private $LEVEL_MAP = array(
        'NONE'=>0,
        'ERROR'=>1,
        'WARNING'=>2,
        'PARSE'=>3,
        'NOTICE'=>4,
        'STRICT'=>5,
        'ALL'=>6
);

    /**
     * @param string $type 必须 记录日志的介质
     * @param array $params 必须 对应的配置信息
     * @param int $log_level  选填 默认是1
     */
    public function __construct(){
        //parent::__construct();
        //$this->parse_params($type,$params);
        //$this->_log_save_type = $type;
        //$this->_log_level = $log_level;
        //$this->_log_format = $log_format;
    }

    /**
     *  类的初始函数
     *  TODO 如果参数缺失 就从配置文件中读取 暂时用字面值代替
     */
    public function __initialize(){
        /*$type = (@func_get_arg(0)) ? @func_get_arg(0) : 'file';
        $params = (@func_get_arg(1)) ? @func_get_arg(1) : array();
        $log_format = (@func_get_arg(2)) ? @func_get_arg(2) : 'Y-m-d H:i:s';
        $log_level = (@func_get_arg(3)) ? @func_get_arg(3) : 1;
        $this->parse_params($type,$params);
        $this->_log_save_type = $type;
        $this->_log_level = $log_level;
        $this->_log_format = $log_format;*/
        $log_config = core_config::getInstance()->get_config('log');
        $this->parse_params($log_config);

    }
    /**
     * 解析参数 分析其准确性
     * @param $type
     * @param $params
     * @throws Exception
     */
    private function parse_params($config){
        if(is_string($config['type']) && !empty($config['type']) && in_array($config['type'],$this->_log_save_allowed_type)){
                switch ($config['type']) {
                    case 'file':
                        if(is_string($config['path']) && is_dir($config['path']) && is_writeable($config['path'])){
                            $this->_log_save_path = $config['path'];
                        } else{
                            try {
                                throw new Exception('日志记录配置参数错误 必须为已存在的目录 若不存在 请手动创建 并且需要可写权限');
                            }catch (Exception $e){
                                core_common::print_exception($e);       //不能使用print_exception_log 因为会无限异常
                            }
                        }
                        break;
                    case 'db':
                        break;
                    case 'socket':
                        break;
                    default:
                        break;
                }
                $this->_log_save_type = $config['type'];
                $this->_log_format = $config['format'];
                $this->_log_level = $config['level'];
        } else{
            throw new Exception('日志记录类型错误');
        }
    }

    /**
     * 记录日志统一入口方法
     * @param $msg
     * @param string $error
     */
    public function write_log($msg,$error='ERROR'){
        $error = strtoupper($error);
        if(!isset($this->LEVEL_MAP[$error])){
            throw new \Exception('日志错误等级未定义');
        }
        if($this->LEVEL_MAP[$error] > $this->_log_level){
            echo $this->LEVEL_MAP[$error];
            echo $this->_log_level;
            return;
        }
        switch($this->_log_save_type){
            case 'file':
                return $this->write_log_to_file($msg);
                break;
            case 'db':
                break;
            case 'socket':
                break;
            default:
                break;
        }
    }

    /**
     * 将日志写入文件中
     * 一个文件可以存放一天或一段时间的日志
     * 数据库就只能一条记录一条记录地存放
     * @param string $msg 要记录的信息
     */
    private function write_log_to_file($msg){
            //生成文件名 按天存放日志记录
            $time = time();
            $fileName = date('Y-m-d',$time);
            $filePath = $this->_log_save_path.$fileName.'.log';
            if(is_file($filePath)){
                //如果日志文件存在 直接写日志文件
                $content = '['.date($this->_log_format,$time).']'.$msg."\r\n";
                $fp = fopen($filePath,'a');
                if($fp){
                    flock($fp,LOCK_EX);
                    $result = fwrite($fp,$content);
                    flock($fp,LOCK_UN);
                    fclose($fp);
                    return $result;
                } else {
                    throw new \Exception('打开文件失败');
                }
            } else {
                //不存在就创建该文件
                $content = '['.date($this->_log_format,$time).']'.$msg;
                try{
                    file_put_contents($filePath,$content);
                } catch(Exception $e){
                    echo $e->getMessage();
                }
            }
    }

}
?>