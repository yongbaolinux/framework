<?php 
/**
 * 自定义函数库
 * @author 华定平
 */

/**
 * 变量友好输出
 * @author ThinkPHP
 */
if(!function_exists('dump')){
	function dump($var, $echo=true,$label=null, $strict=true)
	{
		$label = ($label===null) ? '' : rtrim($label) . ' ';
		if(!$strict) {
			if (ini_get('html_errors')) {
				$output = print_r($var, true);
				$output = "<pre>".$label.htmlspecialchars($output,ENT_QUOTES)."</pre>";
			} else {
				$output = $label . " : " . print_r($var, true);
			}
		}else {
			ob_start();
			var_dump($var);
			$output = ob_get_clean();
			if(!extension_loaded('xdebug')) {
				$output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
				$output = '<pre>'. $label. htmlspecialchars($output, ENT_QUOTES). '</pre>';
			}
		}
		if ($echo) {
			echo($output);
			return null;
		}else
			return $output;
	}
}

/**
 * 判断请求是否为Ajax请求
 */
if(!function_exists('isAjax')){
	function isAjax() {
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) ) {
			if('xmlhttprequest' == strtolower($_SERVER['HTTP_X_REQUESTED_WITH']))
				return true;
		}
		return false;
	}
}

/**
 * 查找一个键名是否存在一个多维数组中
 * 注意递归的返回值相互传递
 * TODO return $res的写法会引来一个NOTICE 错误
 *  正确的写法应该是下面那个函数的写法
 */
 if(!function_exists('multi_array_key_exists')){
 	function multi_array_key_exists($word,$arr){
 		if(array_key_exists($word,$arr)){
 			return true;
 		} else {
 			foreach($arr as $key=>$value){
 				if(is_array($value)){
 					$res = multi_array_key_exists($word,$value);
 				}
 			}
 		}
 		return $res;
 	}
 }
 
  /**
 * 查找一个键名是否在多维数组中（查找son键名的键值作为递归
 * @param $word 待查找的键名
 * @param $arr	待查找的数组
 * TODO 增加可移植性
 */
 if(!function_exists('multi_array_key_exists_')){
 	function multi_array_key_exists_($word,$arr){
 		if(array_key_exists($word,$arr)){
 			return true;
 		} else {
 			foreach ($arr as $key=>$value){					
 				if(isset($value['children']) && is_array($value['children'])){
 					return multi_array_key_exists_($word,$value['children']);
 				}
 			}
 		}
 	}
 }
 
 /**
  *将一个数组添加到多维数组中 形成一个树形结构（添加到son键名下）
 *TODO 增加可移植性
  */
 if(!function_exists('multi_array_tree')){
 	function multi_array_tree($src,&$desc){
 		//首先确定在树形结构中是否存在父节点 不存在就直接在根上添加
 		if(!multi_array_key_exists_($src['module_fid'],$desc)){
 			$desc[$src['id']]=$src;
 		} else {
 			if(array_key_exists($src['module_fid'],$desc)){
 				$desc[$src['module_fid']]['children'][$src['id']]=$src;
 			} else {
 				foreach($desc as $key=>&$value){
 					if(is_array($value['children'])){
 						multi_array_tree($src,$value['children']);
 					}
 				}
 			}
 		}
 	}
 }
 
   /**
  * 将树形数组结构打印成无限菜单结构
  */
 if(!function_exists('print_tree_menu')){
 	function print_tree_menu($menu=array()){
 		$html='';
 		foreach($menu as $key=>$value){
 			if(isset($value['children'])){
 				$html.='<li><a href="'.base_url().'index.php?c=module&m=show&mid='.$value['id'].'"><span>'.$value['module_cname'].'</span></a>';
 				$html.='<ul>'.print_tree_menu($value['children']).'</ul>';
 				$html.='</li>';
 			} else {
 				$html.='<li><a href="'.base_url().'index.php?c=module&m=show&mid='.$value['id'].'"><span>'.$value['module_cname'].'</span></a></li>';
 			}
 		}
 		return $html;
 	}
 }
/** 
 * 本函数用于检测文件是否含有BOM头 
 *  
 * @param string $filename  要检测的文件路劲
 * @return boolean 
 */
 if(!function_exists('checkBOM')){
	function checkBOM($filename){  
	    if(!file_exists($filename)) exit('请输入正确的文件路径名称!');  
	    $content = '';  
	    $charset = array();  
	    $content = @file_get_contents($filename);  
	    $charset[1] = substr($content, 0, 1);  
	    $charset[2] = substr($content, 1, 1);  
	    $charset[3] = substr($content, 2, 1);  
	      
	    //判断是否含有BOM头  
	      
	    if(ord($charset[1]) == 239 && ord($charset[2])==187 && ord($charset[3])==191){  
	        //$content = substr($content,3);  
	        //@file_put_contents($filename, $content);
	        return true;
	    } else {
	    	return false;
	    }
	}
 }
 
 /**
  * 本函数用于清除文件夹中的包含BOM头文件的BOM头
  * @param string $dirname 要清除的文件夹路径
  * @return boolean
  */
 if(!function_exists('cleanBOM')){
 	function cleanBOM($file_or_dir_name=''){
 		if(!file_exists($file_or_dir_name)){
 			exit('文件夹或文件不存在');
 		}
 		if(is_dir($file_or_dir_name)){
	 		foreach (glob($file_or_dir_name.'\*') as $value){
	 			cleanBOM($value);
	 		}
 		} else {
 			if(checkBOM($file_or_dir_name)){
	 			$content = @file_get_contents($file_or_dir_name);
	 			$content = substr($content,3);
	 			@file_put_contents($file_or_dir_name,$content);
 			}
	 	}
 	}
 }
 
 /**
  * 检查数组是否为多维数组
  * @param array $arr	待检查的数组
  * @return	boolean		多维数组返回true  一维数组返回false 不是数组返回null
  */
 if(!function_exists('checkMultiArray')){
 	function checkMultiArray($arr){
 		if(is_array($arr)){
 			$multi = false;
 			foreach ($arr as $v){
 				if(is_array($v)){
 					$multi = true;
 					break;
 				}
 			}
 			return $multi;
 		}
 	}
 }
 
/**
 * 获取数组的维度
 * @param	array	$arr	待检查的数组
 * @return	int		一维返回1 	二维返回2	不是数组返回null
 */
 if(!function_exists('getArrayDimension')){
 	
 }

/**
 * 获取一个文件夹下的所有文件的md5哈希值 (不包括文件夹)
 * @param   string  文件夹路径
 * @return  array   包含的所有文件的md5哈希值集合
 */
 if(!function_exists('getFilesHash')){
     function getFilesHash($filePath){
         $files = array();
         foreach (glob($filePath.'/*') as $file){
             $files[] = md5_file($file);
         }
         return $files;
     }
 }
 
//var_dump(getFilesHash('C:\wamp\www\framework\data'));
//echo (__FILE__.' '.__LINE__);
?>