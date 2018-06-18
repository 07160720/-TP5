<?php
namespace app\index\controller;
use think\Controller;
/**
*  首页商品的控制台
*/
class Goods extends Controller
{
	 public function goodslist($goods_pid = ''){
	 	if ($goods_pid == '') {
	 		$this->redirect('index/index');
	 	}
	 	$goods_select = db('goods')->where('goods_pid','eq',$goods_pid)->where("goods_status","eq",'1')->paginate(3);
	    $this->assign('goods_select',$goods_select);
	 	return view();
	 }
}

?>