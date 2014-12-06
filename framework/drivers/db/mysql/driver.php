<?php   if ( ! defined('DRPATH')) exit('访问错误');
/**
 * mysql的底层驱动
 */
class drivers_db_mysql_driver extends core_db{
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
            } else {
                if(mysql_select_db($this->dbname) === false){
                    throw new Exception('选择数据库失败,请确认该数据库是否存在');
                }
                if(mysql_set_charset($this->dbcharacter) === false){
                    throw new Exception('设置客户端字符集失败');
                }
            }
        }
    }
    
    public function _query($sql){
        if(core_common::is_empty($sql)){
            throw new Exception('SQL语句不能为空');
        } else {
            $sql = $this->_filter_sql($sql);
            return $this->_fetch_result(mysql_query($sql,$this->connetid));
        }
    }
    
    /**
     * SQL安全处理
     * @param string $sql
     * @return string 
     */
    private function _filter_sql($sql=''){
        //TODO
    }
    
    /**
     * 数组形式的SQLs 安全处理
     * @param array $sqls
     * @return array
     */
    public function _filter_sqls($sqls=array()){
        //TODO
    }
    
    /**
     * Mysql查询结果处理
     * @param resource or boolean $res
     * @return array
     */
    private function _fetch_result($res){
        //core_common::dump($res);
        if(is_resource($res)){
            while($row = mysql_fetch_array($res,MYSQL_ASSOC)){
                $result['result'][] = $row;
            }
            $result['count'] = mysql_num_rows($res);        //select语句返回了多少行
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
     * 事务处理底层方法
     * @param array $sqls 数组形式的待执行的SQL语句
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
     * 锁表处理底层方法
     */
     public function _lock($tableName,$flag){
         if($flag){
            mysql_query("LOCK TABLES `".$tableName."` READ");
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