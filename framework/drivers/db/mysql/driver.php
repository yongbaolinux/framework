<?php   if ( ! defined('DRPATH')) exit('访问错误');
/**
 * mysql??????
 */
class drivers_db_mysql_driver extends core_db{
    private $connetid;      //数据库连接句柄
    
    public function __construct(){
        parent::__construct();
        if(core_common::is_empty($this->connetid) || !is_resource($this->connetid)){
            if(intval($this->dbpconnect)){
                $this->connetid = @mysql_pconnect($this->dbhost.":".$this->dbport,$this->dbusername,$this->dbpassword);

            } else {
                $this->connetid = @mysql_connect($this->dbhost.":".$this->dbport,$this->dbusername,$this->dbpassword);
            }
            if(!$this->connetid){
                $error_msg = '数据库连接错误'.mysql_errno().'-'.iconv('gbk','utf-8',mysql_error());
                core_log::getInstance()->write_log($error_msg);
                throw new Exception($error_msg);
            } else {
                if(mysql_select_db($this->dbname) === false){
                    core_log::getInstance()->write_log('??????????,????????????????');
                    //throw new Exception('??????????,????????????????');
                }
                if(mysql_set_charset($this->dbcharacter) === false){
                    //throw new Exception('??????????????');
                    core_log::getInstance()->write_log('??????????????');
                }
            }
        }
    }
    
    public function _query($sql){
        if(core_common::is_empty($sql)){
            throw new Exception('SQL????????');
        } else {
            $sql = $this->_filter_sql($sql);
            return $this->_fetch_result(mysql_query($sql,$this->connetid));
        }
    }
    
    /**
     * SQL???????
     * @param string $sql
     * @return string 
     */
    private function _filter_sql($sql=''){
        //TODO
    }
    
    /**
     * ?????????SQLs ???????
     * @param array $sqls
     * @return array
     */
    public function _filter_sqls($sqls=array()){
        //TODO
    }
    
    /**
     * Mysql????????
     * @param resource or boolean $res
     * @return array
     */
    private function _fetch_result($res){
        //core_common::dump($res);
        if(is_resource($res)){
            while($row = mysql_fetch_array($res,MYSQL_ASSOC)){
                $result['result'][] = $row;
            }
            $result['count'] = mysql_num_rows($res);        //select????????????
        } elseif ($res === true) {      //INSERT UPDATE DELETE
            $result['result'] = true;
            $result['count'] = mysql_affected_rows($this->connetid);
        } else {
            $result['result'] = false;
            $result['count'] = null;
        }
        return $result;
    }
    
    /**
     * ??????????
     * @param array $sqls ???????????????SQL???
     */
    public function _transaction($sqls){
        //$sqls = $this->_filter_sqls($sqls);
        mysql_query("SET AUTOCOMMIT=0");
        mysql_query("BEGIN");
        foreach ($sqls as $sql){
            $res = $this->_query($sql);
            if($res['result'] === false){
                mysql_query("ROLLBACK");
            }
        }
        mysql_query("COMMIT");
    }
    
    /**
     * 锁表底层方法
     */
     public function _lock($tableName,$flag){
         if($flag){
             if(mysql_query("LOCK TABLES `".$tableName."` READ") === false) {
                 $php_errormsg = "SQL语句执行错误:" . mysql_errno() . "-" . mysql_error();
                 
             }
         } else {
             mysql_query("LOCK TABLES `".$tableName."` WRITE");
         }
     }
     
     /**
      * 解锁表底层方法
      */
     public function _unlock(){
         mysql_query("UNLOCK TABLES");
     }
}
?>