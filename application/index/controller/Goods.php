<?php
namespace app\index\controller;
use think\Controller;
/**
*  首页商品的控制台
*/
class Goods extends Controller
{
	 public function goodslist1($goods_pid = ''){
	 	if ($goods_pid == '') {
	 		$this->redirect('index/index');
	 	}
	 	$goods_select = db('goods')->where('goods_pid','eq',$goods_pid)->where("goods_status","eq",'1')->paginate(3);
	    $this->assign('goods_select',$goods_select);
	 	return view();
	 }
    
     public function goodslist($goods_pid = '',$goods_order = 'id'){
     	if ($goods_pid == '') {
        
     		$this->redirect('index/index');
     	}
     	$goods_exist = db('goods')->where('goods_pid','eq',$goods_pid)->where("goods_status","eq",'1')->select();
     	if (empty($goods_exist)) {
     		$this->redirect('index/index');
     	}

     	if ($goods_order == 'goods_sales') {
     		$goods_order = 'goods_sales desc';
     	}else if ($goods_order == 'goods_price_asc') {
     		$goods_order = 'goods_price';
     	}else if ($goods_order == 'goods_price_desc') {
     		$goods_order = 'goods_price desc';
     	}else{
            $goods_order = 'goods_id';
     	}

        $this->assign('goods_pid',$goods_pid);
     	$goods_model = new \app\admin\model\Goods;

        $cate_model = new \app\admin\model\Cate;

         $goods_all = $goods_model->all(function($query) use ($goods_pid,$goods_order)
         {
          $query->where('goods_pid','eq',$goods_pid)->where("goods_status","eq",'1')->order($goods_order);
         });
       
          $goods_all_toArray = $goods_all->toArray();
          $goods_info = array();
         foreach ($goods_all_toArray as $key => $value) {
            $goods_get = $goods_model->get($value['goods_id']);
            $goods_keywords = $goods_get->keywords;
            $goods_keywords_toArray = $goods_keywords->toArray();
            $value['keywords'] = $goods_keywords_toArray;
            $goods_cate = $goods_get->cate;
            $goods_cate_toArray = $goods_cate->toArray();
            $value['cate_name'] = $goods_cate_toArray['cate_name'];
            $goods_info[] = $value;
          }
          
          $this->assign('goods_info',$goods_info);
          //dump($goods_info);die;
          $goods_totle = count($goods_info);//得到数据总数         
          $page_class = new \app\admin\controller\Page($goods_totle,3);
          $show = $page_class->fpage();//模板显示的内容
          $limit = $page_class->setlimit();// 获取limit信息 '3,2'
          $limit = explode(',', $limit);//['3','2']
          $list = array_slice($goods_info, $limit[0],$limit[1]);//123456
          $this->assign('show',$show);
          $this->assign('goods_select',$list);
          return view();
     }

     public function introduction($goods_id = ''){
          // 商品详细信息界面
          if ($goods_id == '') {
             $this->redirect('index/index');
          }
          $goods_find = db('goods')->find($goods_id);
          if (empty($goods_find)) {
             $this->redirect('index/index');
          }

          $goods_model = new \app\admin\model\Goods;
          $goods_get =   $goods_model->get($goods_id);
          $goods_get_toArray = $goods_get->toArray();
          $goods_keywords =  $goods_get->keywords;
          $goods_keywords_toArray =  $goods_keywords->toArray();
          $goods_get_toArray['keywords'] = $goods_keywords_toArray;
          $this->assign('goods_introduction',$goods_get_toArray);

          //商品定位的实现
            $goods_pid = $goods_find['goods_pid'];
            $cate_select = db('cate')->select();
            $cate_model = new \app\admin\model\Cate;
            $cate_in = $cate_model->getFatherId($cate_select,$goods_pid);
            //dump($cate_in);die;
            $this->assign('cate_in',$cate_in);
            return view();
     }

}

?>