<?php 
namespace app\admin\model;
use think\Model;
class User extends Model{
	protected $pk = 'userid';
	//时间戳的自动完成
	protected $autoWriteTimestamp = true;

	//定义用户名和密码是否匹配
	public static function checkUser($username,$password){
		$password = md5( config('custom.password_salt').$password ); //密码要加密对比
		$userInfo = self::where('username','=',$username)
						->where('password','=',$password)
						->find();
		if($userInfo){
			//设置用户的信息到session中去
			session('username',$userInfo['username']);
			session('userid',$userInfo['userid']);
			return true;
		}

		return false;
	}


}