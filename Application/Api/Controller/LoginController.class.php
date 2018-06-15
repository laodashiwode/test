<?php
namespace Api\Controller;
use Common\Controller\CommonController;
class LoginController extends CommonController {

	public function index(){
        $data = I();
        $user_info  = M('user')->where(['openid '=>$data['openid']])->find();
        if($user_info){
            $user_info['token'] = com_encrypt( get_random_code(16), 'ENCODE', AUTH_KEY, 3600*24*6);
            returnjson('200','获取成功',$user_info);
        }
        returnjson('400','获取失败','');

	}


}