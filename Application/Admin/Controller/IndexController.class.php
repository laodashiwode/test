<?php
namespace Admin\Controller;
use Common\Controller\CommonController;
class IndexController extends CommonController {

	public function index(){


		//首页信息
		$info = array(
			'操作系统'=>PHP_OS,
			'运行环境'=>$_SERVER["SERVER_SOFTWARE"],
			'运行方式'=>php_sapi_name(),
			'ThinkPHP版本'=>THINK_VERSION,
			'上传附件限制'=>ini_get('upload_max_filesize'),
			'执行时间限制'=>ini_get('max_execution_time').'秒',
			'服务器时间'=>date("Y-n-j- H:i:s"),
			'北京时间'=>gmdate("Y-n-j- H:i:s",time()+8*3600),
			'服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
			'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
			'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
			'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
		);


		$this->assign('info',$info);
		$this->display();
	}


}