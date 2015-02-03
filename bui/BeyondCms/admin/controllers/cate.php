<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cate extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();                                    //连接数据库
        $this->load->library('session_');                           //载入会话函数库
        $this->load->helper('url');
        $this->load->helper('common_func');
        $this->admin_res = base_url().'admin_res/';                 //后台资源存放路径(js css images)
        $this->cur_controller = base_url().'system.php/Content';    //当前控制器路径
        if(!$this->session_->getSession('admin.login')){
            redirect('admin/login','location');
        }
    }
    
    /**
     * 分类列表
     */
    public function catesList(){
        $categories = json_encode($this->db->query("SELECT * FROM `bd_category`")->result_array());
        
        $this->load->view('catesList',array('PUBLIC'=>$this->admin_res,'categories'=>$categories));
    }
    
    /**
     * ajax添加分类
     */
    public function ajaxAddCate(){
        if(isAjax()){
            
        } else {
            exit(json_encode(array('code'=>-100,'msg'=>'非法访问')));
        }
    }
}
?>
