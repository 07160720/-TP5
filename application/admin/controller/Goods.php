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
            	//dump($validate->getError());
            	$this->error($validate->getError(),'goods/add');
            }

            $goods_add_result = db('goods')->insert($post);
            session('goods_thumb',null);
            if ($goods_add_result) {
                $this->success('商品添加成功','goods/goodslist');
            }else{
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

        //$this->assign('goods_info',$goods_info);

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
	 	if ($goods_id == 0) {
	 		$this->redirect('goods/goodslist');
	 	}
	 	$goods_find = db('goods')->find($goods_id);
	 	if (empty($goods_find)) {
	 		$this->redirect('goods/goodslist');
	 	}
	 	if (session('goods_thumb')) {
	 		$url_pre = DS.'jd'.DS.'public';
	 		$url = str_replace($url_pre, '.', session('goods_thumb'));
	 		if (file_exists($url)){
	 			unlink($url);
	 		}
	 	}
	 	//session('goods_thumb',$goods_find['goods_thumb']);
	 	$cate_select = db('cate')->select();
        $cate_model = model('Cate');
        // 获取无限级分类列表
        $cate_list1 = $cate_model->getChildren($cate_select);

        $cate_in = $cate_model->getFatherId($cate_select,$goods_find['goods_pid']);
        //var_dump($cate_in);die;
        $cate_in_new['one'] = $cate_in[2];
        $cate_in_new['two'] = $cate_in[1];
        $cate_in_new['three'] = $cate_in[1];

        $this->assign('cate_in',$cate_in_new);
        $this->assign('goods_find',$goods_find);
        $this->assign('cate_list1',$cate_list1);
	 	return view();
	 }

	 public function updhanddle(){
	 	// 修改商品提交界面
	 	$post = request()->post();
	 	$goods_info = db('goods')->find($post['goods_id']);
	 	$img_url = $goods_info['goods_thumb'];
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
        //dump($post);die;
        $post['goods_status'] = isset($post['goods_status'])?$post['goods_status']:'0';
        $post['goods_pid'] = isset($post['goods_pid'])?$post['goods_pid']:null;
        $validate = validate('Goods');
        if (!$validate->check($post)) {
        	$this->error($validate->getError(),'goods/goodslist');
        }
        $goods_add_result = db('goods')->update($post);
       
        if ($goods_add_result) { 	
             session('goods_thumb',null);
        	 $this->success('商品修改成功','goods/goodslist');
        }else{
        	session('goods_thumb',null);
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
        	$this->success('商品删除成功','goods/goodslist');
        }else{
        	$this->error('商品删除失败','goods/goodslist');
        }
	 }
   }
?>