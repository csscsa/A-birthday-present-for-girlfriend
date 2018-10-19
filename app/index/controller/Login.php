<?php

namespace app\index\controller;
use app\index\common\Baseindex;
use think\Request;
use think\Session;
use app\index\model\Admin;


class Login extends Baseindex
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $this -> alreadyLogin();
        return $this ->view ->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function check()
    {
        $status = 0;
        $data = input('post.');
        // $data = $request ->param();
        $username = $data['username'];
        $password = md5($data['password']);

        //查询
        $map = ['username'=>$username];

        $user = Admin::get($map);

        if(is_null($user)){
            $message = "用户名不正确";
        } elseif ($user -> password !=$password) {
            $message = '密码不正确';
        }
        else {
            $status = 1;
            $message = '验证通过';
            $user -> setInc('login_count');
            $user ->save(['last_time'=>time()]);

            Session::set('user_id',$username);
            $this ->view ->assign('username',$username);
        } 
        // return $message;
        if($status==1){
            $this ->success('登录成功，正在跳转......','index/index');
            // return $this -> view ->fetch('index/index');

        }else{
        $this ->success($message,'login/index');
}
    }


    /**
     * 注销
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function logout()

    {
        if(is_null(Session::get('user_id')))
{
    $this ->success('当前未登录，正在跳转至登录页面......','login/index');
}else{
     Session::delete('user_id');

     $this ->success('注销成功，正在返回......','login/index');
}


           
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
    public function delete($id)
    {
        //
    }
}
