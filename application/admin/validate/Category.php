<?php 
namespace app\admin\validate;
use think\Validate;

//category验证器类
class Category extends Validate{
	//1.验证规则
	protected $rule = [
		//字段名=>对应的规则(多个规则用|隔开)
		'name' => 'require|unique:category',
		'parent_id' => 'require'
	];
	//2.验证对应规则不通过的提示信息
	protected $message = [
		//'字段名.规则名' => '提示信息'
		'name.require' => '分类名称不能为空',
		'name.unique' => '分类名重复',
		'parent_id.require' => '请选择分类',
	];
	//3.指定场景验证的规则
	protected $scene = [
		//注意：如果只写字段会验证字段的所有规则，如果只想验证单个规则通过|分隔即可
		//添加save场景，指定验证的字段名
		'save' => ['name','parent_id'],
		//编辑场景update
		'update' => ['name|require','parent_id']
	];
}