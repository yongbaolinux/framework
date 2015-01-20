<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * api控制器专门处理文件(图片、影音)上传的一些操作
 * @author yongbaolinux@gmail.com
 */
class Api extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session_');
        $this->load->helper('common_func');
        $session_id = $this->input->post('session_id');             //上传图片是获取控件传递的session_id
        if(!$this->session_->getSession('admin.login',$session_id)){
            redirect('admin/login','location');
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
                            $file_save_name = time().'.'.$file_type;                         //Todo   在上传多个文件时 用time()来命名文件名 会造成覆盖
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
    
    /**
     * 后台数据上传统一接口
     * 提供导入文章导入数据的功能(暂只提供以.json后缀的JSON文件上传)
     */
    public function jsonUploaderApi(){
        if(count($_FILES) > 0){
            if(is_array($_FILES['Filedata']) && count($_FILES['Filedata']) > 0){
                $token = md5('I_love_you'.$_POST['time']);
                if($token === $_POST['token']){
                    $allow_file_types = array('json');               //Todo 从数据库中读取配置
                    $allow_file_size = 6*1024*1024;                             //Todo 从数据库中读取配置
                    //echo $_FILES['Filedata']['name'];
                    $file_info = pathinfo($_FILES['Filedata']['name']);
                    $file_type = $file_info['extension'];
                    $file_size = $_FILES['Filedata']['size'];

                    $file_save_dir = rtrim($_SERVER['DOCUMENT_ROOT'],'/').'/framework/data/';  //保存到  /data数据文件夹
                    if(in_array($file_type, $allow_file_types)){
                        if($file_size <= $allow_file_size){
                            if(!file_exists($file_save_dir)){
                                if(!mkdir($file_save_dir,0777,true)){
                                    exit(json_encode(array('code'=>-5,'msg'=>'新建文件夹失败')));
                                }
                            }
                            $file_save_name = time().'.'.$file_type;                         //Todo   在上传多个文件时 用time()来命名文件名 会造成覆盖
                            $file_save_path = $file_save_dir.$file_save_name;
                            if(file_exists($file_save_path)){
                                //exit(json_encode(array('code'=>-4,'msg'=>'文件已存在')));
                                rename($file_save_path, $file_save_path.'.bak');
                            }
                            $res = move_uploaded_file($_FILES['Filedata']['tmp_name'],$file_save_path);
                            if(file_exists($file_save_path)){
                                //解析json数据结构
                                $file_content = file_get_contents($file_save_path);
                                $json_arr = json_decode($file_content,true);
                                if(is_array($json_arr[0])){
                                    $fields_info = array();             //字段信息重新组装成一个新数组
                                    foreach ($json_arr[0] as $key=>$value){
                                        $value = (mb_strlen(strip_tags($value)) > 20) ? mb_substr(strip_tags($value), 0, 20).'...' : strip_tags($value);
                                       
                                        $fields_info[] = array('field_name'=>$key,'field_value'=>$value);
                                    }
                                    echo json_encode($fields_info);
                                }
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