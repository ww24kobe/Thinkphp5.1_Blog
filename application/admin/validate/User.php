<?php 
namespace app\admin\validate;
use think\Validate;

class User extends Validate{
	//1.定义规则
	protected $rule = [
		'newpassword' => 'require|min:6',
		'repassword'  => 'require|confirm:newpassword'
	];
	//2.定义提示信息
	protected $message = [
		'newpassword.require' => '新密码不能为空',
		'newpassword.min' => '新密码长度最少为6位',
		'repassword.require' => '确认新密码不能为空',
		'repassword.confirm' => '两次密码不一致',
	];
	//3.定义场景
	protected $scene = [
		'updpassword' => ['newpassword','repassword']
	];
}