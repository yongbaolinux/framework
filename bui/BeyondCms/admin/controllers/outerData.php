<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 该控制器处理从外部导入数据的一些操作
 * @author yongbaolinux@gmail.com
 */
class outerData extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session_');
        $this->load->helper('url');
        $this->load->helper('common_func');
        $this->admin_res = base_url().'admin_res/';
        if(!$this->session_->getSession('admin.login')){
            redirect('admin/login','location');
        }
    }
    
    public function index(){
        
    }
    
    /**
     * 导入外部文章数据页面
     */
    public function importArticles(){
        //查询当前使用的数据库名
        $dbName = $this->db->query("SELECT DATABASE() AS dbname");
        $dbName = $dbName->result_array();
        $dbName = $dbName[0]['dbname'];
        //查询当前数据库里所有的表
        $tableNames_ = $this->db->query("SHOW TABLES");
        $tableNames_ = $tableNames_->result_array();
        $tableNames = array();
        foreach($tableNames_ as $tb){
            $tableNames[] = $tb['Tables_in_'.$dbName];
        }
        $this->load->view('importArticles.php',array('PUBLIC'=>$this->admin_res,'tables'=>$tableNames));
    }
    
    /**
     * 执行导入动作
     */
    public function doImportArticles(){
        $map = $this->input->post('map');
        $jsonFileName = $this->input->post('jsonFileName');
        $tableName = $this->input->post('tableName');
        //根据映射组装入库操作的SQL
        $fields = array();              //新字段到旧字段的映射
        if(count($map) >0 && is_array($map)){
            foreach($map as $v){
                $fields[$v['old_field_name']] = '`'.$v['new_field_name'].'`';
            }
        }
        $fields_str = implode(',',$fields);
        //VALUES 读取上传的json数据
        $jsonPath = rtrim($_SERVER['DOCUMENT_ROOT'],'/').'/framework/data/'.$jsonFileName;
        $jsonData = file_get_contents($jsonPath);
        $jsonArr = json_decode($jsonData,true);
        if(is_array($jsonArr) && count($jsonArr) > 0){
            $temps = array();                   //存放所有要入库的字段的值 诸如这样的形式  (a,b,c,c),(,,,)
            foreach ($jsonArr as $v){
                $temp = array();                //存放一个单位要入库的字段的值 诸如这样的形式(a,b,c)
                foreach($fields as $key=>$value){
                    if(array_key_exists($key, $v)){
                        $temp[] = '"'.addslashes($v[$key]).'"';
                    } else {
                        $temp[] = '';
                    }
                }
                $temp = implode(',', $temp);
                $temps[] = $temp;
            }
            $insert_fields = implode(',', $fields);
            $insert_values = implode('),(', $temps);
            $insert_sql = "INSERT INTO `".$tableName."`(".$insert_fields.") VALUES(".$insert_values.")";
            $insert_result = $this->db->query($insert_sql);
            echo $insert_result;
            unlink($jsonPath);
        }
    }
}
?>