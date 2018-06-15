<?php
namespace Admin\Controller;
use Common\Controller\CommonController;
class GoodsController extends CommonController {

	public function index(){
        $goods      = M('goods');
        $count      = $goods->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $goods->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);
        $this->assign('page',$show);// 赋值分页输出
		$this->display();
	}

	public function add(){
	    $goods_type = M('good_type')->order('orderby_id desc')->select();
	    $assign=[
	        'goodstype'=>$goods_type
        ];

	    $this->assign($assign);
	    $this->display();
    }

    public function edit(){
	    $id = I('id');
        $goods_type = M('good_type')->order('orderby_id desc')->select();
        $list = M('goods')->where('good_id =' .$id)->find();
        $list['detail'] = htmlspecialchars_decode($list['detail']);
        $list['turn_img'] = json_decode($list['turn_img']);
        $assign=[
            'goodstype'=>$goods_type,
            'list'=>$list,
        ];

        $this->assign($assign);
        $this->display();
    }

    public function gooddel(){
        $id = I('id');
        M('goods')->where('good_id =' .$id)->delete();
        $this->redirect('index');
    }

    public function handle(){
        $data   = I();
        $goods  = M('goods');
        $data['turn_img'] = json_encode($data['turn_img']);

        if($data['good_id']){
            $id =$data['good_id'];
            unset($data['good_id']);
            $res = $goods->where('good_id ='.$id)->save($data);
        }else{
            $res = $goods->add($data);
        }
        if($res){
            $this->redirect('index');
        }
	}

}