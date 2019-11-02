<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;

use app\admin\model\Category;


class TestController extends Controller
{

	public function modelCurd(){
		//查询数据
		// $data = Category::get('1');
		// $data = Category::where('categoryid','=',2)->find();
		//$data = Category::where("categoryid",'>',3)->all();
		// $data = Category::where("categoryid",'>',3)
		// 			->order('categoryid desc')
		// 			->field('name,categoryid')
		// 			->select();
		//删除数据
		// $data = Category::destroy(7);
		// $data = Category::where('categoryid','=','6')->delete(); 
		
		//增加
		/*$data = [
			'name' => '排球',
			'parent_id' => 1,
		];
		$categoryModel = new Category();
		dump( $categoryModel->save($data) );*/

		//更新
		/*$data = [
			'categoryid' => 9, //必须携带更新的主键值
			'name' => '地球',
			'sdfdfdaf' => 'wedfghj'
		];
		$categoryModel = new Category();
		dump($categoryModel->isUpdate(true)->save($data) );*/
		// $data = [
		// 	'name' => '橄榄球',
		// 	'intro' => '橄榄球橄榄球橄榄球橄榄球'
		// ];
		// $categoryModel = new Category();
		// dump( $categoryModel->allowField(['name'])->save($data,['categoryid'=>9])  );
		
		//增加
		$data = [
			'name' => '清洁球777',
			'parent_id' => 1,

		];
		$categoryModel = new Category();
		dump( $categoryModel->save($data,['categoryid'=>11]) );
	}


	//添加
	public function dbc(){
		$data = [
			'title'=>'台球皇帝',
			'content' => '台球皇帝是亨得利',
			'cate_id' => 10,
			'create_time' => time(),
			'update_time' => time()
		];
		dump( Db::name('article')->insert($data) );
	}

	//更新
	public function dbu(){
		/*$data = ['title'=>888];
		dump( Db::name('article')->where('articleid',4)->update($data) );*/

		/*$data = ['title'=>'台球皇上','articleid'=>'10'];
		dump( Db::name('article')->update($data) );*/

		// dump( Db::name('article')->where('articleid','=',10)->setField('title','台球太子') );
		// dump( Db::name('article')->where('articleid','=',10)->setInc('cate_id') );
		// dump( Db::name('article')->where('articleid','=',10)->setInc('cate_id',5) );
		dump( Db::name('article')->where('articleid','=',10)->setDec('cate_id',10) );
	}

	//删除
	public function dbd(){
		// $data = Db::name('article')->delete(1);
		$data = Db::name('article')->delete('2,3');

		dump($data);
	}

	//查询(链式操作)
	public function dbr(){
		/*$data = Db::name('article')
					->order('articleid desc')
					->field('articleid,title,content')
					->select();*/

		/*$data = Db::name('article')
					->field('count(articleid) as count,cate_id')
					->group('cate_id')
					->select();*/

		/*$data = Db::name('article')
					->limit(2,3)
					->select();*/

		// $data = Db::name('article')->where('articleid','>','7')->count();
		// $data = Db::name('article')->where('articleid','>','7')->max('cate_id');
		// $data = Db::name('article')->where('articleid','>','7')->min('cate_id');
		// $data = Db::name('article')->where('articleid','>','7')->avg('cate_id');
		// $data = Db::name('article')->where('articleid','>','7')->sum('cate_id');
		// $data = Db::name('article')->where('articleid','>=','7')->select();
		// $data = Db::name('article')->where('articleid','<>','7')->select();
		/*$data = Db::name('article')
				->where('title','like','%台球%')
				->where('cate_id','=',1)
				->select();*/
		// $data = Db::name('article')->whereNotIn('articleid','6,7,8')->select();
		// $data = Db::name('article')->alias('t1')->where('t1.articleid','>',7)->select();
		// $data = Db::name('article')
						
		// 				->alias('t1')
		// 				// ->join('tp_category t2','t1.cate_id = t2.categoryid','left')
		// 				->leftJoin('tp_category t2','t1.cate_id = t2.categoryid')
		// 				->field('t1.*,t2.name  cate_name')
		// 				->select();
		// dump( $data );


		//find(主键值)查询一条
		// $data = Db::table('tp_article')->where('articleid',4)->find();
		/*$data = Db::name('article')->where('articleid',2)->find();
		dump($data);*/

		//select('主键值')查询多条 ，不指定主键值会查询表的所有的数据
		// $data = Db::table('tp_article')->select('1,2');
		// $data = Db::table('tp_article')->select();
		
		// $sql = "select * from tp_article where articleid = 8";
		// $data = Db::query($sql); //成功返回二维数组
		// dump($data);
		
		$sql = "delete from tp_article where articleid = 8";
		$data = Db::execute($sql); //成功返回二维数组
		dump($data);

	}

	public function test3(){
		return $this->fetch();
	}
    
	public function test2(){
		// echo "id:".input('get.id',0).'<br />';
		// // echo "name:".input('get.name','','strtoupper');
		// echo "name:".input('get.name','');
		echo input('get.name');
		// dump( input('get.') ); //获取整个get参数，返回是一维数组
		// dump( input('param.') ); //获取整个get参数，返回是一维数组

		//接受数组参数ids
		dump( input('ids/a') );
	}


    //类型参数绑定（依赖注入）
    public function test(Request $request){ 
    	//1.通过$this->request获取请求对象
    	/*$request = $this->request;
    	dump( $request );*/

    	//2.方法依赖注入
    	// dump($request);
    	
    	//3.通过助手函数获取
    	// $request = request();
    	// dump( $request );
    	
    	//1.实例化模型对象
    	$category = new Category();
    	// $category->aa();
    	Category::bb();
    	//2.通过助手函数model来实例化模型对象
    	// $data = model('Category')->find(2);
    	// dump($data);
    }


    public function test1(){
    	echo request()->host().'<br />';
    	echo request()->domain().'<br />';
    	echo request()->module().'<br />';
    	echo request()->controller().'<br />';
    	echo request()->action().'<br />';
    	echo request()->url(true).'<br />';
    	dump( request()->isGet() );
    	dump( request()->isPost() );
    	dump( request()->isAjax() );
    }

}
