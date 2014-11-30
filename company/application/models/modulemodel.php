<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModuleModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		//连接数据库
		$this->load->database();
	}
	
	/**
	 * 判断模块id对应的模块是否真的存在
	 * 存在以数组的形式返回true 并附带模块数据和子模块条目数据
	 * 否则返回false
	 * @param int $mid
	 */
	public function ifModuleExists($mid=''){
		$mid = intval($mid);
		//模块数据
		$res = $this->db->get_where('dr_module',array('id'=>$mid));
		//子模块数据
		$children = $this->db->get_where('dr_module',array('module_fid'=>$mid));
		return count($res->result_array()) > 0 ? array('exist'=>true,'data'=>$res->result_array(),'children'=>$children->result_array()) : array('exist'=>false);
	}
}

?>