<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on 2014-3-12
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 公共模型 负责提供菜单 侧边栏等公共数据
 * @author 华定平
 */
 class PublicModel extends CI_Model{
 		public function __construct(){
 			parent::__construct();
 			$this->load->database();
 		}
 		
 	/**
	  * 获取上部菜单
	 * menu_show的值0为时则上下都不显示 1为在上部显示 2为在底部显示 3则都显示
	 * $menu_level 为1是则返回多级菜单数据 为0则返回一级菜单数据
	 */
	public function getTopMenus($menu_level=''){
		if($menu_level){
			$sql = "SELECT * FROM `dr_module` WHERE `menu_show`=1 OR `menu_show`=3 ORDER BY `module_path`";
			$query = $this->db->query($sql);
		} else {
			$where = "menu_show` = '1' OR `menu_show` = '3' ORDER BY `module_order` ";
			$this->db->where($where);
			$query = $this->db->get('dr_module');	
		}
		$modules = $query->result_array();
		return $modules;
	}
	
	/**
	 * 获取底部菜单
	 * menu_show的值0为时则上下都不显示 1为在上部显示 2为在底部显示 3则都显示
	 */
	public function getBottomMenus(){
		$where = "menu_show` = '2' OR `menu_show` = '3' ORDER BY `module_order` ";
		$this->db->where($where);
		$query = $this->db->get('dr_module');
		$modules = $query->result_array();
		return $modules;
	}
	
	/**
	 * 获取当前位置信息
	 */
	 public function position($path=''){
	 	$sql = "SELECT `module_cname`,`id` FROM `dr_module` WHERE `id` IN (".$path.") ORDER BY `module_path`";
	 	$query = $this->db->query($sql);
	 	return $query->result_array();
	 }
	 
	 /**
	  * 获取侧边公共信息
	  */
	 public function sideInfo(){
	 	$this->db->order_by('orderBy');
	  $query = $this->db->get_where('dr_public',array('display'=>1));
	  return $query->result_array(); 
	 }
	 
	 /**
	  * 获取联系我们信息
	  */
	 public function contactUsInfo(){
		 $sql = " SELECT `public_key`,`public_value` FROM `dr_public` WHERE `display`=1 ORDER BY `orderBy` ";
		 $query = $this->db->query($sql);
		 return $query->result_array();
	 }
	 
 }
 
?>
