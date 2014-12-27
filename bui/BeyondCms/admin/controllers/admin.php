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
	 * code	代表验证结果
	 * 0 验证通过
	 * 1 帐号为空
	 * 2 帐号不存在
	 * 4 密码为空
	 * 8 密码不正确
	 */
	public function ajaxValidateAdminAccountPwd(){
		$adminAccount = trim($this->input->post('admin_account'));
		$adminPwd = trim($this->input->post('admin_pwd'));
		$accountInfo = 0;
		$pwdInfo = 0;
		//帐号验证信息
		if(empty($adminAccount)){
			$accountInfo = 1;
		} else {
			$adminAccountExist = $this->db->query("SELECT COUNT(*) AS count FROM `bd_admin` WHERE `admin_account`='".$adminAccount."'");
			$adminAccountExist = $adminAccountExist->result_array();
			if($adminAccountExist[0]['count'] == 0){
				$accountInfo = 2;
			}
		}
		//密码验证信息
		if(empty($adminPwd)){
			$pwdInfo = 4;
		} else {
			if($accountInfo == 0){
				$adminPwdCorrect = $this->db->query("SELECT COUNT(*) AS count FROM `bd_admin` WHERE `admin_account`='".$adminAccount."' AND `admin_pwd`='".md5($adminPwd)."'");
				$adminPwdCorrect = $adminPwdCorrect->result_array();
				if($adminPwdCorrect[0]['count'] == 0){
					$pwdInfo = 8;
				} else {
					$this->session_->setSession('login',1);
				}
			}
		}
		echo json_encode($accountInfo+$pwdInfo);

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */