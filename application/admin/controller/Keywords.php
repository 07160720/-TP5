<?php
namespace app\admin\controller;
use think\Controller;
/**
* 关键字后台控制器
*/
class Keywords extends Controller
{
	
	public function keywordslist()
	{
		//关键字列表显示
		$keywords_select = db('keywords')->paginate(6);
		if ($keywords_select) {
			$this->assign('keywords_select',$keywords_select);
		    return view(); 
		}else{
            $this->redirect('index/index');
		}
		
	}

	public function add()
	{   
        return view();
	}

	public function addhanddle(){
		$post = request()->post();
		$validate = validate('keywords');
		if (!$validate->check($post)) {
			$this->error($validate->getError(),'keywords/keywordslist');
		}
		$keywords_insert = db('keywords')->insert($post);
		if ($keywords_insert) {
			$this->success('添加关键字成功','keywords/keywordslist');
		}else{
			$this->error('添加关键字失败','keywords/keywordslist');
		}
	}

	public function upd($keywords_id = '')
	{   
	    //显示修改关键字界面
		if ($keywords_id == '') {
			 $this->redirect('keywords/keywordslist');
		}
	    $keywords_find = db('keywords')->find($keywords_id);
		if(empty($keywords_find)){
             $this->redirect('keywords/keywordslist');
		}
	
		$this->assign('keywords_find',$keywords_find);
		return view();
	}

	public function updhanddle(){
        $post = request()->post();
        //dump($post);die;
        $keywords_udp = db('keywords')->update($post);
        if ($keywords_udp) {
			$this->success('修改关键字成功','keywords/keywordslist');
		}else{
			$this->error('修改关键字失败','keywords/keywordslist');
		}
	}

	public function del_keywords($keywords_id = ''){
		if ($keywords_id == '') {
			 $this->redirect('keywords/keywordslist');
		}
	    $keywords_find = db('keywords')->find($keywords_id);
	    //dump($keywords_find);die;
		if(empty($keywords_find)){
             $this->redirect('keywords/keywordslist');
		}
		$keywords_del = db('keywords')->delete($keywords_find);
		if ($keywords_del) {
			$this->success('删除关键字成功','keywords/keywordslist');
		}else{
			$this->error('删除关键字失败','keywords/keywordslist');
		}
	}
}
?>