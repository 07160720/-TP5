<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function index1(){
    	return view();
    }

    public function duotushangchuan(){
    	unset($_SESION['fileupload']);
    	return view();
    }

    public function duotuhanddle(){

    	$file = request()->file('goods_img');
    	//dump($file);die;
    	$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
    	if ($info) {
    		 $rand = rand(1,100);
    		 $address = DS . 'jd' . DS .'public' . DS . 'uploads' . DS . $info->getSaveName();
	 		 $_SESSION['goods_img'][] = $address;
	 		 // 存储session
	 		 return $address;
	 		}else{
	 			echo $file->getError();
	 		}

      }

}
