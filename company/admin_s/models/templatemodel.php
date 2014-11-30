<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 操作模板配置的模型
 * @author 华定平
 */
class TemplateModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		//连接数据库
		$this->load->database();
		$this->load->helper('url');
	}
	
	//保存模板
	public function saveTemplateSet($template=''){
		if(isset($template) && !empty($template)){
			$data = array('config_value'=>$template);
			$this->db->where('config_key','configSiteTemplate');
			return $this->db->update('dr_config',$data);
		}
	}
	
	//获取当前模板
	public function getCurrentTemplate(){
		$query = $this->db->get_where('dr_config',array('config_key'=>'configSiteTemplate'));
		$res = $query->result_array();
		if(is_array($res) && count($res) > 0 ){
			return $res[0]['config_value'];	
		}
	}
}

?>
