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
		$this->load->database();
		$this->admin_res = base_url().'admin_res';
		//dump(($this->session_));die(0);
	}

	public function index(){
		if($this->session_->getSession('login')) {
			$this->load->view('index', array('PUBLIC' => $this->admin_res));
		} else {
			redirect(base_url().'system.php/admin/login','location');
		}
	}

	/**
	 * 显示后台管理员登录界面
	 */
	public function login(){
		if($this->session_->getSession('login')) {
			redirect(base_url().'system.php','location');
		} else {
			$this->load->view('login',array('PUBLIC' => $this->admin_res));
		}
	}

	public function logout(){

	}

	/**
	 * ajax验证管理员帐号是否合法
	 */
	public function ajaxValidateAdminAccountPwd(){
		$adminAccount = $this->input->post('admin_account');
		$adminPwd = $this->input->post('admin_pwd');
		if(empty($adminAccount)){
			exit(json_encode(array('account'=>array('code'=>0,'msg'=>'帐号不能为空'))));
		}

		$adminAccountExist = $this->db->query("SELECT COUNT(*) as count FROM `bd_admin` WHERE `admin_account`='".$adminAccount."'");
		$adminAccountExist = $adminAccountExist->result_array();
		if($adminAccountExist[0]['count'] == 0){
			exit(json_encode(array('code'=>0,'msg'=>'该帐号不存在')));
		} else {
			exit(json_encode(array('code'=>1)));
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */