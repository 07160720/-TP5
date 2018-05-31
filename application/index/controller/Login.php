<?php 

   namespace app\index\controller;
   
   /**
   * 用户登录
   */
   class Login extends \think\Controller
   {

   	  public function index(){
             // 用户登录显示
           return view('login');

   	 }

   	  public function dologin(){

   	  }

   }



?>