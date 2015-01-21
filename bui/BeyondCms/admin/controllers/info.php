<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller{

    private $admin_res;
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->admin_res = base_url().'admin_res/';
    }

    public function envInfo(){
        $this->load->view('envInfo',array('PUBLIC'=>$this->admin_res));
    }
}
