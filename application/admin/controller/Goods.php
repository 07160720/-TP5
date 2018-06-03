<?php
namespace app\admin\controller;
use think\Validate;
/**
* 
*/
class Goods extends \think\Controller
{
	 public function add(){
	    // 添加商品的界面
        if (session('goods_thumb')) {
        	$url_pre = DS.'jd'.DS.'public';
        	$url = str_replace($url_pre,'.', session('goods_thumb'));
        	 if (file_exists($url)) {
        	     unlink($url);
        	 }
        }
	 	session('goods_thumb',null); // 清空session
        $cate_select = db('cate')->select();
        $cate_model = model('Cate');
        $cate_list = $cate_model->getChildrenId($cate_select);
        // 获取无限极分类列表
        $this->assign('cate_list',$cate_list);

		$cate_list1 = $cate_model->getChildren($cate_select);

		$this->assign('cate_list1',$cate_list1);
	 	return view();

	 }

	 public function uploadthumb(){
	 	//  利用插件上传图片的方法
	 	$file = request()->file('goods_thumb');
	 	$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
	 	if ($info) {
	 		 $address = DS . 'jd' . DS .'public' . DS . 'uploads' . DS . $info->getSaveName();
	 		 session('goods_thumb',$address); // 存储session
	 		 return $address;
	 	}else{
	 		echo $file->getError();
	 	}
	 }

	 public function addhanddle(){
            $post = request()->post();
            $post['goods_thumb'] = session('goods_thumb');
            $post['goods_status'] = isset($post['goods_status'])?$post['goods_status']:'0';
            
            $post['goods_pid'] = isset($post['goods_pid'])?$post['goods_pid']:null;

            $validate = validate('Goods');
            $result = $validate->check($post);
            if(!$result){
            	dump($validate->getError());
            }

            $goods_add_result = db('goods')->insert($post);
            if ($goods_add_result) {
                $this->success('商品添加成功','cate/catelist');
            }else{
                $this->error('商品添加失败','cate/catelist');
            }
            session('goods_thumb',null);
	 }

	 public function canclethumb(){
	 	if (request()->isAjax()) {
	 	      if (session('goods_thumb')) {
	 	      	 $url_pre = DS.'jd'.DS.'public';
	 	      	 $url = str_replace($url_pre, '.', session('goods_thumb'));
	 	      	 if ($url) {
	 	      	 	unlink($url);
	 	      	 }
	 	      }
	 	      session('goods_thumb',null);
	 	}
	 }

}

?>