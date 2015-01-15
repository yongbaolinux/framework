<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/
//该图片处理脚本即将弃用 改为利用ci的图片处理类写一个专门的图片处理方法 这个文件有个BOM头 导致上传图片不成功
// Define a destination
/*$targetFolder = '/company/uploads/logo'; // Relative to the root

$verifyToken = md5('I_love_you' . $_POST['time']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;				//这种写法并不好
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];		//沿用原名
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);		//直接用源文件名的扩展名来判断类型是否合法 这种方法不严谨 后缀名是可以随意改动的
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		var_dump($_FILES['Filedata']);
		echo $targetFolder.'/'.$_FILES['Filedata']['name'];
		//echo json_encode($_FILES['Filedata']);
	} else {
		echo 'Invalid file type.';
	}
}*/
	$token = md5('I_love_you'.$_POST['time']);
	if(count($_FILES) > 0 && $token == $_POST['token']){
		//判断文件类型是否合法 很多源码是利用$_FILES['name']也即源文件的后缀名来判断 这是不严谨的 因为后缀名是可以任意更改的
		//严谨的做法应该是根据$_FILES['type']来判断 但在uploadify中没法用这个值来判断 因为这个值是application/octet-stream 故只能用后缀来判断
		$valid_type_array = array('jpeg','jpg','bmp','png','gif');
		$type = pathinfo($_FILES['Filedata']['name']);
		if(in_array($type['extension'],$valid_type_array)){
			//判断文件大小
			if($_FILES['Filedata']['size'] <= 6*1024*1024){			//$_FILES['xxx']['size']单位是bytes
				//确定目标文件的位置
				$target_dir = rtrim($_SERVER['DOCUMENT_ROOT'],'/').'/company/uploads/logo/';
				if(!is_dir($target_dir)){
					mkdir($target_dir,777,true);
				}
				//目标文件的名字 和上传的原名相同 也可以自己定义命名规则 随机什么的
				$target_name = $_FILES['Filedata']['name'];
				//目标文件的位置确定 如果目标位置已经有文件 那么将原来的文件备份
				$target_url = $target_dir.$target_name;
				if(file_exists($target_url)){
					rename($target_url,$target_url.'.bak');
				}
				move_uploaded_file($_FILES['Filedata']['tmp_name'], $target_url);
				if(file_exists($target_url)){
					//echo json_encode(array('code'=>1,'msg'=>'文件上传成功'));
					//缩减处理图像
					image_deal($target_url);
					echo $target_name;
				} else {
					echo json_encode(array('code'=>-4,'msg'=>'文件上传失败'));
				}
			} else {
				//var_dump($_FILES['Filedata']);
				echo json_encode(array('code'=>-3,'msg'=>'上传文件不能超过6M大小'));
			}
		} else {
			echo json_encode(array('code'=>-2,'msg'=>'上传文件类型不合法'));
		}
	} else {
		echo json_encode(array('code'=>-1,'msg'=>'没有文件数据'));
	}
	
	//php处理裁剪图像
	function image_deal($filename=''){
		if(isset($filename) && !empty($filename)){
			//利用getimagesize函数获取图片的宽高
			$imageinfo = getimagesize($filename);
			if($imageinfo == false){
				echo '文件地址不是有效的图片';
			} else {
				$type = $imageinfo['mime'];
				$width = $imageinfo[0];
				$height = $imageinfo[1];
				$max_width = 500;			//新生成的图片的最大宽度
				$max_height = 500;			//新生成的图片的最大高度
				if($width > $max_width || $height > $max_height){
					if($width/$height > ($max_width/$max_height)){		
						$new_width = $max_width;
						$new_height = $height / ($width/$max_width);	//高度进行等比缩放
					} else {
						$new_height = $max_height;
						$new_width = $width / ($height/$max_height);
					}
					switch($type){
						case 'image/jpeg':
							$img = imagecreatefromjpeg($filename);break;	//打开图像文件
						case 'image/png':
							$img = imagecreatefrompng($filename);break;
						case 'image/gif':
							$img = imagecreatefromgif($filename);break;
					}
					$new_img = imagecreatetruecolor($new_width, $new_height);	//创建一个真彩色图像
					$copy_res = imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);//拷贝图像资源
					if($copy_res){
						imagejpeg($new_img,$filename);	//输出图像资源到文件 并覆盖源文件
						imagedestroy($img);				//销毁源文件图像资源句柄
						
					} else {
						echo '拷贝图像资源失败';
					}
					
				}
			}
		} else {
			echo '参数错误';
		}
	}
	
?>
