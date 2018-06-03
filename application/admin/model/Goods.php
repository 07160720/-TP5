<?php
// namespace app\admin\model;

// /**
// * 
// */
// class Goods extends \think\Model
// {
	
//    public function getChildrenId($goods_list,$pid = 0,$level = 1){
//       // 由父类id得到全部子类
//    	  static $arr  = array();
//    	  foreach ($goods_list as $key => $value) {
//    	  	    if ($value['goods_pid'] == $pid) {
//    	  	    	$value['goods_level'] = $level;
//    	  	    	$value['str'] = str_repeat('———',$value['goods_level'] - 1 );
//    	  	    	$arr[] = $value; // 递归的方法
//                 $this->getChildrenId($goods_list,$value['goods_id'],$level+1);
//    	  	    }

//    	  }
//    	  return $arr;
//    }

// }

?>