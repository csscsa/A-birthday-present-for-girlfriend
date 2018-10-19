<?php

namespace app\admin\controller;
use app\admin\common\Base;
use app\admin\model\Admin;
use think\Request;

class adminlist extends Base
{

    public function index()
    {
        $admin = Admin::get('1');
        $this ->view ->assign('admin',$admin);
        return $this ->view ->fetch('admin_list');
    }


    public function edit(Request $request)
    {
         $admin = Admin::get('1');
        $this ->view ->assign('admin',$admin);
        return $this ->view ->fetch('admin_edit');
    }


    public function genggai(Request $request)
    {
        $data = input('post.');
        $admin = Admin::get('1');

        $admin ->username = $data['username'];
        $admin ->email = $data['email'];
        $admin ->password = md5($data['pass']);
        $admin ->save();
        $this ->success('更改成功');
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
