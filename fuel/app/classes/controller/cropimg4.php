<?php

class Controller_cropimg4 extends Controller
{
	public function action_index()
	{
		//上位プラグラムでセットされたセッション変数の値を取得する
		$kensakumoji = "";
		if(!isset($_SESSION)){
			session_start();
		}
		$itemCd = $_SESSION['itemCd'];
		$area   = $_SESSION['area'];
		//$background= $_SESSION['background'];

		$kensakumoji = "";

		//[検索]ボタンが押された場合は、画面入力値をセット
		if (Input::post('submit') == "検索"){
			$kensakumoji = input::post('kensakumoji');
			//Session::set('kensakumoji', Input::post('kensakumoji'));
			$_SESSION['kensakumoji'] = Input::post('kensakumoji');
		}else{
			$_SESSION['kensakumoji'] = '';
		}
		//検索条件の生成
		//画面入力値がなくても、検索条件に"%%"がセットされる。
		if($kensakumoji != ""){
			$kensakumoji = "%" . $kensakumoji . "%";
		}
		else{
			$kensakumoji = "%%";
		}
		//FuelPHPのORMで複数のorをつなげるにはquery()を使用する必要がある
		$data['items'] = Model_Item::query()
		->and_where_open()
			->where('area', $area)
			->or_where('item_cd', $itemCd)
		->and_where_close()
		->and_where_open()
			->where('item_cd',      'like', $kensakumoji)
			->or_where('item_name', 'like', $kensakumoji)
			->or_where('maker',     'like', $kensakumoji)
			->or_where('area',      'like', $kensakumoji)
			->or_where('comment',   'like', $kensakumoji)
		->and_where_close()
		->order_by('id','asc')
		->get();
		
		$_SESSION['img_top']    = 0; 
		$_SESSION['img_left']   = 0; 
		$_SESSION['img_height'] = 0; 
		$_SESSION['img_width']  = 0; 

		return Response::forge(View::forge('cropimg4/index', $data));
		//$this->template->content = View::forge('cropimg2/index', $data);
		
	}

	public function action_edit()
	{
		//$username=$_POST["item_top"];
		//$password=$_POST["item_left"];
		//echo "Username: ".$username;
		//echo "<br>";
		//echo "Password: ".$password;

		//上位プラグラムでセットされたセッション変数の値を取得する
		session_start();
		if(!isset($_SESSION)){
			session_start();
		}
		$itemCd = $_SESSION['itemCd'];
		$area   = $_SESSION['area'];
		//$background= $_SESSION['background'];
		
		$item = Model_Item::find(Input::post('id'));
		$val  = Model_Item::validate('edit');
	
		$val->run();
		if(Input::post('item_top')=='null' && Input::post('item_left')=='null')
		{
			$item->item_top  = NULL;
			$item->item_left = NULL;
		}else{	
			$item->item_top  = Input::post('item_top');
			$item->item_left = Input::post('item_left');
		}
		
		$item->save();

		//$kensakumoji = Session::get('kensakumoji', '');
		$kensakumoji = $_SESSION['kensakumoji'];
		//検索条件の生成
		//画面入力値がなくても、検索条件に"%%"がセットされる。
		if($kensakumoji != ""){
			$kensakumoji = "%" . $kensakumoji . "%";
		}
		else{
			$kensakumoji = "%%";
		}
		//FuelPHPのORMで複数のorをつなげるにはquery()を使用する必要がある
		$data['items'] = Model_Item::query()
		->and_where_open()
			->where('area', $area)
			->or_where('item_cd', $itemCd)
		->and_where_close()
		->and_where_open()
			->where('item_cd',      'like', $kensakumoji)
			->or_where('item_name', 'like', $kensakumoji)
			->or_where('maker',     'like', $kensakumoji)
			->or_where('area',      'like', $kensakumoji)
			->or_where('comment',   'like', $kensakumoji)
		->and_where_close()
		->order_by('id','asc')
		->get();

		$_SESSION['img_top']    = Input::post('img_top'); 
		$_SESSION['img_left']   = Input::post('img_left'); 
		$_SESSION['img_height'] = Input::post('img_height'); 
		$_SESSION['img_width']  = Input::post('img_width'); 
		
		return Response::forge(View::forge('cropimg4/index', $data));
		//$this->template->content = View::forge('cropimg2/index', $data);
		
	}
	
}