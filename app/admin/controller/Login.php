<?php

namespace app\admin\controller;
use app\admin\common\Base;
use think\Request;
use think\Session;
use app\admin\model\Admin;
class Login extends Base
{
    //渲染登录页面
    public function index()

    {
       $this -> alreadyLogin();
        return $this -> view ->fetch('login');
    }

        //验证登录页面
    public function check()
    {
        $status = 0;
        $data = input('post.');
        // $data = $request ->param();
        $username = $data['username'];
        $password = md5($data['password']);

        //查询
        $map = ['username'=>$username];

        $admin = Admin::get($map);

        if(is_null($admin)){
            $message = "用户名不正确";
        } elseif ($admin -> password !=$password) {
            $message = '密码不正确';
        }
        else {
            $status = 1;
            $message = '验证通过';
            $admin -> setInc('login_count');
            $admin ->save(['last_time'=>time()]);
            Session::set('user',$username);

        } 
        // return $message;
        if($status==1){
            
            $this ->success('登录成功，正在跳转......','index/index');
            // return $this -> view ->fetch('index/index');

        }else{
        $this ->success($message,'login/index');
}
           // return ['status'=> $status,'message'=> $message];
              }
        //退出登录

    public function logout()
    {
            Session::delete('user');
            
            $this ->success('注销成功，正在返回......','login/index');
    }

    
}
