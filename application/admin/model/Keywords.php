<?php
namespace app\admin\model;
use think\Model;
/**
* 
*/
class Keywords extends Model
{    
	 protected $resultSetType = 'collection';
	 public function goods(){
	 	return $this->belongsToMany('Goods','goods_keywords');
	 }
}
?>