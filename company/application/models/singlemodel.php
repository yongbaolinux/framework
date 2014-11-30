<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on 2014-3-13
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 单页面内容操作模型类
 */
 class SingleModel extends CI_Model{
 		public function __construct(){
 			parent::__construct();
 			$this->load->database();
 		}
 		
 		public function selectSingle($mid=''){
 			$query = $this->db->get_where('dr_single',array('moduleID'=>$mid));
 			return $query->result_array();
 		}
 }
?>
