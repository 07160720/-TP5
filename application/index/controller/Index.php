<?php
namespace app\index\controller;
// 商城首页
class Index extends \think\Controller
{
    public function index()
    {
    	$cate_select = db('cate')->order('cate_sort')->select();
    	$cate_model = model('cate');
    	$cate_list = $cate_model->getChildren($cate_select);
    	// var_dump($cate_list);die();
    	$this->assign('cate_list',$cate_list);
        return view();
    }
}

?>