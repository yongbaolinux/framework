<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session_');                           //载入会话函数库
        $this->load->helper('url');
        $this->load->helper('common_func');
        $this->admin_res = base_url().'admin_res/';                 //后台资源存放路径(js css images)
        $this->cur_controller = base_url().'system.php/Content';    //当前控制器路径
        $this->load->database();                                    //连接数据库
        if(!$this->session_->getSession('admin.login')){
            redirect('admin/login','location');
        }
    }


    /**
     * 文章列表
     */
    public function articlesList(){
        //输出json数据供前端渲染
        $articles_resource = $this->db->query("SELECT * FROM `bd_articles` WHERE `status`=2 ORDER BY `ctime` DESC");
        $articles_array = $articles_resource->result_array();
        $articles_json = json_encode($articles_array);
        $this->load->view('articlesList.php',array('PUBLIC'=>$this->admin_res,'CONTROLLER'=>$this->cur_controller,'articles'=>$articles_json));
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
    
    /**
     * ajax方式添加一篇文章
     */
    public function ajaxAddArticle(){
        if(isAjax()){
            $cateId = $this->input->post('cate_id');
            $content = $this->input->post('content');
            $title = $this->input->post('title');
            $status = 2;
            $insertResult = $this->db->query("INSERT INTO `bd_articles`(`title`,`content`,`cate_cname`,`author`,`ctime`,`status`) VALUES('".$title."','".$content."','".$cateId."','".$this->session_->getSession('admin.name')."','".time()."',".$status.")");
            if($insertResult){
                echo json_encode(array('code'=>1,'msg'=>'添加成功'));
            } else {
                echo json_encode(array('code'=>0,'msg'=>'添加失败'));
            }
        } else {
            exit('非法访问');
        }
    }
    
    /**
     * ajax方式删除文章(放进回收站)
     */
    public function ajaxDelArticles(){
        if(isAjax()){
            $articleIds = $this->input->post('article_ids');
            $where = implode(',', $articleIds);
            $res = $this->db->query("UPDATE `bd_articles` SET `status`=0 WHERE `id` IN(".$where.")");
            echo json_encode($res);
        } else {
            exit('非法访问');
        }
    }
    
    /**
     * ajax方式批量置顶和取消置顶文章
     */
    public function ajaxTopArticles(){
        if(isAjax()){
            $articleIds = $this->input->post('article_ids');
            $top = $this->input->post('top');
            $where = implode(',', $articleIds);
            $res = $this->db->query("UPDATE `bd_articles` SET `top`=".$top." WHERE `id` IN(".$where.")");
            echo json_encode($res);
        } else {
            exit('非法访问');
        }
    }
}
?>