<?php 


//自定义配置
return [
	//密码加密的盐salt
	'password_salt' => '#$%^&%',
	//发布状态对应的文章显示
	"is_publish" => [
		0 => '<span style="color:red">未发布</span>',
		1 => '<span style="color:green">已发布</span>'
	]
];