<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台广告操作模型
 * @author root
 *
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
		return $this->db->get_where('dr_advertise',array('adv_group'=>1))->result_array();
	}
	
	/**
	 * 添加首页焦点轮播图
	 */
	public function addIndexPicSlider($data=array()){
		$res = $this->db->insert('dr_advertise',$data);
		if($res){
			return array('res'=>true,'msg'=>'添加成功');
		} else {
			return array('res'=>true,'msg'=>'添加失败');
		}
	}
}
