<?php   if ( ! defined('DRPATH')) exit('访问错误');
/**
 * mysql底层驱动类
 */
class drivers_db_mysql_driver extends core_db{
    private $connetid;      //数据库连接句柄  若刷新脚本 数据库的连接采取长连接 这个连接是可以复用 但是这个PHP资源变量已经被重新赋值
    
    public function __construct(){
        parent::__construct();
        if(core_common::is_empty($this->connetid) || !is_resource($this->connetid)){
            if(intval($this->dbpconnect)){
                $this->connetid = @mysql_pconnect($this->dbhost.":".$this->dbport,$this->dbusername,$this->dbpassword);

            } else {
                $this->connetid = @mysql_connect($this->dbhost.":".$this->dbport,$this->dbusername,$this->dbpassword);
            }
            if(!$this->connetid){
                $php_errormsg = '数据库连接错误'.mysql_errno().'-'.iconv('gbk','utf-8',mysql_error());
                core_log::getInstance()->write_log($error_msg);
                throw new Exception($error_msg);
            } else {
                if(mysql_select_db($this->dbname) === false){
                    core_log::getInstance()->write_log('选择数据库失败,请检查该数据库是否存在');
                    //throw new Exception('选择数据库失败,请检查该数据库是否存在');
                }
                if(mysql_set_charset($this->dbcharacter) === false){
                    core_log::getInstance()->write_log('设置客户端字符集失败');
                    //throw new Exception('设置客户端字符集失败');
                }
            }
        }
    }
    
    public function _query($sql){
        if(core_common::is_empty($sql)){
            throw new Exception('SQL不能为空');
        } else {
            $sql = $this->_filter_sql($sql);
            return $this->_fetch_result(mysql_query($sql,$this->connetid));
        }
    }
    
    /**
     * SQL
     * @param string $sql
     * @return string 
     */
    private function _filter_sql($sql=''){
        //TODO
        return $sql;
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
     * 对mysql返回的结果资源进行处理
     * @param resource or boolean $res
     * @return array
     */
    private function _fetch_result($res){
        //core_common::dump($res);
        if(is_resource($res)){
            while($row = mysql_fetch_array($res,MYSQL_ASSOC)){
                $result['result'][] = $row;
            }
            $result['count'] = mysql_num_rows($res);        //SELECT SHOW DESCRIBE EXPLAIN 
        } elseif ($res === true) {      //INSERT UPDATE DELETE DROP
            $result['result'] = true;
            $result['count'] = mysql_affected_rows($this->connetid);
        } else {
            $result['result'] = false;
            $result['count'] = null;
        }
        return $result;
    }
    
    /**
     * mysql事务处理底层方法
     * @param array $sqls 数组形式的SQL语句
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
             $res = mysql_query("LOCK TABLES `".$tableName."` READ");
         } else {
             $res = mysql_query("LOCK TABLES `".$tableName."` WRITE");
         }
         if($res === false){
             core_common::print_sql_error();
         } else {
             core_log::getInstance()->write_log("{$tableName}表:锁表成功");
         }
     }
     
     /**
      * 解锁表底层方法
      * 不要相信什么脚本退出后被锁住的表会自动解锁之类的bullshit
      * 你不知道脚本到底会不会在后台退出 也不知道与mysql的连接是否会断开
      * 所以在应用程序中最好让unlock和lock成对使用
      * 查看mysql表锁定状态:show open tables where in_use > 0;
      * 查看mysql连接数状态:show processlist;
      * 关闭 mysql 连接: kill 连接id;
      * unlock tables只能释放 当前连接获取的锁 不能释放其他会话的锁
      */
     public function _unlock(){
         $res = mysql_query("UNLOCK TABLES");
         if($res === false){
             core_common::print_sql_error();
         } else {
             core_log::getInstance()->write_log("解锁成功");
         }
     }
     
     /**
      * 返回当前连接资源中的最后一条insert_id
      * 刷新脚本后 该值会丢失 因为连接资源已被重置
      */
     public function _insert_last_id(){
         return mysql_insert_id($this->connetid);
     }
}
?>