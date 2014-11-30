<?php
/**
 * 文章操作模型类
 */
class ArticlesModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 *  获取所有文章列表
	 *  @param	$where WHERE子句条件
	 *  @param	$limit LIMIT子句条件
	 */
	public function getArticles($where='',$limit=''){
		if(!empty($where)){
			$where = " WHERE ".$where;
		}
		if(!empty($limit)){
			$limit = " LIMIT ".$limit;
		}
		$sql = "SELECT *,`dr_articles`.`id` as `id` FROM `dr_articles` INNER JOIN `dr_module` on `dr_articles`.`module_id`=`dr_module`.`id` ".$where.$limit;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	/**
	 * 添加文章
	 */
	public function addArticle($data=''){
		$time = time();
		session_start();
		if(is_array($data) && count($data) > 0){
			$data_ = array(
				'title'=>$data['title'],
				'content'=>$data['content'],
				'module_id'=>$data['module_id'],
				'ctime'=>$time,
				'mtime'=>$time,
				'creator'=>$_SESSION['admin']
			);
			$result = $this->db->insert('dr_articles',$data_);
			if($result){
				$insertId = $this->db->insert_id();
				$moduleData = $this->db->get_where('dr_module',array('id'=>$data_['module_id']));
				$moduleData = $moduleData->result_array();
				//映射模块类型
				switch ($moduleData[0]['module_type']){
					case 1:
						$moduleData[0]['module_type']='单页面';
						break;
					case 2:
						$moduleData[0]['module_type']='列表页';
						break;
					case 3:
						$moduleData[0]['module_type']='图片页';
						break;
					case 4:
						$moduleData[0]['module_type']='下载页';
						break;
					default:
						break;
				}
				//返回新入库的数据
				$insertedData = array(
					'id'=>$insertId,
					'title'=>$data_['title'],
					'module_name'=>$moduleData[0]['module_cname'],
					'module_type'=>$moduleData[0]['module_type'],
					'author'=>$data_['creator'],
					'postime'=>$time
				);
			}
			return array('res'=>$result,'data'=>$insertedData);
		} 
	}
	
	/**
	 * 删除文章
	 */
	public function delArticles($id=''){
		if(isset($id) && !empty($id)){
			$result = $this->db->delete('dr_articles',array('id'=>$id));
			return $result;
		}
	}
	
	/**
	 * 修改文章
	 */
	public function editArticle($data=''){
		if(is_array($data) && count($data) > 0){
			$data_ = array(
				'title'=>$data['title'],
				'content'=>$data['content'],
				'module_id'=>$data['module_id'],
				'mtime'=>time(),
			);
			$this->db->where('id',$data['id']);
			$result = $this->db->update('dr_articles',$data_);
			return $result;
		}
	}
}
?>