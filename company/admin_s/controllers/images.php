<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on 2014-3-6
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Images extends CI_Controller{
 			public function __construct(){
 				parent::__construct();
 				//图片上传配置
 				$imgUploadConfig['upload_path'] = './uploads/';
 				$imgUploadConfig['allowed_types'] = 'jpg|gif|png|x-xpixmap|jpeg';
 				$imgUploadConfig['max_size'] = '10240';					//单位kb
 				$this->load->library('upload',$imgUploadConfig);
 				
 				$this->load->helper('url');
 				$this->load->helper('common_func');
 				$this->load->model('imageModel');
 				$this->load->library('pagination');
 			}
 			
 			/**
 			 * 显示图片 - 图片列表页
 			 */
 			public function imageShow(){
 				$imagesData = $this->imageModel->getAllImages();
 				//分页
 				$config['base_url'] = base_url().'admin_s.php/images/imageShow';
				$config['total_rows'] = count($imagesData);
				$config['per_page'] = 5;
				$config['offset'] = $this->uri->segment(3)?$this->uri->segment(3):0;
				$config['first_link'] = '<< First';
				$config['first_tag_open'] = '<a href="javascript:void(0);">';
				$config['first_tag_close'] = '</a>';
				$config['last_link'] = 'Last >>';
				$config['last_tag_open'] = '<a href="javascript:void(0);">';
				$config['last_tag_close'] = '</a>';
				$config['cur_tag_open'] = '<a class="number current" href="javascript:void(0);">';
				$config['cur_tag_close'] = '</a>';
				$config['prev_link'] = '« 上一页';
				$config['prev_tag_open'] = '<a href="javascript:void(0);">';
				$config['prev_tag_close'] = '</a>';
				$config['next_link'] = '下一页 »';
				$this->pagination->initialize($config);
				$pagination = $this->pagination->create_links();
				$imagesData = $this->imageModel->getAllImages(null,$config['per_page'].','.$config['offset']);
 				$this->load->view('imageShow',array('images'=>$imagesData,'pagination'=>$pagination));
 			}
 			
 			/**
 			 * 根据imageID获取一张图片的信息(ajax)
 			 */
 			public function getOneImage(){
 				if(isAjax()){
 					$imageID = $this->input->post('imageID');
 			 		$imageData = $this->imageModel->getOneImage('imageID',$imageID);
 			 		echo json_encode($imageData);
 				}
 			 }
 			 
 			/**
 			 * 获取所有图片模块(ajax)
 			 */
 			public function getAllImageModules(){
 			 	if(isAjax()){
 			 		$moduleID = $this->input->post('moduleID');
 			 		$where = '';
 			 		if(isset($moduleID) && !empty($moduleID)){
 			 			$where .= "id != $moduleID "; 
 			 		}
 			 		echo json_encode($this->imageModel->getAllImageModules($where));
 			 	}
 			 }
 			 
 			 /**
 			  * 添加图片 - 接受图片上传数据
 			  */
 			 public function doUpload(){
 			 	//验证表单非图片数据
 			 	$picName = $this->input->post('picName');
 			 	$moduleId = $this->input->post('moduleId');
 			 	$moduleName = $this->input->post('moduleName');
 			 	if(empty($picName)){
 			 		echo '<script type="text/javascript">alert(\'图片标题不能为空\');</script>';
 			 		return;
 			 	}
 			 	if(empty($moduleId)){
 			 		echo '<script type="text/javascript">alert(\'图片所属模块ID不能为空\');</script>';
 			 		return;
 			 	}
 			 	if(empty($moduleName)){
 			 		echo '<script type="text/javascript">alert(\'图片所属模块名不能为空\');</script>';
 			 		return;
 			 	}
 			 	if($_FILES['pic']['name']==''){
 			 		echo '<script type="text/javascript">alert(\'图片文件不能为空\');</script>';
 			 		return;
 			 	}
 			 	//验证上传图片数据
 			 	if($this->upload->do_upload('pic')){
 			 		//图片信息入库
 			 		$imgData = $this->upload->data();	//上传成功后的图片信息
 			 		$picData = array(
 			 			'title'=>$picName,
 			 			'path'=>'uploads/'.$imgData['file_name'],
 			 			'moduleID'=>$moduleId,
 			 			'moduleName'=>$moduleName
 			 		);
 			 		$result = $this->imageModel->addImage($picData);
 			 		if($result){
 			 			echo '<script type="text/javascript">alert(\'添加成功\');var s = window.parent.document.createElement(\'script\');s.text="box.boxClose(function(){window.location.reload();});";window.parent.document.body.appendChild(s);</script>';
 			 		} else {
 			 			echo '<script type="text/javascript">alert(\'添加失败\');</script>';
 			 		}
 			 	} else {
 			 		echo '<script type="text/javascript">alert("'.strip_tags($this->upload->display_errors()).'")</script>';
 			 	}
 			 }
 			 
 			 /**
 			  * 编辑图片 - 接受图片修改数据
 			  * TODO 数据验证
 			  */
 			 public function doEdit(){
 			 	//未更改图片
 			 	if($_FILES['editPic']['name']==''){
 			 		$post = $this->input->post();
 			 		$result = $this->imageModel->updateImage($post);
 			 		if($result){
 			 			echo '<script type="text/javascript">alert(\'更新成功\');var s = window.parent.document.createElement(\'script\');s.text="box.boxClose(function(){window.location.reload();});";window.parent.document.body.appendChild(s);</script>';
 			 		} else {
 			 			echo '<script type="text/javascript">alert(\'更新失败\');</script>';
 			 		}
 			 	} else {
 			 		//重新选择了图片上传
 			 		if($this->upload->do_upload('editPic')){
 			 			$post = $this->input->post();
 			 			$arr = $this->upload->data();
 			 			$post['path'] = 'uploads/'.$arr['file_name'];
 			 			$result = $this->imageModel->updateImage2($post);
 			 			if($result){
 			 				echo '<script type="text/javascript">alert(\'更新成功\');var s = window.parent.document.createElement(\'script\');s.text="box.boxClose(function(){window.location.reload();});";window.parent.document.body.appendChild(s);</script>';
 			 			} else {
 			 				echo '<script type="text/javascript">alert(\'更新失败\');</script>';
 			 			}
 			 		} else {
 			 			echo '<script type="text/javascript">alert("'.strip_tags($this->upload->display_errors()).'")</script>';
 			 		}
 			 	}
 			 }
 			 
 			 /**
 			  * 删除图片（ajax）
 			  */
 			 public function delImage(){
 			 	if(isAjax()){
 			 		$imageID = $this->input->post('imageID');
 			 		$result = $this->imageModel->delImage($imageID);
 			 		echo json_encode($result);
 			 	}
 			 }
 }
?>
