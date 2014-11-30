<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * 后台文件上传 图片处理集中处理接口
 */
define('IMAGE_RESIZE_SCALE',1);				//图片等比缩放
define('IMAGE_RESIZE',2);					//图片非等比缩放
define('IMAGE_CROP',3);						//裁剪出图片一个区域

class Api extends CI_Controller{
	//文件上传参数
	private $file_allow_size;				//上传文件所允许的最大尺寸
	private $file_allow_type;				//上传文件所允许的文件类型
	private $file_save_dir;					//上传文件存放文件夹的路径
	
	//图片文件处理参数
	private $image_max_width;				//处理后的新图片的最大宽度
	private $image_max_height;				//处理后的新图片的最大高度
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('common_func');
		$this->load->library('upload');
		$this->load->library('image_lib');
		//加载cache驱动
		$this->load->driver('cache');
		//加载网站培植模型
		$this->load->model('configModel');
	}
	
	//文件上传处理自定义方式
	private function file_upload_custom($_files,$_post){
		//暂时只处理由uploadify插件传递过来的数据
		//$post = $this->input->files();
		if(count($_files) > 0){
			if(count($_files['Filedata']) > 0){
				//uploadify方式上传的
				$token = md5('I_love_you'.$_post['time']);
				if($token === $_post['token']){
					$file_type = pathinfo($_files['Filedata']['name'])['extension'];	//文件类型
					if(in_array($file_type,$this->file_allow_type)){
						$file_size = $_files['Filedata']['size'];
						if($file_size <= $this->file_allow_size){
							if(!file_exists($this->file_save_dir)){
								mkdir($this->file_save_dir,0777,true);
							}
							if(is_dir($this->file_save_dir)){
								$file_save_name = $_files['Filedata']['name'];	//与原名相同 也可以自定义命名规则
								$file_save_url = $this->file_save_dir.$file_save_name;
								if(file_exists($file_save_url)){
									rename($file_save_url,$file_save_url.'.bak');
								}
								move_uploaded_file($_files['Filedata']['tmp_name'],$file_save_url);
								if(file_exists($file_save_url)){
									return array('code'=>1,'url'=>$file_save_name);
								} else {
									return array('code'=>-6,'msg'=>'文件上传失败');
								}
							} else {
								return array('code'=>-5,'msg'=>'上传文件无法找到存放位置');
							}
						} else {
							//上传文件过大
							return array('code'=>-4,'msg'=>'上传文件过大');
						}
					} else {
						//上传文件类型不合法
						return array('code'=>-3,'msg'=>'上传文件类型不合法');
					}
				} else {
					//非法传输
					return array('code'=>-2,'msg'=>'非法传输');
				}
			} else {
				//其他插件或者其他方式上传的
			}
		} else {
			return array('code'=>-1,'msg'=>'没有文件数据');
		}
	}
	
	//文件上传处理用CI系统类库方式
	public function file_upload_system(){
		
	}
	
	/*
	 * 图片处理自定义方式
	 * @param $filename	待处理图片文件的路径
	 * @param $dealtype 处理图片的方式 IMAGE_RESIZE_SCALE为等比缩放 IMAGE_RESIZE为非等比缩放 IMAGE_CROP为裁剪图像某个区域
	 * @param $X $dealtype为IMAGE_CROP时有效  裁剪区域的左上角x坐标
	 * @param $Y $dealtype为IMAGE_CROP时有效 裁剪区域的左上角Y坐标
	 * @param $W $dealtype为IMAGE_CROP时有效 裁剪区域的宽度
	 * @param $H $dealtype为IMAGE_CROP时有效 裁剪区域的高度
	 * @return -1缺少文件地址参数		-2文件不存在	-3 图片格式有误 打开失败		-4$dealtype参数错误	-5拷贝图像资源失败
	 */
	
	public function image_deal_custom($filename,$dealtype=IMAGE_RESIZE_SCALE,$X=0,$Y=0,$W=0,$H=0){
		if(isset($filename) && !empty($filename)){
			//利用getimagesize函数获取图片的宽高
			$imageinfo = getimagesize($filename);
			if($imageinfo == false){
				return -2;
			} else {
				$type = $imageinfo['mime'];
				$width = $imageinfo[0];
				$height = $imageinfo[1];
				switch($type){
					case 'image/jpeg':
						$img = imagecreatefromjpeg($filename);break;	//打开图像文件
					case 'image/png':
						$img = imagecreatefrompng($filename);break;
					case 'image/gif':
						$img = imagecreatefromgif($filename);break;
					default:
						return -3;
				}
				if($width > $this->image_max_width || $height > $this->image_max_height){
					switch ($dealtype){
						case IMAGE_RESIZE_SCALE:
							if($width/$height > ($this->image_max_width/$this->image_max_height)){
								$new_width = $this->image_max_width;
								$new_height = $height / ($width/$this->image_max_width);	//高度进行等比缩放
							} else {
								$new_height = $this->image_max_height;
								$new_width = $width / ($height/$this->image_max_height);
							}
							$new_img = imagecreatetruecolor($new_width, $new_height);	//创建一个真彩色图像
							$copy_res = imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);break;//拷贝图像资源
						case IMAGE_RESIZE:
							$new_width = $this->image_max_width;
							$new_height = $this->image_max_height;
							$new_img = imagecreatetruecolor($new_width, $new_height);	//创建一个真彩色图像
							$copy_res = imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);break;//拷贝图像资源
						case IMAGE_CROP:
							$new_img = imagecreatetruecolor($W, $H);	//创建一个真彩色图像
							$copy_res = imagecopyresampled($new_img, $img, 0, 0, $X, $Y, $W, $H, $W, $H);break;//拷贝图像资源
						default:
							imagedestroy($img);
							return -4;
					}
					if($copy_res){
						imagejpeg($new_img,$filename);	//输出图像资源到文件 并覆盖源文件			
					} else {
						return -5;
					}
					imagedestroy($img);				//销毁源文件图像资源句柄	
				}
			}
		} else {
			return -1;
		}
	}
	
	//图片处理用CI系统类库方式
	public function image_deal_system(){
		
	}
	
	//logo上传
	public function upload_logo(){
		$this->file_allow_size = 6 * 1024 * 1024;
		$this->file_allow_type = array('jpeg','jpg','bmp','png','gif');
		//TODO 从数据库取出数据来初始化配置
		$this->file_save_dir = rtrim($_SERVER['DOCUMENT_ROOT'],'/').'/company/uploads/logo/';
		$res = $this->file_upload_custom($_FILES,$_POST);
		//上传成功后 处理logo图片
		if($res['code'] > 0 ){
			//从缓存中读取logo的尺寸
			if($this->cache->file->is_supported()){
				$data = $this->cache->file->get('configSite');
				if($data){
					$this->image_max_width = $data['configSiteLogoWidth'];
					$this->image_max_height = $data['configSiteLogoHeight'];
				} else {
					$cfg = $this->configModel->select();
					$this->image_max_width = $cfg['configSiteLogoWidth'];
					$this->image_max_height = $cfg['configSiteLogoHeight'];
				}
			}
			$this->image_deal_custom($this->file_save_dir.$res['url'],IMAGE_RESIZE);
		}
		echo json_encode($res);
	}
	
	//轮播图上传
	
	
}

?>