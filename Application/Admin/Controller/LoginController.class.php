<?php
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function login()
    {
        if (IS_POST) {
            $admin = M("admin");
            $map['admin'] = I("post.admin");
            $map['pwd'] = md5(I("post.pwd"));
            $u = $admin->where($map)->find();
            if ($u) {
                session('admin', $map['admin']);
                $data['log_num'] = $u['log_num']+1;
                $admin->where('id = '.$u['id'])->save($data);
                echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
                echo '<script>alert("登陆成功！");window.location.href="http://' . $_SERVER[HTTP_HOST] . U('admin/Index/index') . '";</script>';
            } else {
                echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>";
                echo '<script>alert("账号或密码错误，请核对！");window.location.href="http://' . $_SERVER[HTTP_HOST] . U('admin/Login/login') . '";</script>';
            }
        } else {
            $this->display();
        }
    }

    public function logout()
    {
        session('[destroy]');   //thinkphp中清除session方法
        setcookie("admin", '');
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
        echo '<script>alert("退出成功！");
        window.location.href="http://' . $_SERVER[HTTP_HOST] . U('admin/Login/login') . '";</script>';
    }
}
