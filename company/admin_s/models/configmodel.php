<?php 
/**
 * 操作网站配置的模型
 * @author 华定平
 */
class ConfigModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		//连接数据库
		$this->load->database();
	}
	
	/**
	 * 更新配置数据
	 * @param $data 配置数据
	 * @return mixed
	 * TODO 改进更新算法
	 */
	public function update($data = ''){
		if(is_array($data)){
			$count = 0; //保存更新的记录条数
			foreach ($data as $key=>$value){
				$this->db->where('config_key',$key);
				$this->db->update('dr_config',array('config_value'=>$value));
				//判断是否有更新
				$count += $this->db->affected_rows();
			}
			return $count?true:false;
		}	
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
