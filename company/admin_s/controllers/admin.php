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
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');		//载入url类
		$this->load->helper('common_func'); //载入公共函数
		$this->load->database();		//使用mysql_get_server_info()查询mysql信息前先要连接数据库
		$this->load->library('session2');		//加载自定义的session操作类
		$this->session2->start();						//开启session
	}
	
	public function index(){
		$verify = $this->session2->get('admin_verify');
		if(isset($verify) && !empty($verify)){
			$admin = $this->session2->get('admin_name');
			$this->load->view('index.php',array('adminName'=>$admin));
		} else {
			redirect(base_url().'admin_s.php/admin/login','location');
		}
	}
	
	/**
	 * 登录页面
	 */
	public function login(){
		$verify = $this->session2->get('admin_verify');
		if(isset($verify) && !empty($verify)){
			//redirect现在起作用
			redirect(base_url().'admin_s.php/','location');
		} else {
			$this->load->view('login');
		}
	}
	 
	//ajax才能访问该方法
	public function doLogin()
	{
		if(isAjax()){
			$postData = $this->input->post();
			foreach ($postData as $key=>&$value){
				$value=trim($value);
			}
			if($postData['account']===''){
				exit(json_encode(array('res'=>false,'desc'=>'account','msg'=>'帐号不能为空')));
			}
			if($postData['pwd']===''){
				exit(json_encode(array('res'=>false,'desc'=>'pwd','msg'=>'密码不能为空')));
			}
			//验证帐号是否存在
			$account_exist = $this->db->get_where('dr_admin',array('admin_account'=>$postData['account']))->result_array();
			if(count($account_exist) == 0 ){
				exit(json_encode(array('res'=>false,'desc'=>'account','msg'=>'该帐号不存在')));
			} else {
				$pwd_exist = $this->db->get_where('dr_admin',array('admin_account'=>$postData['account'],'admin_pwd'=>md5($postData['pwd'])))->result_array();
				if(count($pwd_exist) == 0 ){
					exit(json_encode(array('res'=>false,'desc'=>'pwd','msg'=>'密码不正确')));
				}
			}
			//写session
			$this->session2->set('admin_verify','success');
			$this->session2->set('admin_name',$postData['account']);
			exit(json_encode(array('res'=>true,'desc'=>base_url().'admin_s.php/','msg'=>'登录成功')));
			//页面跳转(ajax下redirect函数无效 只能通过js跳转)
		}
	}
	
	/**
	 * 管理员退出
	 */
	public function logout(){
		$verify = $this->session2->get('admin_verify');
		if(isset($verify) && !empty($verify)){
			$this->session2->clear();							//TODO暂时用全部清除方法
		}
		redirect(base_url().'admin_s.php/admin/login','location');
	}  

	/**
	 * ci的视图不能直接调用 所以iframe的src要写控制器的某个方法
	 * 显示基本信息的视图
	 */
	public function baseInfo(){
		$serverInfo['os'] = php_uname();					//获取服务器OS
		$serverInfo['server'] = $_SERVER['SERVER_SOFTWARE'];//获取服务器运行环境信息
		$serverInfo['php_sapi_name'] = php_sapi_name();		//获取PHP运行方式
		$serverInfo['mysql'] = mysql_get_server_info();		//获取Mysql版本
		$baseInfo = array('serverInfo'=>$serverInfo);
		$this->load->view('baseInfo',$baseInfo);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */