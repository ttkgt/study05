<?php

class Controller_menu2 extends Controller
{
	public function action_index()
	{
		if(!isset($_SESSION)){
			session_start();
		}
		$_SESSION['id']         = '20';
		$_SESSION['itemCd']     = 'H20';
		//$_SESSION['area']     = '第１工場';
		$_SESSION['area']       = '第２工場';
		$_SESSION['background'] = '2';  //1:小要素＋一覧表 , 2:大要素

        if($_SESSION['background'] == '1'){
            //$_SESSION['resultWidth']    = '930'; 
			//$_SESSION['resultHeight']   = '523';
            $_SESSION['resultWidth']    = 'window.innerWidth'; 
            $_SESSION['resultHeight']   = 'window.innerHeight * 0.6';
            $_SESSION['scrollTableHeight']   = 'window.innerHeight - window.innerHeight * 0.6';
        }else{
            $_SESSION['resultWidth']    = 'window.innerWidth'; 
            $_SESSION['resultHeight']   = 'window.innerHeight';
            $_SESSION['scrollTableHeight']   = '0';
        }
            
		$_SESSION['img_top']    = 0; 
		$_SESSION['img_left']   = 0; 
		$_SESSION['img_height'] = 0; 
		$_SESSION['img_width']  = 0; 

		//session::set('id'    , '12');
		//session::set('itemCd', 'H12');
		//session::set('area'  , '第１工場');
		
		return Response::forge(View::forge('menu2/index'));
	}
}