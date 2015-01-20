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
        $session_id = $this->input->post('session_id');             //上传图片是获取控件传递的session_id
        if(!$this->session_->getSession('admin.login',$session_id)){
            redirect('admin/login','location');
        }
    }
    
    public function index(){
        
    }

    /**
     * 审核后文章列表
     */
    public function articlesList(){
        //输出json数据供前端渲染
        $articles_resource = $this->db->query("SELECT * FROM `bd_articles` WHERE `status`=2 ORDER BY `ctime` DESC");
        $articles_array = $articles_resource->result_array();
        $articles_json = json_encode($articles_array);
        $this->load->view('articlesList.php',array('PUBLIC'=>$this->admin_res,'CONTROLLER'=>$this->cur_controller,'articles'=>$articles_json));
    }
    
    /**
     * 待审核文章列表
     */
    public function articlesVerify(){
        //输出json数据供前端渲染
        $articles_resource = $this->db->query("SELECT * FROM `bd_articles` WHERE `status`=1 ORDER BY `ctime` DESC");
        $articles_array = $articles_resource->result_array();
        $articles_json = json_encode($articles_array);
        $this->load->view('articlesVerify.php',array('PUBLIC'=>$this->admin_res,'CONTROLLER'=>$this->cur_controller,'articles'=>$articles_json));
    }
    
    
    
    /**
     * 文章分类
     */
    public function articlesCate(){
        $this->load->view('articlesCate.php',array('PUBLIC'=>$this->admin_res,'CONTROLLER'=>$this->cur_controller));
    }
    
    /**
     * 文章回收站(被删除的文章放到这里 可以还原 可以清空 清空后无法再找回)
     */
    public function articlesRecycle(){
        //输出json数据供前端渲染
        $articles_resource = $this->db->query("SELECT * FROM `bd_articles` WHERE `status`=0 ORDER BY `ctime` DESC");
        $articles_array = $articles_resource->result_array();
        $articles_json = json_encode($articles_array);
        $this->load->view('articlesRecycle.php',array('PUBLIC'=>$this->admin_res,'articles'=>$articles_json));
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
     * ajax方式获取一篇文章的数据
     * 以json的方式返送
     */
    public function ajaxGetOneArticle(){
        if(isAjax()){
            $articleId = $this->input->post('article_id');
            $resource = $this->db->query("SELECT * FROM `bd_articles` WHERE `id`=".$articleId);
            $articleData =  $resource->result_array();
            echo json_encode($articleData[0]);
        } else {
            exit('非法访问');
        }
    }
    
    /**
     * ajax方式保存编辑后的文章
     * 如果开启文章审核 每次编辑后都会进入审核状态 如果关闭审核 则修改后依然保留在文章列表中
     */
    public function ajaxSaveOneArticle(){
        if(isAjax()){
            $title = $this->input->post('title');
            $content = $this->input->post('content');
            $cate_cname = $this->input->post('cate_cname');
            $thumb = $this->input->post('thumb');
            $id = $this->input->post('id');
            
            //根据 受影响的行来判断更科学 因为如果没有作任何修改就不应该使其进入审核状态
            //$updateResult = $this->db->query("UPDATE `bd_articles` SET `title`='".$title."',`content`='".$content."',`cate_cname`='".$cate_cname."',`thumbPath`='".$thumb."',`status`=".$status." WHERE `id`=".$id);
            //echo $updateResult;
            $this->db->query("UPDATE `bd_articles` SET `title`='".$title."',`content`='".$content."',`cate_cname`='".$cate_cname."',`thumbPath`='".$thumb."' WHERE `id`=".$id);
            $affect_rows = $this->db->affected_rows();
            if($affect_rows){
                //查找是否开启文章审核功能
                $resource = $this->db->query("SELECT `config_value` FROM `bd_config` WHERE `config_key`='config_article_verify'");
                $config_article_verify = $resource->result_array();
                $config_article_verify = $config_article_verify[0]['config_value'];
                if($config_article_verify){
                    $this->db->query("UPDATE `bd_articles` SET `status`= 1 WHERE `id`=".$id);
                    echo $this->db->affected_rows();
                }
            }
        } else {
            exit(json_encode(array('code'=>-100,'msg'=>'非法访问')));
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
            //读取系统配置表 检查是否开启了文章审核功能
            $verify = $this->db->query("SELECT `config_value` FROM `bd_config` WHERE `config_key`='config_article_verify'");
            $verify = $verify->result_array();
            $verify = intval($verify[0]['config_value']);
            $status = $verify ? 1 : 2;
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
            $articleIds = is_string($articleIds) ? array($articleIds) : $articleIds;
            $where = implode(',', $articleIds);
            //查询当前状态 放入回收站后 将当前状态写入上一个状态字段中
            $curStauts = $this->db->query("SELECT * FROM `bd_articles` WHERE `id` IN(".$where.")");
            $curStauts = $curStauts->result_array();
            
            //构造批量更改 VALUES 字符串
            foreach ($articleIds as $key=>$id){
                $values[] = '('.$id.',"'.$curStauts[$key]['title'].'","'.addslashes($curStauts[$key]['content']).'",'.$curStauts[$key]['share'].',"'.$curStauts[$key]['cate_cname'].'","'.$curStauts[$key]['author'].'",'.$curStauts[$key]['ctime'].','.$curStauts[$key]['top'].',"'.$curStauts[$key]['thumbPath'].'",0,'.$curStauts[$key]['status'].')';
            }
            
            $values = implode(',', $values);
            
            //使用REPLACE INTO进行批量更改文章状态
            $delResult = $this->db->query("REPLACE INTO `bd_articles`(`id`,`title`,`content`,`share`,`cate_cname`,`author`,`ctime`,`top`,`thumbPath`,`status`,`prev_status`) VALUES ".$values);
            echo json_encode($delResult);
        } else {
            exit(json_encode(array('code'=>-100,'msg'=>'非法访问')));
        }
    }
    
    /**
     * ajax方式清空文章(彻底删除 不可恢复)
     */
    public function ajaxDestroyArticles(){
        if(isAjax()){
            $articleIds = $this->input->post('article_ids');
            $articleIds = is_string($articleIds) ? array($articleIds) : $articleIds;
            $where = implode(',', $articleIds);
            $res = $this->db->query("DELETE FROM `bd_articles` WHERE `id` IN(".$where.")");
            echo json_encode($res);
        } else {
            exit(json_encode(array('code'=>-100,'msg'=>'非法访问')));
        }
    }
    
    /**
     * ajax方式批量置顶和取消置顶文章
     */
    public function ajaxTopArticles(){
        if(isAjax()){
            $articleIds = $this->input->post('article_ids');
            $top = $this->input->post('top');
            if(is_string($articleIds)){
               $where = $articleIds;
            } elseif(is_array($articleIds)){
               $where = implode(',', $articleIds); 
            }
            $res = $this->db->query("UPDATE `bd_articles` SET `top`=".$top." WHERE `id` IN(".$where.")");
            echo json_encode($res);
        } else {
            exit('非法访问');
        }
    }
    
    /**
     * ajax方式审核通过一篇文章
     */
    public function ajaxVerifyOneArticle(){
        if(isAjax()){
            $id = $this->input->post('id');
            if(empty($id)){
                exit(json_encode(array('code'=>-1,'msg'=>'文章id不能为空')));
            }
            $title = $this->input->post('title');
            if(empty($title)){
                exit(json_encode(array('code'=>-2,'msg'=>'文章标题不能为空')));
            }
            
            $content = $this->input->post('content');
            if(empty($content)){
                exit(json_encode(array('code'=>-3,'msg'=>'文章内容不能为空')));
            }
            $cate_cname = $this->input->post('cate_cname');
            if(empty($cate_cname)){
                exit(json_encode(array('code'=>-1,'msg'=>'文章分类名不能为空')));
            }
            $thumb = $this->input->post('thumb');
            if(empty($thumb)){
                exit(json_encode(array('code'=>-1,'msg'=>'文章封面不能为空')));
            }
            $verifyResult = $this->db->query("UPDATE `bd_articles` SET `title`='".$title."',`content`='".$content."',`cate_cname`='".$cate_cname."',`thumbPath`='".$thumb."',`status`=2 WHERE `id`=".$id);
            if($verifyResult){
                echo json_encode(array('code'=>1,'msg'=>'审核通过'));
            } else {
                echo json_encode(array('code'=>0,'msg'=>'审核失败'));
            }
        } else {
            exit(json_encode(array('code'=>-100,'msg'=>'非法访问')));
        }
    }
    
    /**
     * ajax方式批量审核通过文章(不推荐使用 以后可能会废弃)
     */
    public function ajaxVerifyArticles(){
        if(isAjax()){
            $article_ids = $this->input->post('article_ids');
            $article_ids = is_string($article_ids) ? array($article_ids) : $article_ids;
            $where = implode(',',$article_ids);
            $verifyResult = $this->db->query("UPDATE `tb_articles` SET `status`=2 WHERE `id` IN(".$where.")");
            if($verifyResult){
                echo json_encode(array('code'=>1,'msg'=>'审核通过'));
            } else {
                echo json_encode(array('code'=>0,'msg'=>'审核失败'));
            }
        } else {
            exit(json_encode(array('code'=>-100,'msg'=>'非法访问')));
        }
    }
    
    /**
     * ajax方式还原文章
     */
    public function ajaxRestoreArticles(){
        if(isAjax()){
            $article_ids = $this->input->post('article_ids');
            $article_ids = is_string($article_ids) ? array($article_ids) : $article_ids;
            $where = implode(',',$article_ids);
            $prevStatus = $this->db->query("SELECT `id`,`prev_status` FROM `bd_articles` WHERE `id` IN(".$where.")");
            $prevStatus = $prevStatus->result_array();
            $sql = '';
            $ids = array();
            foreach ($prevStatus as $value){
                $sql .= " WHEN ".$value['id']." THEN ".$value['prev_status'];
                $ids[] = $value['id'];
            }
            $ids = implode(',', $ids);
            $sql = "UPDATE `bd_articles` SET `status`= CASE `id` ".$sql." END WHERE `id` IN(".$ids.")"; //加 where 子句才正常
            $restoreResult = $this->db->query($sql);
            echo $restoreResult;
        } else {
            exit(json_encode(array('code'=>-100,'msg'=>'非法访问')));
        }
    }
    
    /**
     * 后台图片上传统一接口
     */
    public function imageUploaderApi(){
        if(count($_FILES) > 0){
            if(is_array($_FILES['Filedata']) && count($_FILES['Filedata']) > 0){
                $token = md5('I_love_you'.$_POST['time']);
                if($token === $_POST['token']){
                    $allow_file_types = array('jpg','png','gif');               //Todo 从数据库中读取配置
                    $allow_file_size = 6*1024*1024;                             //Todo 从数据库中读取配置
                    //echo $_FILES['Filedata']['name'];
                    $file_info = pathinfo($_FILES['Filedata']['name']);
                    $file_type = $file_info['extension'];
                    $file_size = $_FILES['Filedata']['size'];
                    //保存图片的路径参数用POST传递过来
                    $savePath = $this->input->POST('savePath');
                    $file_save_dir = rtrim($_SERVER['DOCUMENT_ROOT'],'/').'/'.$savePath.'/';  //Todo  分布式存储或者存储到云
                    if(in_array($file_type, $allow_file_types)){
                        if($file_size <= $allow_file_size){
                            if(!file_exists($file_save_dir)){
                                if(!mkdir($file_save_dir,0777,true)){
                                    exit(json_encode(array('code'=>-5,'msg'=>'新建文件夹失败')));
                                }
                            }
                            $file_save_name = time().'.'.$file_type;
                            $file_save_path = $file_save_dir.$file_save_name;
                            if(file_exists($file_save_path)){
                                //exit(json_encode(array('code'=>-4,'msg'=>'文件已存在')));
                                rename($file_save_path, $file_save_path.'.bak');
                            }
                            $res = move_uploaded_file($_FILES['Filedata']['tmp_name'],$file_save_path);
                            if(file_exists($file_save_path)){
                                echo json_encode(array('code'=>1,'msg'=>'/'.$savePath.'/'.$file_save_name));
                            } else {
                                echo json_encode(array('code'=>0,'msg'=>'文件上传失败'));
                            }
                        } else {
                            echo json_encode(array('code'=>-1,'msg'=>'上传文件过大'));
                        }
                    } else {
                        echo json_encode(array('code'=>-2,'msg'=>'文件类型不正确'));
                    }
                } else {
                    echo json_encode(array('code'=>-3,'msg'=>'非法传输'));
                }
            }
        } else {
            echo json_encode(array('code'=>-4,'msg'=>'没有文件数据'));
        }
    }
}
?>