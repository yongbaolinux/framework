<?php 
/**
 * 前台获取网站配置的模型
 * @author 华定平
 */
class ConfigModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		//连接数据库
		$this->load->database();
	}
	
	
	/**
	 * 查询配置数据 将其处理成需要的形式
	 * @return mixed
	 */
	public function select(){
		//$this->db->select('config_key','config_value');
		$query = $this->db->get('dr_config');
		$config = $query->result_array();
		$data = array();
		if(is_array($config)){
			foreach ($config as $key=>$value){
				$data[$value['config_key']] = $value['config_value'];
			}
		}
		return $data;
	}
	
}

?>