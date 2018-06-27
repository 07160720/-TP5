<?php
namespace app\admin\model;
use think\Model;
/**
* 
*/
class Goods extends Model
{
	 protected $resultSetType = 'collection';
	 public function keywords(){
	 	return $this->belongsToMany('Keywords','goods_keywords');
	 }

	 public function cate(){
	 	//商品和分类多对一的关系
	 	return $this->belongsTo('Cate','goods_pid');
	 }

	 public function img(){
	 	// 商品细节图的一对多关系
	 	return $this->hasMany('Img');
	 }
}
?>