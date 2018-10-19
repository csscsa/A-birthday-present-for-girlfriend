<?php
namespace app\index\model;
use think\Model;
class Fan extends Model
{
	//时间戳转换
	public function getLastTimeAttr($val)
	{
		return date('Y/m/d H:m:s',$val);
	} 
	protected $name = 'fankui';
}