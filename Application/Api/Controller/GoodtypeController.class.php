<?php
namespace Admin\Controller;
use Common\Controller\CommonController;
class GoodtypeController extends CommonController {

	public function index(){
        $list = M('good_type')->select();
        $this->assign('list',$list);
		$this->display();
	}

	public function add(){
        $this->display();
    }
    public function edit(){
        $id = I('get.id');
        $info = M('good_type')->where('type_id  ='. $id)->find();
        $this->assign('info',$info);
        $this->display();
    }

    public function gooddel(){
        $id = I('id');
        M('good_type')->where('type_id =' .$id)->delete();
        $this->redirect('index');
    }

    public function handle(){
        $data = I();
        $goodtype = M('good_type');
        if($data['type_id']){
            $res =  $goodtype->where('type_id  ='. $data['type_id'])
                ->save(['type_name' => $data['type_name'],'orderby_id' => $data['orderby_id']]);
        }else{
            $res =  $goodtype->add(['type_name' => $data['type_name'],'orderby_id' => $data['orderby_id']]);
        }
        if($res){
            $this->redirect('index');
        }
    }

}