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
        
    }
}
?>