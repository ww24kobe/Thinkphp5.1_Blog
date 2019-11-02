<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;

class IndexController extends Controller
{
    public function index(){
    	return $this->fetch();
    }

    public function welcome(){
    	//查询出文章的总数量，在分配到模板中
    	$count = Db::name('article')->count();
    	return $this->fetch('',[
    		'count' => $count
    	]);
    }
}
