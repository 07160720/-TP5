<?php
namespace app\admin\model;

/**
* 商品分类前台模型层
*/
class Cate extends \think\Model
{
	 protected $resultSetType = 'collection';
   public function getChildrenId($cate_list,$pid = 0,$level = 1){
      //  由父类id得到全部子类
   	  static $arr  = array();
   	  foreach ($cate_list as $key => $value) {
   	  	    if ($value['cate_pid'] == $pid) {
   	  	    	$value['cate_level'] = $level;
   	  	    	$value['str'] = str_repeat('———',$value['cate_level'] - 1 );
   	  	    	$arr[] = $value; // 递归的方法
               $this->getChildrenId($cate_list,$value['cate_id'],$level+1);
   	  	    }
   	  }
   	  return $arr;
   }
    
    public function getChildren($cate_list,$pid = 0){
      // 
      $arr = array();
      foreach ($cate_list as $key => $value) {
         if ($value['cate_pid'] == $pid) {
            $value['children'] = $this->getChildren($cate_list,$value['cate_id']);
            $arr[] = $value;
         }
      }
      return $arr;
    }

    public function getFather($cate_list,$pid){
      // 由子类id得到全部父类
     static $arr = array();
     foreach ($cate_list as $key => $value) {
      if ($value['cate_id'] == $pid) {
               $value['father'] = $this->getFather($cate_list,$value['cate_pid']);
               $arr = $value;
             }
           
           }
           return $arr;
         }

    public function getFatherId($cate_list,$pid){
      // 由父类id得到全部子类
         static $arr = array();
         foreach ($cate_list as $key => $value) {
          if ($value['cate_id'] == $pid) {
               array_unshift($arr,$value);
               //$arr[] = $value; // 递归的方法
               $this->getFatherId($cate_list,$value['cate_pid']);
            }
            
         }
         
         return $arr;
    }

    public function goods(){
      //分类和商品的一对多关系
      return $this->hasMany('Cate');
    }

}
?>