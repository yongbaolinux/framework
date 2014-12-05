<?php   if ( ! defined('DRPATH')) exit('访问错误');
/**
 * mysql的底层驱动
 */
class drivers_db_mysql_driver extends drivers_db_base{
    private $connetid;      //数据库连接句柄
    
    public function __construct(){
        parent::__construct();
        if(core_common::is_empty($this->connetid) || !is_resource($this->connetid)){
            if(intval($this->dbpconnect)){
                $this->connetid = mysql_pconnect($this->dbhost.":".$this->dbport,$this->dbusername,$this->dbpassword);
            } else {
                $this->connetid = mysql_connect($this->dbhost.":".$this->dbport,$this->dbusername,$this->dbpassword);
            }
            if(!$this->connetid){
                core_log::getInstance()->write_log(mysql_error());
            }
        }
    }
    
    public function query(){
        
    }
}
?>