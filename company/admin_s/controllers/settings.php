<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 网站设置控制器
 */
class Settings extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$_SESSION['admin'] = 'admin';
		if(empty($_SESSION['admin'])){
			redirect(base_url().'admin_s.php/admin/login','refresh');
		}
		//
		$this->load->model('configModel');
		//
		$this->load->helper('common_func');
		//
		$this->load->library('pagination');
		//
		$this->load->model('templateModel');
		//加载cache驱动
		$this->load->driver('cache');
	}
	
	/**
	 * 显示保存设置界面
	 */
	public function baseSet()
	{
		$data = $this->configModel->select();
		//dump($data);
		$this->load->view('baseSet',array('data'=>$data));
	}
	
	/**
	 * 保存基本设置(ajax方式)
	 */
	public function saveBaseSet(){
		if(IS_AJAX){
			$post = $this->input->post();
			$result = $this->configModel->update($post);
			//保存成功就
			if($result){
				//echo $this->cache->apc->is_supported();		//php5.5暂时还不支持apc缓存
				//把缓存写进文件
				if($this->cache->file->is_supported()){
					$this->cache->file->save('configSite',$post);	//configSite==缓存文件名  $post是要缓存的数据 缓存时间默认为60s
				}
			}
			echo json_encode($result);
		} else {
			echo '非法请求';	
		}
	}
	
	/**
	 * 保存Logo尺寸
	 */
	public function saveLogoSize(){
		//可以直接使用上面的saveBaseSet方法
		/*$post = $this->input->post();
		$result = $this->configModel->update($this->input->post());
		*/
	}
	
	/**
	 * 显示设置模板页
	 */
	public function templateSet(){
		define('TPL_PATH',dirname(BASEPATH).'/application/views');		//定义模板路径
		//echo TPL_PATH;
		foreach(glob(TPL_PATH.'/*') as $key=>$value){
			if(is_dir($value)){
				$templates[] = basename($value);
			}
		}
		//获取当前模板
		$current_template = $this->templateModel->getCurrentTemplate();
		//分页
		$config['base_url'] = base_url().'admin_s.php/settings/templateSet';
		$config['total_rows'] = count($templates);
		$config['per_page'] = 5;
		$config['offset'] = $this->uri->segment(3) > 0?$this->uri->segment(3):0;
		$config['first_link'] = '<< First';
		$config['first_tag_open'] = '<a href="javascript:void(0);">';
		$config['first_tag_close'] = '</a>';
		$config['last_link'] = 'Last >>';
		$config['last_tag_open'] = '<a href="javascript:void(0);">';
		$config['last_tag_close'] = '</a>';
		$config['cur_tag_open'] = '<a class="number current" href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a>';
		$config['prev_link'] = '上一页';
		$config['prev_tag_open'] = '<a href="javascript:void(0);">';
		$config['prev_tag_close'] = '</a>';
		$config['next_link'] = '下一页';
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		$this->load->view('templateSet',array('templates'=>$templates,'pagination'=>$pagination,'current_template'=>$current_template));	
	}
	
	//保存模板设置
	public function saveTemplateSet(){
		$post = ($this->input->post());	
		$res = $this->templateModel->saveTemplateSet($post['template']);
		if($res){
			echo '保存模板成功';
		} else {
			echo '保存模板失败';
		}
		redirect(base_url().'admin_s.php/settings/templateSet','refresh');	
	}
	
	//生成模板缩略图
	public function createTemplateImage(){
		$canvas = $this->input->post('canvas');
		$canvas = base64_decode(substr($canvas,23));	//解码并去掉前面的23个字符 "data:image/jpeg;base64," 
		$imageName = $this->input->post('templateName');
		$imagePath = dirname(BASEPATH).'/admin_res/images/templateImage/';
		if(!is_dir($imagePath)){
			mkdir($imagePath,0777,true);
		}
		$imageURL = $imagePath.$imageName.'.jpg';
		$fp = fopen($imageURL,'w');
		$res = fwrite($fp,$canvas);
		if($res){
			echo json_encode(base_url().'admin_res/images/templateImage/'.$imageName.'.jpg');	
		}
		fclose($fp);		
	}
	
	/**
	 * 其他设置
	 */
	public function otherSet(){
		$this->load->view('otherSet');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */