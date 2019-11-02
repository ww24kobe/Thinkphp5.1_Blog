<?php 


//验证码配置参数
return [
		'codeSet'  => '123456789',
        // 使用背景图片
        'fontSize' => 20,
        // 验证码字体大小(px)
        'useCurve' => false,
        // 是否画混淆曲线
        'useNoise' => false,
        // 是否添加杂点
        'imageH'   => 0,
        // 验证码图片高度
        'imageW'   => 0,
        // 验证码图片宽度
        'length'   => 4,
        // 验证码位数
];