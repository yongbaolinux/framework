<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 操作文章的模型
 */

class ArticleModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * 根据模块参数查找该模块及子模块下的所有文章
	 */
	public function selectArticles($mid='',$limit=''){
		//查找该模块的所有子模块和后代模块
		$sql="SELECT * FROM `dr_module` WHERE find_in_set($mid,`module_path`) ORDER BY `module_path`";
		$mids = $this->db->query($sql)->result_array();
		//组合mid
		$mid=array();
		foreach($mids as $key=>$value){
			$mid[]=$value['id'];
		}
		$mid=implode(',',$mid);
		if(empty($limit)){
			$sql="SELECT * FROM `dr_articles` WHERE `module_id` IN(".$mid.")";
		} else {
			$sql="SELECT * FROM `dr_articles` WHERE `module_id` IN(".$mid.") LIMIT ".$limit;
		}
		return $this->db->query($sql)->result_array();
	}
}
