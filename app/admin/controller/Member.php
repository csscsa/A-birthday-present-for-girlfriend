<?php

namespace app\admin\controller;
use app\admin\common\Base;
use think\Request;
use think\Session;
use app\admin\model\User;
class member extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $user = User::name('user') ->select();
        //$user = User::all();
        //$users['name']
        //$this ->view ->assign('user',$user);
        $arr = array();
        foreach($user as $users){
             array_push($arr, $users);
        }
        //return dump($arr[1]['username']);
        $this ->view ->assign('arr',$arr);
        return $this ->view ->fetch('member');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {

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
    public function delete($id)
    {
        //
    }
}
