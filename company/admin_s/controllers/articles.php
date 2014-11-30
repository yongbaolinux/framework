<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Articles extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('common_func');
		$this->load->library('pagination');		//载入分页类
		$this->load->model('articlesModel');
	}	
	
	/**
	 * 显示待操作的文章列表
	 */
	public function articleShow(){
		$articlesData = $this->articlesModel->getArticles();
		//分页
		$config['base_url'] = base_url().'admin_s.php/articles/articleShow';
		$config['total_rows'] = count($articlesData);
		$config['per_page'] = 5;
		$config['offset'] = $this->uri->segment(3)?$this->uri->segment(3):0;
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
		//分页查询
		$articlesData = $this->articlesModel->getArticles(null,$config['offset'].','.$config['per_page']);
		$this->load->view('articleShow',array('articles'=>$articlesData,'pagination'=>$pagination));
	}
	
	/**
	 * 执行添加文章动作(ajax)
	 */
	public function doAddArticle(){
		if(isAjax()){
			$data = $this->input->post();
			$res = $this->articlesModel->addArticle($data);
			echo json_encode($res);
		}
	}
	
	/**
	 * 执行删除文章动作(ajax)
	 */
	public function doDelArticle(){
		if(isAjax()){
			$id = $this->input->post('id');
			$res = $this->articlesModel->delArticles($id);
			echo json_encode($res);
		}
	}
	
	/**
	 * 执行编辑文章的单篇文章输出数据操作(ajax)
	 */
	public function editArticle(){
		if(isAjax()){
			$id = $this->input->post('id');
			$result = $this->articlesModel->getArticles(' `dr_articles`.`id`="'.$id.'"');
			if(count($result) > 0){
				echo json_encode(array('res'=>true,'data'=>$result));
			} else {
				echo json_encode(array('res'=>true));
			}
			
		}
	}
	
	/**
	 * 执行编辑文章的单篇文章修改保存操作(ajax)
	 */
	public function doEditArticle(){
		if(isAjax()){
			$articleData = $this->input->post();
			$res = $this->articlesModel->editArticle($articleData);
			echo json_encode(array('res'=>$res));
		}
	}
}
?>