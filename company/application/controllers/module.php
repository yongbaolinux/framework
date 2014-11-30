<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on 2014-3-12
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Module extends CI_Controller{
 		public function __construct(){
 			parent::__construct();
 			$this->load->helper('url');
 			$this->load->helper('common_func');
 			//加载配置操作模型文件
			$this->load->model('configModel');
 			//加载模块操作模型文件
			$this->load->model('moduleModel');
			//加载公共模型文件
			$this->load->model('publicModel');
 			//加载图片操作模型文件
			$this->load->model('imageModel');
			//加载单页面操作模型文件
			$this->load->model('singleModel');
			//加载文章操作模型文件
			$this->load->model('articleModel');
			//加载分页类库
			$this->load->library('pagination');
			
 		}
 		
 	/**
	 * 模块展示页 调用不同的方法来显示内容
	 * 内容模块调用内容显示方法
	 * 列表模块调用列表显示方法
	 * 图片模块调用图片显示方法
	 */
	 	public function show(){
		 		$mid = $this->input->get('mid');
				//判断该模块id对应的模块是否真的存在
				$moduleData = $this->moduleModel->ifModuleExists($mid);
				if(!$mid || !$moduleData['exist']){
					redirect(base_url(),'location');
				}
				//读取网站配置及模板配置
				$config = $this->configModel->select();
				//查询网站模板（数据库中没有记录就用默认的模板 对应的模板文件不存在也用默认的模板
				$config['configSiteTemplate']=$config['configSiteTemplate']?(is_dir(dirname(BASEPATH).'/'.APPPATH.'views/'.$config['configSiteTemplate'])?$config['configSiteTemplate']:'defaults'):'defaults';
		
				$menus1 = $this->publicModel->getTopMenus($config['configSiteMenuLevel']);
				//dump($menus1); 数据库里取出数据order by `menu_path`排序后 可以减轻PHP运算的压力
				//组装新的menu数据 
				/*$menus1_=array();
				foreach ($menus1 as $key=>$value){
					multi_array_tree($value,$menus1_);
				}*/
				//将树形结构的数组输出为无限菜单的HTML
				//$menus1 = print_tree_menu($menus1_);
				//echo($menus1);die();
				//计算顶部菜单宽度
				//$space = count($menus1)+1;
				//$menuWidth = (980-2*$space)/$space;
				$menus2 = $this->publicModel->getBottomMenus();
				//获取位置数据
				$position = $this->publicModel->position($moduleData['data'][0]['module_path']);
				//获取侧边公共信息
				$public = $this->publicModel->sideInfo();
				//dump($public);die();
				//判断module类型
				$moduleType = $moduleData['data'][0]['module_type'];
				switch($moduleType){
					case 3:
							$this->imagesShow($config,$menus1,$menus2,$moduleData,$position,$public);
							break;
					case 2:
							$this->articlesShow($config,$menus1,$menus2,$moduleData,$position,$public);
							break;
					case 1:
							$this->singleShow($config,$menus1,$menus2,$moduleData,$position,$public);
							break;
					default:
							break;
				}
	 	}
 		
	 	/**
		 * 显示图片
		 * 显示某模块下和该模块下所有子模块的所有图片
		 */
		 public function imagesShow($config='',$menus1='',$menus2='',$moduleData='',$position=array(),$public){
			 	$mid = $moduleData['data'][0]['id'];
			 	$imagesData = $this->imageModel->selectImages($mid);
			 	//图片分页
		 		$config['base_url'] = base_url().'index.php?c=module&m=show&mid='.$mid;
		 		$config['total_rows'] = count($imagesData);
			 	$config['per_page'] = 5;
				$config['offset'] = $this->input->get('per_page')?intval($this->input->get('per_page')):0;
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
				$config['page_query_string'] = true;
				$this->pagination->initialize($config);
				$pagination = $this->pagination->create_links();
				//分页查询
				$imagesData = $this->imageModel->selectImages($mid,$config['offset'].','.$config['per_page']);
				$moduleTmpl = $moduleData['data'][0]['module_tmpl'];
				if(!isset($moduleTmpl)){
					$moduleTmpl = 'images';
				};
				$this->load->view($config['configSiteTemplate'].'/'.$moduleTmpl,array('cfg'=>$config,
																				'mid'=>$mid,
																				'menus1'=>$menus1,
																				'menus2'=>$menus2,
																				'module'=>$moduleData['data'][0],
																				'children'=>$moduleData['children'],
																				'imagesData'=>$imagesData,
																				'pagination'=>$pagination,
																				'postion'=>$position,
																				'public'=>$public));
		  }
		  
		  /**
		   * 显示单文章页面
		   */
		 public function singleShow($config,$menus1,$menus2,$moduleData,$position=array(),$public){
		 		$mid = $moduleData['data'][0]['id'];
		 		$singleData = $this->singleModel->selectSingle($mid);
		 		$moduleTmpl = $moduleData['data'][0]['module_tmpl'];
		 		if(!isset($moduleTmpl)){
		 			$moduleTmpl='single';
		 		}
		 		//dump($moduleTmpl);
				//dump($sid);
		   	$this->load->view($config['configSiteTemplate'].'/'.$moduleTmpl,array('cfg'=>$config,
																					'mid'=>$mid,
																					'menus1'=>$menus1,
																					'menus2'=>$menus2,
																					'module'=>$moduleData['data'][0],
																					'children'=>$moduleData['children'],
																					'singleData'=>$singleData,
																					'position'=>$position,
																					'public'=>$public));
		  }
		   
		   /**
		    * 显示文章列表页面
		    */
		 public function articlesShow($config,$menus1,$menus2,$moduleData,$position=array(),$public){
		 		$mid=$moduleData['data'][0]['id'];
		 		//自由切换单页模板
		 		$moduleTmpl = $moduleData['data'][0]['module_tmpl'];
		 		if(!isset($moduleTmpl)){
		 			$moduleTmpl='articles';
		 		}
		 		$articlesData = $this->articleModel->selectArticles($mid);
		 		//文章分页
		 		$config_['page_query_string'] = true;
		 		$config_['total_rows'] = count($articlesData);
		 		$config_['base_url'] = base_url().'index.php?c=module&m=show&mid='.$mid;
		 		$config_['per_page'] = 5;
				$config_['offset'] = $this->input->get('per_page')?intval($this->input->get('per_page')):0;
				$config_['first_link'] = '<< First';
				$config_['first_tag_open'] = '<a href="javascript:void(0);">';
				$config_['first_tag_close'] = '</a>';
				$config_['last_link'] = 'Last >>';
				$config_['last_tag_open'] = '<a href="javascript:void(0);">';
				$config_['last_tag_close'] = '</a>';
				$config_['cur_tag_open'] = '<a class="number current" href="javascript:void(0);">';
				$config_['cur_tag_close'] = '</a>';
				$config_['prev_link'] = '« 上一页';
				$config_['prev_tag_open'] = '<a href="javascript:void(0);">';
				$config_['prev_tag_close'] = '</a>';
				$config_['next_link'] = '下一页 »';
				$this->pagination->initialize($config_);
				$pagination = $this->pagination->create_links();
				//分页查询
				$articlesData = $this->articleModel->selectArticles($mid,$config_['offset'].','.$config_['per_page']);
				$this->load->view($config['configSiteTemplate'].'/'.$moduleTmpl,array(
		 												'cfg'=>$config,
														'mid'=>$mid,
		 												'menus1'=>$menus1,
		 												'menus2'=>$menus2,
		 												'module'=>$moduleData['data'][0],
														'children'=>$moduleData['children'],
		 												'articlesData'=>$articlesData,
		 												'pagination'=>$pagination,
														'position'=>$position,
														'public'=>$public
		 											));
		  }
 }
?>
