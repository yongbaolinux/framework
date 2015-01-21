<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 系统配置
 */
class config extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('common_func');
        $this->load->library('session_');
        if(!$this->session_->getSession('admin.login')){
            redirect('admin/login','location');
        }
    }
    
    /**
     * 基础配置
     */
    public function baseConfig(){
        
        $this->load->view('baseConfig');
    }
}
?>
