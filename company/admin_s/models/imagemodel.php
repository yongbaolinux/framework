<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 操作图片管理的模型
 * author 华定平
 */
 class ImageModel extends CI_Model{
 	public function __construct(){
 		parent::__construct();
 		$this->load->database();
 	}
 	
 	/**
 	 * 取出所有图片模块
 	 */
 	public function getAllImageModules($where = ''){
 		$this->db->order_by('module_path');
 		if(!empty($where)){
 			$where .= ' AND `module_type` = 3 ';
 		} else {
 			$where = 'module_type = 3 ';
 		}
 		$this->db->where($where);
 		$query = $this->db->get('dr_module');
 		return $query->result_array();
 	}
 	
 	/**
 	 * 取出所有图片模块下的图片(查图片表)
 	 */
 	 public function getAllImages($where='',$limit=''){
 	 	if(!empty($where)){
 	 		$this->db->where($where);
 	 	}
 	 	if(!empty($limit)){
 	 		$arr = explode(',',$limit);
 	 		if(is_array($arr) && count($arr)==2){
 	 			$this->db->limit($arr[0],$arr[1]);
 	 		} else {
 	 			return;
 	 		}
 	 	}
 	 	$query = $this->db->get('dr_images');
 	 	return $query->result_array();
 	 }
 	 
 	 /**
 	  * 根据条件参数取出一张图片
 	  */
 	 public function getOneImage($key,$value){
 	 	$query = $this->db->get_where('dr_images',array($key=>$value));
 	 	return $query->result_array();
 	 }
 	 
 	 /**
 	  * 添加图片（写图片表）
 	  */
 	 public function addImage($data=array()){
 	  	return $this->db->insert('dr_images',$data);
 	  }
 	  
 	  /**
 	   * 更新图片信息 - 没有更改图片（写图片表）
 	   */
 	 public function updateImage($post=array()){
 	 		$data = array(
 	 			'title'=>$post['editPicName'],
 	 			'moduleID'=>$post['editModuleId'],
 	 			'moduleName'=>$post['editModuleName']
 	 		);
 	 		$this->db->where('imageID',$post['editId']);
 	 		return $this->db->update('dr_images',$data);
 	 }
 	 
 	 /**
 	  * 更新图片信息 - 更改图片 （写图片表）
 	  */
 	 public function updateImage2($post=array()){
 	 		$data = array(
 	 			'title'=>$post['editPicName'],
 	 			'moduleID'=>$post['editModuleId'],
 	 			'moduleName'=>$post['editModuleName'],
 	 			'path'=>$post['path']
 	 		);
 	 		$this->db->where('imageID',$post['editId']);
 	 		return $this->db->update('dr_images',$data);
 	 }
 	 
 	 /**
 	  * 删除图片
 	  */
 	 public function delImage($id=''){
 	 	if(isset($id) && !empty($id)){
 	 		return $this->db->delete('dr_images',array('imageID'=>$id));
 	 	}
 	 }
 }
?>