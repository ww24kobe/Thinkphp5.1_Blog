<?php 
namespace app\admin\model;
use think\Model;

class Article extends Model{
	//当模型名称和表名不一致的时候才需要指定
	// protected $table = 'tp_categoryccc'; 
	// 模型必须指定主键
	protected $pk = 'articleid'; //主键
	//时间戳的自动完成
	protected $autoWriteTimestamp = true;


}