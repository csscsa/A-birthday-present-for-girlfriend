<?php
namespace app\admin\model;
use think\Model;
class Liuyana extends Model
{
	//时间戳转换
	public function getLastTimeAttr($val)
	{
		return date('Y/m/d H:m:s',$val);
	} 
	protected $name = 'myguests';
}