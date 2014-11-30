<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on 2014-3-10
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class ImageModel extends CI_Model{
 	public function __construct(){
 		parent::__construct();
 		$this->load->database();
 	}
 	
 	/**
 	 * 根据模块ID参数查找该模块及子模块下的所有图片
 	 */
 	public function selectImages($mid='',$limit=''){
 		//查找该模块的所有子模块和后代模块
 		$sql = "SELECT `id` FROM `dr_module` WHERE find_in_set($mid,`module_path`) ORDER BY `module_path`";
 		$modulesQuery = $this->db->query($sql);
 		$ids = $modulesQuery->result_array();
 		//组合id
 		$id = array();
 		foreach($ids as $value){
 			$id[] = $value['id'];
 		}
 		$id = implode(',',$id);
 		if(empty($limit)){
 			//查找所有模块的图片
 			$sql = "SELECT * FROM `dr_images` WHERE `moduleID` IN($id)";	
 		} else {
 			$sql = "SELECT * FROM `dr_images` WHERE `moduleID` IN($id) LIMIT ".$limit;
 		}
 		
 		$imagesQuery = $this->db->query($sql);
 		return $imagesQuery->result_array();
 	}
 	
 }
?>
