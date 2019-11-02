<?php 

namespace app\admin\controller;
use think\Controller;
use app\admin\model\Category;
use app\admin\validate\Category as CategoryValidate;

class CategoryController extends Controller{


	public function update(){
		//1.接收post参数
		$postData = input('post.');
		//2.验证（后面通过验证器来实现验证）
		//在save场景，验证$postData中的数据
		$cateValidate = new CategoryValidate();
		$result = $cateValidate->batch()->scene('update')->check($postData);
		//单个验证：失败返回错误信息的字符串,通过getError()获取错误信息字符串，成功返回true
		//批量验证batch()：失败返回false，通过getError()获取错误信息数组，成功返回true
		//判断是否验证成功
		if ($result!== true ) {
			$error = $cateValidate->getError(); 
			$errorInfo = implode(' , ',$error);
			$data = ['code'=>'-1','msg'=>$errorInfo];
			echo json_encode($data);die;
        }
		//3.编辑写入数据库，给前端json提示
		$cateModel = new Category();
		if($cateModel->isUpdate(true)->save($postData)){
			$data = ['code'=>200,'msg'=>'编辑成功'];
		}else{
			$data = ['code'=>-1,'msg'=>'编辑失败'];
		}
		return json($data);
	}

	public function edit($id){
		//取出当前分类的数据
		$row = Category::get($id);
		//获取所有的分类并分配到模板中
		$categorys = Category::all();
		//调用模型方法getCateTree实现无限极分类
		$cateModel = new Category();
		$categorys = $cateModel->getCateTree($categorys);
		return $this->fetch('',[
			'categorys' => $categorys,    
			'row'=>$row
		]);
	}

	public function index(){
		//获取所有的分类并分配到模板中
		$categorys = Category::alias('t1')
							->field("t1.*,t2.name parent_name")
							->leftJoin('tp_category t2','t1.parent_id = t2.categoryid')
							->select();
		//调用模型方法getCateTree实现无限极分类
		$cateModel = new Category();
		$categorys = $cateModel->getCateTree($categorys);
		return $this->fetch('',[
			'categorys' => $categorys
		]);
	}

	public function create(){
		//获取所有的分类并分配到模板中
		$categorys = Category::all();
		//调用模型方法getCateTree实现无限极分类
		$cateModel = new Category();
		$categorys = $cateModel->getCateTree($categorys);
		return $this->fetch('',[
			'categorys' => $categorys
		]);
	}


	public function save(){
		//1.接受数据
		$postData = input('post.');
		//2.验证分类名称是否唯一
		$cateValidate = new CategoryValidate();
		//在save场景，验证$postData中的数据
		$result = $cateValidate->batch()->scene('save')->check($postData);
		//单个验证：失败返回错误信息的字符串,通过getError()获取错误信息字符串，成功返回true
		//批量验证batch()：失败返回false，通过getError()获取错误信息数组，成功返回true
		//判断是否验证成功
		if ($result!== true ) {
			$error = $cateValidate->getError(); 
			$errorInfo = implode(' , ',$error);
			$data = ['code'=>'-1','msg'=>$errorInfo];
			echo json_encode($data);die;
        }
		// if(empty($postData['name'])){
		// 	$data = ['code'=>-2,'msg'=>'分类名称不能为空'];
		// 	return json($data);
		// }
		// $data = Category::where('name','=',$postData['name'])->find();
		// if($data){
		// 	$data = ['code'=>'-1','msg'=>'分类名称占用'];
		// 	echo json_encode($data);die;
		// }
		
		//3.验证通过之后入库，给前端返回json数据
		$cateModel = new Category();
		if($cateModel->save($postData)){
			$data = ['code'=>'200','msg'=>'增加分类成功'];
		}else{
			$data = ['code'=>'-2','msg'=>'增加分类失败'];
		}
		echo json_encode($data);die;
	}



	public function delete(){
		//1.接受参数
		$id = input('post.id');
		//2.含有子分类不能删除
		$data = Category::where("parent_id",'=',$id)->find();
		if($data){
			$data = ['code'=>-1,'msg'=>'含有子分类，不能删除'];
			return json($data);
		}
		//3.删除分类给前端json响应提示
		if(Category::destroy($id)){
			$data = ['code'=>200,'msg'=>'删除成功'];
		}else{
			$data = ['code'=>-2,'msg'=>'删除失败'];
		}
		return json($data);

	}
}