<?php 
namespace app\admin\model;
use think\Model;

class Category extends Model{
	//当模型名称和表名不一致的时候才需要指定
	// protected $table = 'tp_categoryccc'; 
	// 模型必须指定主键
	protected $pk = 'categoryid'; //主键
	//时间戳的自动完成
	protected $autoWriteTimestamp = true;

	//针对当前时间字段取出后的默认时间格式
    protected $dateFormat="Y-m-d H:i:s";

	//封装一个无限极分类(递归操作)
	public function getCateTree($data,$parent_id = 0,$level = 1){
		static $list = [];  //静态数组有个特点，只会初始化一次
		foreach($data as $v){
			if($v['parent_id'] == $parent_id){
				$v['level'] = $level; //实现模板中的层级缩进
				$list[] = $v;
				$this->getCateTree($data,$v['categoryid'],$level+1); //递归调用
			}
		}
		return $list;
		
	}

}