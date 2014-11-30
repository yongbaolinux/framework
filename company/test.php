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
 * 查找一个键名是否存在一个多维数组中（直接查找键名的方式）
 * 注意递归的返回值相互传递
 */
 if(!function_exists('multi_array_key_exists')){
 	function multi_array_key_exists($key,$arr){
 		if(array_key_exists($key,$arr)){
 			return true;
 		} else {
 			foreach($arr as $value){
 				if(is_array($value)){
 					$res = multi_array_key_exists($key,$value);
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
 				if(is_array($value['son'])){
 					$res = multi_array_key_exists_($word,$value['son']);
 				}
 			}
 		}
 		return $res;
 	}
 }
 
 /**
  *将一个数组添加到多维数组中 形成一个树形结构（添加到son键名下）
 *TODO 增加可移植性
  */
 if(!function_exists('multi_array_tree')){
 	function multi_array_tree($src,&$desc){
 		if(!multi_array_key_exists_($src['fid'],$desc)){
 			$desc[$src['id']]=$src;
 		} else {
 			if(array_key_exists($src['fid'],&$desc)){
 				$desc[$src['fid']]['son'][$src['id']]=$src;
 			} else {
 				foreach($desc as $key=>&$value){
 					if(is_array($value['son'])){
 						multi_array_tree($src,&$value['son']);
 					}
 				}
 			}
 		}
 	}
 }
 
 
/* $arr = array('1'=>
 		array('fid'=>'0',
 				'son'=>array('3'=>array()),
 				'id'=>'1'
 			),
 		'2'=>array()
 );
 $son = array('fid'=>'3','id'=>'27');*/
 //dump($arr);
 //dump($son);
 $desc=array();
 $src1=array('id'=>'1','fid'=>'0');
 $src2=array('id'=>'27','fid'=>'1');
 $src3=array('id'=>'68','fid'=>'27');
 $src4=array('id'=>'2','fid'=>'0');
 $src5=array('id'=>'67','fid'=>'0');
 $src6=array('id'=>'9','fid'=>'0');
 multi_array_tree($src1,$desc);
 multi_array_tree($src2,$desc);
 multi_array_tree($src3,$desc);
 multi_array_tree($src4,$desc);
 multi_array_tree($src5,$desc);
 multi_array_tree($src6,$desc);
        
 //dump($desc);
  /**
  * 将树形数组结构打印成无限菜单结构
  */
 if(!function_exists('print_tree_menu')){
 	function print_tree_menu($menu=array()){
 		$html='';
 		foreach($menu as $key=>$value){
 			if(isset($value['son'])){
 				$html .='<li><a><span></span></a>';
 				$html .='<ul>'.print_tree_menu($value['son']).'</ul>';
 				$html .='</li>';
 			} else {
 				$html .='<li><a><span></span></a></li>';
 			}
 		}
 		return $html;
 	}
 }
 $menu = print_tree_menu($desc);
 //var_dump($menu);
?>