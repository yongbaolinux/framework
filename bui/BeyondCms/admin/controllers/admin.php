<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	private $admin_res;
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('common_func');
		$this->load->library('session_');
		$this->admin_res = base_url().'/admin_res';
		dump($this);
	}

	public function index(){
		$this->load->view('index',array('PUBLIC'=>$this->admin_res));
	}

	/**
	 * 显示后台管理员登录界面
	 */
	public function login(){
		$this->load->view('login');
	}

	public function logout(){

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */