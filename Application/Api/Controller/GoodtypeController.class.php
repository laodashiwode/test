<?php
namespace Api\Controller;
use Common\Controller\CommonController;
class GoodtypeController extends CommonController {

	public function index(){
        $list = M('good_type')->order('orderby_id asc')->select();
        returnjson('200','success',$list);
	}
}