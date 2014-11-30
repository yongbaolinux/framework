<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 网站模块控制器
 */
class Modules extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		//加载公用函数库
		$this->load->helper('common_func');
		//加载模块操作model文件
		$this->load->model('moduleModel');
		//载入分页类
		$this->load->library('pagination');
	}
	
	/**
	 * 顶级模块列表显示页
	 */
	public function moduleShow(){
		//先取出一级模块
		$modules = $this->moduleModel->select('module_fid',0);
		//dump($modules);
		//echo __FILE__.' '.__LINE__;
		
		//分页
		$config['base_url'] = base_url().'admin_s.php/modules/moduleShow';
		$config['total_rows'] = count($modules);
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
		$config['prev_link'] = '« 上一页';
		$config['prev_tag_open'] = '<a href="javascript:void(0);">';
		$config['prev_tag_close'] = '</a>';
		$config['next_link'] = '下一页 »';
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		$modules = $this->moduleModel->select('module_fid',0,'id',$config['offset'],$config['per_page']);
		//如果这一页没有数据 跳到上一页
		if(count($modules) === 0 ){
			$segment = $this->uri->segment(3)-$config['per_page'];
			redirect(base_url().'admin_s.php/modules/moduleShow/'.$segment);
		}
		$this->load->view('moduleShow',array('modules'=>$modules,'pagination'=>$pagination));
	}
	
	/**
	 * 显示"移动到"里的模块数据(ajax)
	 * @param	$id	模块id
	 * @param	$fid	
	 */
	public function moduleShowSelectAjax(){
		if(IS_AJAX){
			$id = $this->input->post('id');
			$fid = $this->input->post('fid');
			$result = $this->moduleModel->select_move($id,$fid);
			echo json_encode($result);
		} else {
			echo '非法请求';
		}
	}
	
	/**
	 * 保存模块基本信息(ajax)
	 */
	public function moduleSave(){
		//判断请求是否为ajax调用
		if(IS_AJAX){
			$post = $this->input->post();
			$result = $this->moduleModel->save($post);
			echo json_encode($result);
		} else {
			echo '非法请求';
		}
	}
	
	/**
	 * 展开子模块(ajax)
	 */
	public function expandModule(){
		if(IS_AJAX){
			$post = $this->input->post();
			$sonModules = $this->moduleModel->select('module_fid',$post['id']);
			echo json_encode($sonModules);
		} else {
			echo '请求错误';
		}
	}
	
	/**
	 * 删除模块(ajax)
	 */
	public function deleteModule(){
		if(isAjax()){
			//判断该模块下是否有子模块 没有才能删除
			$module_id = $this->input->post('id',true);
			$result = $this->moduleModel->delete($module_id);
			echo json_encode($result);
		} else {
			echo '请求错误';
		}
	}
	
	/**
	 * 添加模块(ajax)
	 */
	public function addModule(){
		if(isAjax()){
			//后台表单数据验证
			$post = $this->input->post();
			if(empty($post['moduleName'])){
				echo json_encode(array('code'=>0,'msg'=>'alert("模块名不能为空")'));
			} else {
				$result = $this->moduleModel->addModule($post);
				if($result){
					echo json_encode(array('code'=>1,'msg'=>'添加成功'));
				} else {
					echo json_encode(array('code'=>2,'msg'=>'添加失败'));
				}
			}
		}
	}
	 
	/**
	 * 获取所有模块数据(ajax)
	 */
	public function getAllModules(){
		if(isAjax()){
			echo json_encode($this->moduleModel->select(null,null,'module_path'));
		}
	}
	
	/**
	 * 测试存储过程
	 */
	public function testProcedure(){
		
		$res = $this->moduleModel->createProcedure();
		dump($res);
	}
	
	
}
