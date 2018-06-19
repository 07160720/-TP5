<?php
namespace app\admin\validate;
use think\Validate;

class Goods extends Validate
{
	protected $rule = [
		'goods_name' => 'require|max:90',
		'goods_thumb' =>  'require',
		'goods_price' =>  'require|egt:1|float',
		'goods_after_price' =>  'require|egt:0|float',
		'goods_sales' =>  'require|egt:0|float',
		'goods_inventory' => 'require|egt:0|float',
	];

	protected $msg = [
		'goods_name.require' => '请输入商品名称',
		'goods_thumb'    =>    '请选择图片上传',
		'goods_price'    =>    '请输入商品价格',
		'goods_sales'    =>    '请输入商品销量',
		'goods_inventory'   => '请输入商品库存',
	];
}



?>