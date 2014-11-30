<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 广告管理控制器
 */
class Advertises extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('common_func');
		//加载广告模型类
		$this->load->model('advertiseModel');
	}
	
	public function index(){
		//index方法的存在是为了hack 上传插件uploadify的swf的404错误
	}
	
	/**
	 * 显示所有的轮播图片
	 */
	public function advertiseShow(){
		$indexPicSlider = $this->advertiseModel->selectIndexPicSlider();
		$this->load->view('advertise',array('indexPicSlider'=>$indexPicSlider));
	}
	
	/**
	 * 添加轮播图片
	 */
	public function advertiseAdd(){
			if(isAjax()){
				$advData = $this->input->post();
				$advData_ = array(
					'adv_img_path'=>$advData['picSliderImg'],
					'adv_title'=>$advData['picSliderTitle'],
					'adv_content'=>$advData['picSliderContent'],
					'adv_order'=>$advData['picSliderOrder'],
					'adv_show'=>$advData['picSliderShow'],
					'adv_group'=>1
				);
				$pathinfo = pathinfo($advData['picSliderImg']);
				//服务器端验证数据合法性
				if($advData['picSliderImg']===''){
					exit(json_encode(array('res'=>false,'msg'=>'图片路径不能为空')));
				} else {
						$parse = parse_url($advData['picSliderImg']);
						$filePath = $_SERVER['DOCUMENT_ROOT'].$parse['path'];
						if(!file_exists($filePath)) {
							exit(json_encode(array('res'=>false,'msg'=>'图片路径不合法')));
						} else {
							echo json_encode($this->advertiseModel->addIndexPicSlider($advData_));
						}
				}
			}
	}
}
?>