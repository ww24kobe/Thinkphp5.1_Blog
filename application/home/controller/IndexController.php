<?php 

namespace app\home\controller;
use think\Controller;
use app\admin\model\Article;
use app\admin\model\Category;

class IndexController extends Controller{


	//控制器初始化的方法（调用本类方法之前会先调用此方法）
	public function initialize(){
		//取出所有的无限极分类的数据
		$categorys = Category::select();
		$cateModel = new Category();
		$categorys = $cateModel->getCateTree($categorys);
		//分配即可
		$this->assign('categorys',$categorys);
	}


	public function detail($id){
		$row = Article::get($id);
		// //取出所有的无限极分类的数据
		// $categorys = Category::select();
		// $cateModel = new Category();
		// $categorys = $cateModel->getCateTree($categorys);
		return $this->fetch('',[
			'row' => $row,  
			// 'categorys' => $categorys
		]);
	}

	public function index(){
		//取出所有的文章并分页
		$articles = Article::where('is_publish','=',1)
			->order('create_time desc')
			->paginate(5);
		//取出所有的无限极分类的数据
		// $categorys = Category::select();
		// $cateModel = new Category();
		// $categorys = $cateModel->getCateTree($categorys);
		return $this->fetch('',[
			'articles' => $articles,
			// 'categorys' => $categorys
		]);
	}



	public function cate($id){
		//1.得到当前分类所有的子分类id
		$cateids = Category::field('categoryid')
						->where('parent_id','=',$id)
						->select(); 
		$ids = [$id]; //把当前id也加入进去
		foreach($cateids as $v){
			$ids[] = $v['categoryid'];
		}

		//2.查询文章的id在分类$ids中的文章即可 in
		$where = [];
		$where[] = ['cate_id','in',$ids];
		$where[] = ['is_publish','=',1];
		$articles = Article::where($where)->paginate(5);
		// echo $articles;die;

		// $categorys = Category::select();
		// $cateModel = new Category();
		// $categorys = $cateModel->getCateTree($categorys);
		return $this->fetch('',[
			'articles' => $articles,
			// 'categorys' => $categorys
		]);
		
	}
}