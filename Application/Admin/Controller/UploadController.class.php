<?php
namespace Admin\Controller;
use Common\Controller\CommonController;
class UploadController extends CommonController {

	public function upload(){
        $upload = new \Think\Upload(); // 实例化上传类
        $upload->maxSize  	= 2000*2000 ;// 设置附件上传大小 (-1) 是不限值大小
        $upload->allowExts  = array(
            'jpg', 'gif', 'png', 'jpeg','docx','doc'
        );// 设置附件上传类型

        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目

        $upload->savePath  =     '/goods/'; // 设置附件上传（子）目录

        $upload->replace = true; //存在同名文件是否是覆盖

        // 是否使用子目录保存上传文件
        $upload->autoSub = true;

        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息

                $this->error($upload->getError());

        }else{// 上传成功 获取上传文件信息
            $path =  $info['file']['savepath'] . $info['file']['savename'];
            $this->ajaxReturn($path);
        }
	}


}