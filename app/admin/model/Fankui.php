<?php
namespace app\admin\model;
use think\Model;
class Fankui extends Model
{
	//时间戳转换
	public function getTimeAttr($val)
	{
		return date('Y/m/d H:m:s',$val);
	} 
	protected $name = 'fankui';
}