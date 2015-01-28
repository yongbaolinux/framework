<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

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
    private $res;
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->res = base_url().'application_res';
    }
    
	public function index()
	{
	    //读取网站配置项
	    $configs = $this->db->query("SELECT * FROM `bd_config`")->result_array();
	    $configs_ = array();
	    //按要求重新组装配置项
	    foreach ($configs as $k=>$config){
	        $configs_[$config['config_key']] = $config['config_value'];
	    }
	    
		$this->load->view('index',array('PUBLIC'=>$this->res));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */