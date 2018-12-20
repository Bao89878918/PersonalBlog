<?php 
namespace app\admin\validate;
use think\Validate;
/**
 * 文章类验证器
 */
class Article extends Validate
{
	protected $rule = [
		'title' => 'require|max:65',
		'type' => 'require',
		'hits' => 'number',
		'owner' => 'require',
		'descibe'	=> 'require',
		'content' => 'require'
	];

	protected $message = [
		'title.require' => '文章标题不能为空！',
		'title.max' => '文章标题最大值为30！',
		'hits.number' => '访问量是数值型！',
		'owner.require' => '作者不能为空！',
		'content.require' => '文章不能为空！',
		'descibe.require'	=>	'编辑器错误',
		'type.require' => '文章所属栏目出错！'
	];
}