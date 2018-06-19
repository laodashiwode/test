<?php
namespace Api\Controller;
use Common\Controller\CommonController;
use Think\Controller;

class GoodtypeController extends Controller {

	public function index(){
        $list = M('good_type')->order('orderby_id asc')->select();
        if(!$list){
            returnjson('400','fail','数据查询失败');
        }else if(count($list)==0){
            returnjson('200','success','暂无相关数据');
        }else{
            returnjson('200','success',$list);
        }
	}
}