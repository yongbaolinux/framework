<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/28
 * Time: 11:27
 */
class Test extends CI_Controller{
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
        //session_start();
        //$_SESSION = null
        //$this->session_->setSession('admin.login.a',true);
        //$this->session_->setSession('admin.xy',5);
        //$this->session_->cleanSession();
        @dump($_SESSION);
    }
}

?>