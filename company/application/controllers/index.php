<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//加载通用函数
		$this->load->helper('common_func');
		$this->load->helper('url');
		//加载配置操作模型文件
		$this->load->model('configModel');
		//加载模块操作模型文件
		$this->load->model('moduleModel');
		//加载公共模型文件
		$this->load->model('publicModel');
		//加载广告模型文件
		$this->load->model('advertiseModel');
	}
	
	/**
	 * 首页
	 */
	public function index()
	{
		//获取网站设置
		$config = $this->configModel->select();
		//获取顶部菜单
		$menus1 = $this->publicModel->getTopMenus($config['configSiteMenuLevel']);
		//dump($menus1);
		//组装新的menu数据 
		/*$menus1_=array();
		foreach ($menus1 as $key=>$value){
			multi_array_tree($value,$menus1_);
		}*/
		//将树形结构的数组输出为无限菜单的HTML
		//$menus1 = print_tree_menu($menus1_);
		//计算顶部菜单宽度
		$space = count($menus1)+1;
		$menuWidth = (980-2*$space)/$space;
		//获取底部菜单
		$menus2 = $this->publicModel->getBottomMenus();
		//开启了轮播才查询轮播图片数据
		$indexPicSlider = $config['configSiteIndexPicSlider']?$this->advertiseModel->selectIndexPicSlider():null;
		//模板以参数的方式传递进来 先查找模板文件夹的所有模板 看参数是否对应 不对应就从数据库里查
		define('TPL_PATH',dirname(BASEPATH).'/application/views');		//定义模板路径
		//echo TPL_PATH;
		foreach(glob(TPL_PATH.'\*') as $key=>$value){
			if(is_dir($value)){
				$templates[] = basename($value);
			}
		}
		if(isset($_GET['tpl']) && !empty($_GET['tpl']) && in_array(trim($_GET['tpl']),$templates)){
			$config['configSiteTemplate'] = $_GET['tpl'];
		} else {
		  //查询网站模板（数据库中没有记录就用默认的模板 对应的模板文件不存在也用默认的模板
		  	$config['configSiteTemplate']=$config['configSiteTemplate']?(is_dir(dirname(BASEPATH).'/'.APPPATH.'views/'.$config['configSiteTemplate'])?$config['configSiteTemplate']:'defaults'):'defaults';
		}
		//联系我们信息
		$contact = $this->publicModel->contactUsInfo();
		$this->load->view($config['configSiteTemplate'].'/index',array('cfg'=>$config,
																		'menus1'=>$menus1,
																		'menus2'=>$menus2,
																		'menuWidth'=>$menuWidth,
																		'indexPicSlider'=>$indexPicSlider,
																		'contact'=>$contact));
		
	} 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
