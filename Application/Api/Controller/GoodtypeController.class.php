<?php
namespace Api\Controller;
use Common\Controller\CommonController;
use Think\Controller;

class GoodtypeController extends Controller {

	public function index(){
        $list = M('good_type')->order('orderby_id asc')->select();
        returnjson('200','success',$list);
	}
}