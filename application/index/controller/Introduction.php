<?php
namespace app\index\controller;

/**
* 
*/
class Introduction extends \think\Controller
{
	
	public function index()
	{   
		// 显示商品详情控制器
		 return view('introduction');
	}
}