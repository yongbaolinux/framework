<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_func');
        $this->admin_res = base_url().'admin_res/';                 //后台资源存放路径(js css images)
        $this->cur_controller = base_url().'system.php/Content';    //当前控制器路径
    }

    /**
     * 采集管理
     */
    public function collect(){
        
    }

    /**
     * 文章列表
     */
    public function articlesList(){
        $this->load->view('articlesList.php',array('PUBLIC'=>$this->admin_res,'CONTROLLER'=>$this->cur_controller));
    }
    
    /**
     * 文章分类
     */
    public function articlesCate(){
        $this->load->view('articlesCate.php',array('PUBLIC'=>$this->admin_res,'CONTROLLER'=>$this->cur_controller));
    }
    
    /**
     * 执行添加文章分类
     */
    public function ajaxAddArticleCate(){
        if(isAjax()){
            $cateName = $this->input->post('cateName');
            
            echo json_encode(array('code'=>1,'msg'=>'添加成功'));
        } else {
            exit('非法访问');
        }
    }
}
?>