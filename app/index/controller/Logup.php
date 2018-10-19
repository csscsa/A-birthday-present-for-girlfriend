<?php

namespace app\index\controller;
use app\index\common\Baseindex;
use think\Request;
use think\Session;
use app\index\model\Admin;

class Logup extends Baseindex
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this ->view ->fetch('logup');
    }

    public function check()
    {
        $status = 0;
        $data = input('post.');
        // $data = $request ->param();
        $username = $data['username'];
        $password = md5($data['password']);
        $email = $data['email'];
        $phone = $data['phone'];
        $name = $data['name'];
        $user = new Admin;


        //查询



        $res = Admin::name('user')->where('username',$username)->find();

        if(is_null($res)){
            $user -> username = $username;
            $user -> password = $password;
            $user -> email = $email;
            $user -> phone = $phone;
            $user -> name = $name;
            $user -> touxiang = '/index/images/profile.png';
            if($user ->save()){
            $this ->success('注册成功，正在跳转......','login/index');
            // return $this -> view ->fetch('index/index');

        }else{
        $this ->success(未知错误,'logup/index');
}
            
            $status = 1;
        } else{
            $this ->success('用户名已存在，请重新注册......','logup/index');
         }
 
        // // return $message;
        
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete()
    {


        return $username.$email.$name.$email;
        
    }
}
