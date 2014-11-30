<?php
/**
 * 前台广告操作模型
 */
class AdvertiseModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * 查询首页焦点轮播图
	 */
	public function selectIndexPicSlider(){
		$this->db->order_by('adv_order');
		return $this->db->get_where('dr_advertise',array('adv_group'=>1,'adv_show'=>1))->result_array();
	}
}