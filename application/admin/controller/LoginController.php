<?php 
namespace app\admin\controller;

use think\Controller;
use app\admin\model\User;
use app\admin\validate\User as UserValidate;  // as 起别名，后续只能用别名

class LoginController extends Controller{


	public function updpassword(){
		if(request()->isAjax()){
			//1.接受post参数
			$postData = input('post.');
			//2.定义验证器进行验证
			$userValdiate = new UserValidate();
			$result = $userValdiate->batch()->scene('updpassword')->check($postData);
			if($result !== true){
				$errorInfo = implode(' , ',$userValdiate->getError() );
				$data = ['code'=>-1,'msg'=>$errorInfo];
				return json($data);
			}
			//判断旧密码是否输入正确
			$userid = get_user_id();
			//原密码加密
			$oldPassword = md5( config('custom.password_salt').$postData['oldpassword'] );
			//把查询条件写在数组中
			$where = [
				'userid' => ['=',$userid],
				'password'=> ['=',$oldPassword]
			];
			$data = User::where($where)->find();
			if(!$data){
				$data = ['code'=>-2,'msg'=>'旧密码输入错误'];
				return json($data);
			}
			//3.直接修改密码，给前端ajax响应json数据
			$newPassword = md5( config('custom.password_salt').$postData['newpassword'] );
			$saveData = [
				'userid'=> $userid,
				'password' => $newPassword
			];
			// echo $userid;die;
			$userModel = new User();
			if($userModel->isUpdate(true)->save($saveData)){
				$data = ['code'=>200,'msg'=>'密码更新成功'];
				return json($data);
			}else{
				$data = ['code'=>-3,'msg'=>'密码更新失败'];
				return json($data);
			}
		}else{
			return $this->fetch();
		}
		
	}

	public function login(){
		//echo  md5( config('custom.password_salt').'123456' );die;
		//判断是否登录
		if(get_user_id()){
			return redirect("/admin/index");
		}


		//1.判断是否是ajax请求
		if(request()->isAjax()){
			//2.接受用户名和密码
			$username = input('post.username');
			$password = input('post.password');
			$captcha = input('post.captcha');
			//3.验证验证码是否正确
			if(!captcha_check($captcha)){
				$data = ['code'=>-2,'msg'=>'验证码输入错误'];
				echo json_encode($data);exit; //原生的写法
			}
			//4.判断用户名和密码是否匹配
			$loginStatus = User::checkUser($username,$password);
			if($loginStatus){
				
				$data = ['code'=>200,'msg'=>'登录成功'];
			}else{
				$data = ['code'=>-1,'msg'=>'用户名或密码失败'];
			}
			echo json_encode($data);exit; //原生的写法
			// return json($data); // tp的写法
			
		}else{
			//get请求
			return $this->fetch();
		}

		
	}



	public function logout(){
		//清除session
		session(null);
		return redirect('/admin/login');
	}
}

