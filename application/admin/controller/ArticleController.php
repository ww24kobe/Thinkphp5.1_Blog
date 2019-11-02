<?php 
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Article;
use app\admin\model\Category;
use think\Db;
class ArticleController extends Controller{


	public function index(){
		// echo strtotime('2019-11-29 12:12:12'); //把日期格式转化为对应的时间戳，为了便于查询比较
		//接受查询条件
		$title = input('get.title','','trim');
		$start = input('get.start','','strtotime');
		$end = input('get.end','','strtotime');
		//组装查询条件
		$where = [];
		if(!empty($title)){
			// $where[] = ['字段名','查询表达式','值']
			$where[] = ['t1.title','like','%'.$title.'%']; 
		}
		if(!empty($start)){
			$where[] = ['t1.create_time','>=',$start];
		}
		if(!empty($end)){
			$where[] = ['t1.create_time','<=',$end];
		}
		
		//取出所有的文章数据
		$articles = Article::alias('t1')
					->field('t1.*,t2.name cate_name')
					->join('tp_category t2','t1.cate_id = t2.categoryid','left')
					->order('t1.create_time desc')
					->where($where)
					->paginate(5);
		return $this->fetch('',[
			'articles' => $articles
		]);
	}

	public function delete(){
		$id = input('post.id');
		if(Article::destroy($id)){
			$data = ['code'=>200,'msg'=>'删除成功'];
		}else{
			$data = ['code'=>-1,'msg'=>'删除失败'];
		}
		return json($data);
	}

	public function create(){
		//取出所有的分类，并且经过无限极处理
		$categorys = Category::all();
		$cateModel  = new Category();
		$categorys = $cateModel->getCateTree($categorys);
		return $this->fetch('',[
			'categorys' => $categorys
		]);
	}

	public function save(){
		$postData = input('post.');
		$image = $this->uploadImg();
		$postData['image'] = $image;
		//入库
		$artModel = new Article();
		if($artModel->save($postData)){
			$data = ['code'=>200,'msg'=>'添加成功'];
		}else{
			$data = ['code'=>-1,'msg'=>'添加失败'];
		}
		return json($data);
		
	}


	public function edit($id){
		//1.取出文章id的数据
		$row = Article::get($id);
		//2.取出所有的无限极分类数据
		$categorys = Category::all();
		$cateModel  = new Category();
		$categorys = $cateModel->getCateTree($categorys);
		//3.输出模板
		return $this->fetch('',[
			'row' => $row,   
			'categorys' => $categorys
		]);
	}


	public function update(){
		$postData = input('post.');
		$image = $this->uploadImg();
		$postData['image'] = $image;
		//入库
		$artModel = new Article();
		//找到旧图片路径
		$oldImage = Db::name('article')->field('image')->find($postData['articleid']);
		if($artModel->isUpdate(true)->save($postData)){
			//删除原图片
			$path = "./uploads/".$oldImage['image'];
			//删除文件，@符号一般抑制一些错误
			@unlink($path);
			$data = ['code'=>200,'msg'=>'编辑成功'];
		}else{
			$data = ['code'=>-1,'msg'=>'编辑失败'];
		}
		return json($data);

	}

	//封装一个文件上传的方法
	public function uploadImg(){
		// 获取表单上传文件 例如上传了001.jpg
	    $file = request()->file('image');
	    if(!$file){
	    	return '';
	    }
	    // 移动到框架应用根目录/uploads/ 目录下
	    // 在php文件中,路径'./'是以入口文件index.php为当前位置
	    $info = $file->move( './uploads/');
	    if($info){
	        // 成功上传后 获取上传信息
	        // 输出 jpg
	        //echo $info->getExtension();
	        // 输出 2016082042a79759f284b767dfcb2a0197904287.jpg
	        // 把反斜杠替换成正斜杠
	        return str_replace('\\','/',$info->getSaveName());
	        // 输出 42a79759f284b767dfcb2a0197904287.jpg
	        //echo $info->getFilename(); 
	    }else{
	        // 上传失败获取错误信息
	        return '';
	    }
	}


	public function getContent(){
		if(request()->isAjax()){
			//1.接受id参数
			$id = input('get.id');
			//2.查询指定id的内容
			$data = Article::field('content')->where('articleid','=',$id)->find();
			//3.返回json数据给ajax
			$responseData = ["content"=>$data['content']];
			return json($responseData);
		}
	}

}