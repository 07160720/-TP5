<?php
namespace app\index\model;
/**
* 
*/
class Cate extends \think\Model
{
	
	 public function getChildren($cate_list,$pid=0){
	 	// 得到全部子级，多维数组
	 	$arr = array();
	 	foreach ($cate_list as $key => $value) {
	 		if ($value['cate_pid'] == $pid) {
	 			$value['children'] = $this->getChildren($cate_list,$value['cate_id']);
	 			$arr[] = $value;
	 		}
	 	}
	 	//$arr = array_unshift($arr);
	 	return $arr;
	 }

}
?>