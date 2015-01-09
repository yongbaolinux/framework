<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_func');
        $this->admin_res = base_url().'admin_res/';                 //后台资源存放路径(js css images)
        $this->cur_controller = base_url().'system.php/Content';    //当前控制器路径
        $this->load->database();                                    //连接数据库
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
     * ajax执行添加文章分类
     */
    public function ajaxAddArticleCate(){
        if(isAjax()){
            $cateName = trim($this->input->post('cateName'));
            if($cateName == ''){
                exit(json_encode(array('code'=>0,'msg'=>'文章分类名不能为空')));
            }
            //查找数据库中是否已存在该分类
            $cateExist = $this->db->query("SELECT COUNT(id) as count FROM `bd_articles_cate` WHERE `cate_name`='".$cateName."'");
            $cateExist = $cateExist->result_array();
            if($cateExist[0]['count'] > 0){
                exit(json_encode(array('code'=>-1,'msg'=>'该分类已添加')));
            } else {
                $this->db->query("INSERT INTO `bd_articles_cate`(`cate_name`,`cate_articles_mount`) VALUES('".$cateName."',0)");
                $insertResult = $this->db->insert_id();
                if($insertResult > 0){
                    echo json_encode(array('code'=>1,'msg'=>'分类添加成功'));
                } else {
                    echo json_encode(array('code'=>-2,'msg'=>'未知原因,分类添加失败'));
                }
            }
        } else {
            exit('非法访问');
        }
    }
    
    /**
     * ajax获取文章所有分类的信息
     * 以json的方式返送
     */
    public function ajaxGetArticleCates(){
        if(isAjax()){
            $resource = $this->db->query("SELECT * FROM `bd_articles_cate`");
            $articleCates = $resource->result_array();
            echo json_encode($articleCates);
        } else {
            exit('非法访问');
        }
    }
}
?>