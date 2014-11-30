<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 操作模块配置的模型
 * @author 华定平
 */
class ModuleModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		//连接数据库
		$this->load->database();
		$this->load->helper('url');
	}

	/**
	 * 查询module数据 将其处理成需要的形式
	 * @param $key 查询字段
	 * @param $value 查询值
	 * @return mixed
	 */
	public function select($key=null,$value=null,$order=null,$offset=null,$per_page=null){
		if(isset($value)){
			$where = $key.'` ="'.$value.'"';
			$this->db->where($where);
		}
		if(isset($order)){
			$this->db->order_by($order);
		}
		if(isset($offset) && isset($per_page)){
			$this->db->limit($per_page,$offset);
		}
		$query = $this->db->get('dr_module');
		$modules = $query->result_array();
		return $modules;
	}
	
	/**
	 * 查询"移动到"的select框里的模块数据
	 */
	public function select_move($var1,$var2){
		if(isset($var2)){
			//首先 不能再显示父模块 因为本身就已位于父模块内 其次 不能移到子模块里去
			$sql = "SELECT * FROM `dr_module` WHERE `id`!=$var2 AND !find_in_set($var1,`module_path`) ORDER BY `module_path`";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
		}
	}
	
	/**
	 * 修改保存module数据
	 */
	public function save($data=''){
		if(is_array($data)){
			$data_ = array(
					'module_cname'=>$data['name'],
					'menu_show'=>$data['show'],
					'module_order'=>$data['order'],
			);
			if($data['move'] !== '-1'){
				$data_['module_fid'] = $data['move'];
			}
			$this->db->where('id',$data['id']);
			$this->db->update('dr_module',$data_);
			//检查是否有更新
			$count = $this->db->affected_rows();
			return $count?true:false;		
		}
	}
	
	/**
	 * 删除module数据
	 * @return number 用不同的数据标识处理结果
	 * -1为有文章 不能删除该模型
	 * 0为有子模块 不能删除父模块
	 * 1为删除成功  （删除成功后 检查父模块的module_son字段）
	 * 2为删除失败
	 */
	public function delete($id=''){
		if(isset($id) && !empty($id)){
			$query = $this->db->get_where('dr_module',array('module_fid'=>$id));
			$query_ = $this->db->get_where('dr_articles',array('module_id'=>$id));
			if(count($query->result_array()) > 0){
				return 0;
			} elseif(count($query_->result_array()) > 0){
				return -1;
			} else {
				//查找父模块的id
				$this->db->select('module_fid');
				$module_fid = $this->db->get_where('dr_module',array('id'=>$id));
				$module_fid = $module_fid->result_array();
				$module_fid = $module_fid[0]['module_fid'];
				$result = $this->db->delete('dr_module',array('id'=>$id));
				if($result){
					//不是一级目录
					if($module_fid > 0){
						$query2 = $this->db->get_where('dr_module',array('module_fid'=>$module_fid));
						//如果还有兄弟节点 将父模块module_son字段置为1 否则置为0
						if(count($query2->result_array()) > 0){
							$this->db->where('id',$module_fid);
							$this->db->update('dr_module',array('module_son'=>1));
						} else {
							$this->db->where('id',$module_fid);
							$this->db->update('dr_module',array('module_son'=>0));
						}
					}
					return 1;
				} else {
					return 2;
				}
			}
		}
	}
	
	/**
	 * 新增module数据
	 */
	public function addModule($data=''){
		if(is_array($data) && count($data) > 0){
			$data_ = array(
				'module_cname'=>$data['moduleName'],
				'menu_show'=>$data['moduleShow'],
				'module_order'=>$data['moduleOrder'],
				'module_custom_url'=>$data['moduleUrl'],
				'module_title'=>$data['moduleTitle'],
				'module_fid'=>$data['moduleFid'],
				'module_level'=>$data['moduleLevel']+1,
				'module_son'=>0,
				'module_type'=>$data['moduleType']
				);
			$result = $this->db->insert('dr_module',$data_);
			//添加成功后去更新父模块的module_son 字段 如果是0 就置为1 如果为1 则不变
			//更新新纪录的 module_path字段
			if($result){
				//新纪录id
				$id = $this->db->insert_id();
				if($data['moduleSon']==='0'){
					$this->db->where('id',$data['moduleFid']);
					$result = $this->db->update('dr_module',array('module_son'=>1));
					if(!$result){
						return $result;
					}
				}
				//查找父模块的module_path值
				$this->db->select('module_path');
				$modulePath = $this->db->get_where('dr_module',array('id'=>$data['moduleFid']));
				$modulePath = $modulePath->result_array();
				//更新module_path字段
				$modulePath = $modulePath ? $modulePath[0]['module_path'].','.$id : $id;
				$this->db->where('id',$id);
				$result = $this->db->update('dr_module',array('module_path'=>$modulePath));
				return $result;
			}
			return $result;
		}
	}
	
	/**
	 * 测试存储过程
	 */
	/* public function testProcedure($sql=''){
		$procedure = 'use company ';
		$procedure .= 'DELIMITER &&'."\n";
		$procedure .= 'CREATE PROCEDURE testprocedure(OUT count INT)'."\n";
		$procedure .= 'READS SQL DATA'."\n";
		$procedure .= 'BEGIN'."\n";
		$procedure .= 'SELECT COUNT(*) INTO count FROM `dr_config`;'."\n";
		$procedure .= 'END &&'."\n";
		//$procedure .= 'DELIMITER ;';
		$res = $this->db->query($procedure);
		return $res;
	} */
	
	/**
	 * 自定义链接数据库测试存储过程     不使用框架的方式
	 */
	public function createProcedure(){
		//$customConfig = array('dbhost'=>'localhost','dbuser'=>'root','dbpwd'=>'h8720828','dbname'=>'company');
		//$link = mysqli_connect($customConfig['dbhost'],$customConfig['dbuser'],$customConfig['dbpwd'],$customConfig['dbname']);
		//mysql_select_db($customConfig['dbname'],$link);
		//mysqli_query($link,'delimiter &&');	//在控制台因为不知道什么时候结束 所以需要delimiter 而在php中 SQL总是一条一条执行的
		$res = $this->db->query('create procedure testprocedure(IN admin_name char,OUT count_num INT) begin select COUNT(*) INTO count_num from `dr_admin` where `admin_account`=admin_name; end');
		return $res;
	}
}

?>
