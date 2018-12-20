<?php 
namespace app\admin\validate;
use think\Validate;
/**
 * 栏目验证器
 */
class Cate extends Validate
{
	protected $rule = [
		'catename' => 'require|max:15|unique:cate',
	];
	protected $message = [
		'catename.require' => '栏目名称不能为空！',
		'catename.max' => '栏目名称不能大于10个字符！',
		'catename.unique' => '栏目名称不能重复！',
	];
	protected $scene = [
		'edit' => ['catename'=>'require|max:15',]
	];
}