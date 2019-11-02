<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function get_user_id(){
	if(session('userid')){
		return session('userid');
	}else{
		return false;
	}
}


//返回图片的完整路径
function fullImgPath($path){
	if($path){
		$path = '/uploads/'.$path;
		return "<img src='$path' />";
	}else{
		return '暂无图片';
	}
}