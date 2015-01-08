<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->admin_res = base_url().'admin_res/';
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
        $this->load->view('articlesList.php',array('PUBLIC'=>$this->admin_res));
    }
    
    /**
     * 文章分类
     */
    public function articlesCate(){
        $this->load->view('articlesCate.php',array('PUBLIC'=>$this->admin_res));
    }
}
?>