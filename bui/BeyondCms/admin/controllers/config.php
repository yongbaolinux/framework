<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 系统配置控制器
 */
class config extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('common_func');
        $this->load->library('session_');
        $this->admin_res = base_url().'admin_res/';                 //后台资源存放路径(js css images)
        if(!$this->session_->getSession('admin.login')){
            redirect('admin/login','location');
        }
    }
    
    /**
     * 基础配置
     */
    public function baseConfig(){
        $config = json_encode($this->db->query("SELECT * FROM `bd_config`")->result_array());
        $this->load->view('baseConfig',array('config'=>$config,'PUBLIC'=>$this->admin_res));
    }
    
    /**
     * ajax方式删除配置项
     * 一次删除一个和多个配置项均使用该方法
     */
    public function ajaxDelConfigs(){
        if(isAjax()){
            
        } else {
            exit(json_encode(array('code'=>-100,'msg'=>'非法访问')));
        }
    }
}
?>
