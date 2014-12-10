<?php   if(!defined('DRPATH')) exit('访问错误');
/**
 * 将会话存入数据库
 * @author yongbaolinux
 * 2014-12-10
 */
class drivers_session_dbHandler{
    private $tableName;
    private $gc_maxlifetime;
    public function __construct(){
        $this->tableName = core_config::getInstance()->get_config('session','table_name');
        $this->gc_maxlifetime = @ini_get('session.gc_maxlifetime');
    }
    public function open($savePath,$sessionName){
        
    }
    
    public function close(){
        
    }
    
    public function read($sess_id){
        core_db::getInstance()->query("SELECT * FROM `{$this->tableName}` WHERE `sess_id`='".$sess_id."' AND `sess_expire` >".time());
    }
    
    public function write($sess_id,$sess_data){
        $expire = time() + $this->gc_maxlifetime;
        $exist = core_db::getInstance()->query("SELECT COUNT(*) as count FROM `{$this->tableName}` WHERE `sess_id`='".$sess_id."'");

        if($exist['result'][0]['count'] > 0){
            core_db::getInstance()->query("UPDATE `{$this->tableName}` SET `sess_data`='".$sess_data."' WHERE `sess_id`='".$sess_id."'");
        } else {
            //$sql = "INSERT INTO `{$this->tableName}`(`sess_id`,`sess_data`,`sess_expire`) VALUES('".$sess_id."','".$sess_data."','".$expire."')";
            //echo $sql;
            core_db::getInstance()->query("INSERT INTO `{$this->tableName}`(`sess_id`,`sess_data`,`sess_expire`) VALUES('".$sess_id."','".$sess_data."','".$expire."')");
        }
    }
    
    public function destroy($sess_id){
        core_db::getInstance()->query("DELETE FROM {$this->tableName} WHERE `sess_id`='".$sess_id."'");
    }
    
    public function gc(){
        core_db::getInstance()->query("DELETE FROM {$this->tableName} WHERE `sess_expire` < ".time());
    }
}
?>
