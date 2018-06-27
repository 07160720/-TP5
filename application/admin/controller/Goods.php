<?php
namespace app\admin\controller;
use think\Validate;
/**
* 
*/
if (!isset($_SESSION['imgupload'])){
   session_start();
}

class Goods extends \think\Controller
{
	 public function add(){
	      // 添加商品的界面
        if (cookie('imgupload')) {
           // 反序列法
           $cookie_arr = unserialize(cookie('imgupload'));
           // 利用foreach实时删除
           foreach ($cookie_arr as $key => $value) {
             $url_pre = DS.'jd'.DS.'public';
             $url = str_replace($url_pre,'.',$value);
             if (file_exists($url)) {
                 unlink($url);
             }
           }
        }
        cookie('img',null);
        unset($_SESSION['imgupload']);
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
            //添加商品表单提交处理
            
            $post = request()->post();
            unset($post['goods_img']);

            $post['goods_thumb'] = session('goods_thumb');
            $post['goods_status'] = isset($post['goods_status'])?$post['goods_status']:'0';
            
            $post['goods_pid'] = isset($post['goods_pid'])?$post['goods_pid']:null;
            $post['goods_after_price'] = empty( $post['goods_after_price'])?'0':$post['goods_after_price'];
        
            if ( $post['goods_after_price'] != 0) {
              if ($post['goods_after_price']>=$post['goods_price']) {
                  session('goods_thumb',null);
                  //unset($_SESSION['imgupload']);
                 $this->error('促销价格不能大于商品价格','goods/add');
              }
            }

            $validate = validate('Goods');

            $imgupload = $_SESSION['imgupload'];

            $result = $validate->check($post);

            if(!$validate->check($post)){
              //session('goods_thumb',null);
              //unset($_SESSION['imgupload']);
            	$this->error($validate->getError(),'goods/add');
            }

            $goods_add_result = db('goods')->insertGetId($post);
          
            if ($goods_add_result) {
                session('goods_thumb',null);
                $goods_model = new \app\admin\model\Goods;
                $goods =  $goods_model->find($goods_add_result);
                foreach ($imgupload as $key => $value) {
                   $goods->img()->save(['url'=>$value]);
                }
                //unset($_SESSION['imgupload']);
                $this->success('商品添加成功','goods/goodslist');
            }else{
                session('goods_thumb',null);
                $this->error('商品添加失败','goods/goodslist');
            }
           
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
    
          public function goodslist($goods_pid = ''){

            $goods_model = model('Goods');
            $goods_all = $goods_model->all();
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

            $cate_model = model('Cate');
            $cate_select = db('cate')->select();
            $cate_list1 = $cate_model->getChildren($cate_select);
        // 获取无限极分类+列表
            $this->assign('cate_list1',$cate_list1);
            $cate_find = db('cate')->find($goods_pid);

            if ($cate_find) {
              $goods_all = $goods_model->all(function($query) use ($goods_pid)
              {
                $query->where('goods_pid','eq',$goods_pid);
              });
              $this->assign('cate_find',$cate_find);
            }else{

              $goods_all = $goods_model->all();
              $this->assign('cate_find','');

            }
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
          $this->assign('goods_info',$list);
          return view();
        }

	 public function upd($goods_id = ''){
	 	// 商品修改界面显示
	 	if ($goods_id == '') {
	 		$this->redirect('goods/goodslist');
	 	}
	 	$goods_find = db('goods')->find($goods_id);
	 	if (empty($goods_find)) {
     $this->redirect('goods/goodslist');
   }

   if (session('goods_thumb')!=$goods_find['goods_thumb']) {
    $url_pre = DS.'jd'.DS.'public';
    $url = str_replace($url_pre, '.', session('goods_thumb'));
    if (file_exists($url)){
     unlink($url);
   }
 } 

        // 清除旧照片
        session('goods_thumb',null);
	    	$cate_select = db('cate')->select();
        $cate_model = model('Cate');
        // 获取无限级分类列表
        $cate_list1 = $cate_model->getChildren($cate_select);

        $cate_in = $cate_model->getFatherId($cate_select,$goods_find['goods_pid']);
        //var_dump($cate_in);die;
        $cate_in_new['one'] = $cate_in[0];
        $cate_in_new['two'] = $cate_in[1];
        $cate_in_new['three'] = $cate_in[2];

        $this->assign('cate_in',$cate_in_new);
        $this->assign('goods_find',$goods_find);
        $this->assign('cate_list1',$cate_list1);
        // 获取商品细节图信息
        $img_select = db('img')->where('goods_id','eq',$goods_id)->select();
        if (isset($_SESSION['imgupload'])) {
            foreach ($_SESSION['imgupload'] as $key => $value) {
              $url_pre = DS.'jd'.DS.'public';
              $url = str_replace($url_pre, '.',$value);
              if (file_exists($url)){
                 unlink($url);
              }
           }
        }
        unset($_SESSION['imgupload']);
        foreach ($img_select as $key => $value) {
           $_SESSION['imgupload'][] = $value['url'];
        }
        
        $this->assign('img_select',$img_select);
	 	    return view();
	 }

	 public function updhanddle(){
	 	// 修改商品提交界面
	 	$post = request()->post();

    unset($post['goods_img']);

    $goods_info = db('goods')->find($post['goods_id']);

    $img_url = $goods_info['goods_thumb'];
    //dump($post);die;
	  //dump($post);die;
    if (session('goods_thumb')!=null) {
      //图片进行过替换的情况
     $post['goods_thumb'] = session('goods_thumb');
     $url_pre = DS.'jd'.DS.'public';
  
     $url = str_replace($url_pre,'.',$img_url);
     if (file_exists($url)) {
           unlink($url);
        }
     }  
     else{
      // 如果不存在图片的，那么$img_url图片路径传给$post['goods_thumb']
      $post['goods_thumb'] = $img_url;
      
    }

    $post['goods_after_price'] = empty(['goods_after_price'])?'0':$post['goods_after_price'];

    $post['goods_status'] = isset($post['goods_status'])?$post['goods_status']:'0';

    $post['goods_pid'] = isset($post['goods_pid'])?$post['goods_pid']:null;

    if ( $post['goods_after_price'] != 0) {
      if ($post['goods_after_price']>=$post['goods_price']) {
       $this->error('促销价格不能大于商品价格');
      }
    } 

    $validate = validate('Goods');
    

   if (!$validate->check($post)) {
     $this->error($validate->getError(),'goods/goodslist');
   }  

   $imgupload = $_SESSION['imgupload'];
   

   $goods_add_result = db('goods')->update($post);


   if ($goods_add_result!==false) { 

     session('goods_thumb',null);

     $goods_model = new \app\admin\model\Goods;

     $goods =  $goods_model->find($post['goods_id']);
    
     foreach ($imgupload as $key => $value) {

      $goods->img()->save(['url'=>$value]);
      unset($_SESSION['imgupload']);
    } 
    $this->success('商品修改成功','goods/goodslist');

  }else{
    session('goods_thumb',null);
    unset($_SESSION['imgupload']);

   $this->error('商品修改失败','goods/goodslist');
 }

}

	public function del($goods_id = ''){
		// 商品信息删除的方法
        if ($goods_id == '') {
			 $this->redirect('goods/goodslist');
		}
		$goods_find = db('goods')->find($goods_id);
        if (empty($goods_find)) {
        	 $this->redirect('goods/goodslist');
        }	
		$goods_del_result = db('goods')->delete($goods_id);
        if ($goods_del_result) {
        	if ($goods_find['goods_thumb']) {
        		$url_pre = DS.'jd'.DS.'public';
        		$url = str_replace($url_pre, '.', $goods_find['goods_thumb']);
        		if (file_exists($url)){
        			unlink($url);
        		}
        	}

            $goods_keywords_del_result = db('goods_keywords')->where('goods_id','eq',$goods_id)->delete();
           
        	$this->success('商品删除成功','goods/goodslist');
        }else{
        	$this->error('商品删除失败','goods/goodslist');
        }
	 }

    public function keywordsajax(){
      if (request()->isAjax()) {
         $post = request()->post();
         $post_val = $post['val'];
         $keywords_like = db('keywords')->where('keywords_name','like','%'.$post_val.'%')->limit(3)->select();
         return $keywords_like;
       }
     }

     public function keywordsaddhanddle(){
         // 添加关键字的提交方法
         $post = request()->post();
         //dump($post);die;
         $goods_id = array_keys($post)[0];
         $keywords_name = array_values($post)[0];
         //dump($keywords_name);die;
         if (empty($keywords_name)){
             $this->error('关键字不能为空','goods/goodslist');
         }
         $keywords_find = db('keywords')->where('keywords_name','eq',$keywords_name)->find();
         if (empty($keywords_find)) {
             $this->error('关键字不存在,请添加','keywords/add');
         }

         $keywords_id = $keywords_find['keywords_id'];
         $goods_keywords_find = db('goods_keywords')->where('goods_id','eq',$goods_id)->where('keywords_id','eq',$keywords_id)->find();
         if (!empty($goods_keywords_find)) {
          $this->redirect('goods/goodslist');
        }
         $goods_model = model('goods');
         $goods = $goods_model->get($goods_id);
         // 增加关联的中间表数据
         $goods->keywords()->attach($keywords_id);
         $this->redirect('goods/goodslist','添加关键字成功');
        } 

        public function keywordsdelhaddle($goods_id = '',$keywords_name = ''){
              if (empty($goods_id)|empty($keywords_name)) {
                 $this->redirect('goods/goodslist');
              }
              $goods_find = db('goods')->where('goods_id','eq',$goods_id)->find();
              if (empty($goods_find)) {
                 $this->redirect('goods/goodslist');
              }
              $keywords_find = db('keywords')->where('keywords_name','eq',$keywords_name)->find();
              if (empty($keywords_find)) {
                 $this->redirect('goods/goodslist');
              }

              $keywords_id = $keywords_find['keywords_id'];
              $goods_keywords_find = db('goods_keywords')->where('goods_id','eq',$goods_id)->where('keywords_id','eq',$keywords_id)->find();
              if (empty($goods_keywords_find)) {
                  $this->redirect('goods/goodslist');
              }
              // 增加关联的中间表数据
              $goods_model = model('goods');
              $goods = $goods_model->get($goods_id);
              // 删除中间表数据
              $goods->keywords()->detach($keywords_id);
              $this->redirect('goods/goodslist');

        }

        public function imgupload(){
          // 商品细节图上传的方法
          $file = request()->file('goods_img');
          $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' .DS.'img');
          if ($info) {
            $address = DS . 'jd' . DS .'public' . DS . 'uploads' . DS . 'img' .DS. $info->getSaveName();
            $_SESSION['imgupload'][] = $address;
            $session_str = serialize($_SESSION['imgupload']);
            cookie('imgupload',$session_str,3600);
            return $address;
          }else{
           echo $file->getError();
        }
      }

      public function imgcancle(){
        if (request()->isAjax()) {
           $post = request()->post();
           $img_index = $post['index'];
           $img_address = $_SESSION['imgupload'][$img_index];
           $url_pre = DS.'jd'.DS.'public';
           $url = str_replace($url_pre, '.',$img_address);
           if (file_exists($url)) {
              unlink($url);
           }
        }
     }
  }
?>