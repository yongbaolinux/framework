<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
    
    private $admin_res;
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('common_func');
        $this->load->library('session_');
        $this->admin_res = base_url().'admin_res';
    }
    
    /**
     * 显示注册会员列表
     */
    public function userList(){
        
    }
}
?>
