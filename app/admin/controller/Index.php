<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\common\Base;
class Index extends Base
{
	public function index()
	{

		$this -> isLogin();
		return $this ->view ->fetch('index');
	}
	public function welcome()
	{
		return $this ->view ->fetch();
	}
	public function login()
	{

		
		return $this ->view ->fetch('login');
	}
    public function adminlist()
	{

		// $this -> isLogin();
		return $this ->view ->fetch('admin_list');
	}
}