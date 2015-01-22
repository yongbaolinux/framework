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
        $configResource = $this->db->query("SELECT * FROM `bd_config`");
        $config = json_encode($configResource->result_array());
        
        $this->load->view('baseConfig',array('CONFIG'=>$config,'PUBLIC'=>$this->admin_res));
    }
}
?>
