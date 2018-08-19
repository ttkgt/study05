<?php
class Controller_Kouji extends Controller_Template
{
		//[検索]ボタンクリック時もbefore()を通るので、入力した条件がクリアされてしまう。
	    //public function before()
		//{
		//	parent::before(); // この行がないと、テンプレートが動作しません!
		//	Session::delete('input_kouji_name');
		//	Session::delete('pagination_per_page');
		//	Session::delete('pagination_offset');
	    //}
	
	//**************************************************
	//「一覧表示」と「各出力」を行うファンクション
	//**************************************************
	public function action_index()
	{
		//**************************************************
		//共通処理を行う。
		//**************************************************
		//
		//**************************************************
 		//出力ファイル先ファイルの設定
		//**************************************************
		$tpl_dir			= APPPATH . "tmp/";			//出力先フォルダ
		$qrfile				= "qrtemp.png";				//QRコード画像ファイル
		$barcodefile		= "barcodetemp.png";		//バーコード画像ファイル
		$tpl_excelfile		= "tpl_excel.xlsx";			//テンプレートエクセルファイル
		$tpl_qrfile			= "tpl_qr.xlsx";			//テンプレートエクセルファイル
		$tpl_barcodefile	= "tpl_barcode.xlsx";		//テンプレートエクセルファイル
		$out_excelfile		= date("YmdHis") . ".xlsx";	//EXCEL2007型式ファイル
		$out_qrfile			= date("YmdHis") . ".xlsx";	//EXCEL2007型式ファイル
		$out_barcodefile	= date("YmdHis") . ".xlsx";	//EXCEL2007型式ファイル
		$out_pdffile		= date("YmdHis") . ".pdf";	//PDFファイル

		//**************************************************
		//セッション変数の操作を行う。
		//**************************************************
		//セッション変数があるならば、保存済みの値を検索条件にセットする。
		$input_data_kouji_name		= Session::get('input_kouji_name', '');
		//$input_pagination_per_page	= Session::get('pagination_per_page', '');
		//$input_pagination_offset	= Session::get('pagination_offset', '');

		//[検索]ボタンが押された場合は、画面入力値をセット
		//if (input::post()){
		if (Input::post('submit') == "検索"){
			$input_data_kouji_name = input::post('kouji_name');
		}

		//検索条件の生成
		//画面入力値がなくても、検索条件に"%%"がセットされる。
		if($input_data_kouji_name != ""){
			$input_kouji_name = "%" . $input_data_kouji_name . "%";
		}
		else{
			$input_kouji_name = "%%";
		}

		//[検索]ボタンが押されたらsession変数に値を置き換える。
		if (Input::post('submit') == "検索"){
			$input_kouji_name = "%".Input::post('kouji_name')."%";
			Session::set('input_kouji_name', Input::post('kouji_name'));
		}

		//**************************************************
		//画面の「選択」の状態を取得
		//**************************************************
		$check = Input::post('check');
			
		//**************************************************
		//ページネーションの準備
		//**************************************************
		$total = count(Model_Kouji::find('all', array(
				'where' => 	array(
					array('kouji_name', 'like', $input_kouji_name),
				),
		)));

		$config = array(
			'name'			=> 'default',
			'total_items'	=> $total,
			'per_page'		=> 100,
			'uri_segment'	=> 'p',
		);

		//**************************************************
		//'mypagination'という名前のpaginationインスタンスを作る。
		//**************************************************	
		$pagination = Pagination::forge('mypagination', $config);
		
		//**************************************************
		//データを抽出する。
		//**************************************************
		$input_pagination_per_page	= $pagination->per_page;
		$input_pagination_offset	= $pagination->offset;

		//[エクセル出力][ＱＲ生成][ＰＤＦ生成][バーコード生成]がクリックされたらセッション変数から戻す
		if(Input::post('submit')){		
			if (Input::post('submit') == "エクセル出力" 
				|| Input::post('submit') == "ＱＲ生成" 
				|| Input::post('submit') == "ＰＤＦ生成" 
				|| Input::post('submit') == "バーコード生成" 
				|| Input::post('submit') == "バーコードＰＤＦ"){
//				//$input_pagination_per_page	= $pagination->per_page;
//				//$input_pagination_offset	= $pagination->offset;
				$input_pagination_per_page	= Session::get('pagination_per_page', '');
				$input_pagination_offset	= Session::get('pagination_offset', '');
			}
		}
//		if($check){
			$data['koujis'] = Model_Kouji::find('all', array(
				'where' => 	array(
					array('kouji_name', 'like', $input_kouji_name),
				),
				'order_by' => array(
					'id' => 'asc'
				),
				'limit' => $input_pagination_per_page,
				'offset'=> $input_pagination_offset
			)
			);
//		}
//		else{
//			$data['koujis'] = Model_Kouji::find('all', array(
//				'where' => 	array(
//					array('kouji_name', 'like', $input_kouji_name),
//				),
//				'order_by' => array(
//					'id' => 'asc'
//				),
//			)
//			);
//		}
		
		//[検索]以外のボタンがクリックされた時
		//if(Input::post('submit')){		
		//	if (Input::post('submit') != "検索"){
//				Session::set('pagination_per_page', $pagination->per_page);
//				Session::set('pagination_offset', $pagination->offset);
		//	}
		//}

		//[エクセル出力][ＱＲ生成][ＰＤＦ生成][バーコード生成]以外のボタンがクリックされたとき
		if(Input::post('submit')){		
			if (Input::post('submit') != "エクセル出力" 
				&& Input::post('submit') != "ＱＲ生成" 
				&& Input::post('submit') != "ＰＤＦ生成" 
				&& Input::post('submit') != "バーコード生成"
				&& Input::post('submit') != "バーコードＰＤＦ"){
				Session::set('pagination_per_page', $pagination->per_page);
				Session::set('pagination_offset', $pagination->offset);
			}
		}
		
		//[検索][エクセル出力][ＱＲ生成][ＰＤＦ生成][バーコード生成]のボタンはクリックされていないとき
		if(!Input::post('submit')){		
			Session::set('pagination_per_page', $pagination->per_page);
			Session::set('pagination_offset', $pagination->offset);
		}
				
		//**************************************************
		//エクセルファイルを作成する。
		//**************************************************
		if (Input::post('submit') == "エクセル出力"){
			
			$result = Output_excel::run01($data, $check, $tpl_dir, $tpl_excelfile, $out_excelfile);

			Session::set_flash('success', 'エクセル出力できたぞ！');
		}
		//**************************************************
		//	ＱＲコードを作成する。
		//**************************************************
		elseif(Input::post('submit') == "ＱＲ生成"){
			
			$result = Output_qr::run01($data, $check, $tpl_dir, $tpl_qrfile, $qrfile, $out_qrfile);

			Session::set_flash('success', 'ＱＲ出力できたぞ！');
 		}
		
		//**************************************************
		//	ＰＤＦを作成する。
		//**************************************************
		elseif(Input::post('submit') == "ＰＤＦ生成"){
			
			$result = Output_pdf::run01($data, $check, $tpl_dir, $out_pdffile);

			Session::set_flash('success', 'ＰＤＦ出力できたぞ！');
		}
 
		//**************************************************
		//	Ｂａｒｃｏｄｅを作成する。
		//**************************************************
		elseif(Input::post('submit') == "バーコード生成"){
			
			$result = Output_barcode::run01($data, $check, $tpl_dir, $tpl_barcodefile, $barcodefile, $out_barcodefile);

			Session::set_flash('success', 'バーコード出力できたぞ！');
		}

		//**************************************************
		//	ＢａｒｃｏｄｅＰＤＦを作成する。
		//**************************************************
		elseif(Input::post('submit') == "バーコードＰＤＦ"){
			
			$result = Output_barpdf::run01($data, $check, $tpl_dir, $tpl_barcodefile, $barcodefile, $out_pdffile);

			Session::set_flash('success', 'バーコードＰＤＦ出力できたぞ！');
		}

		//**************************************************
		//検索結果を表示する。
		//**************************************************
		$this->template->title = "工事一覧";
		$this->template->content = View::forge('kouji/index', $data);
	}	

	//**************************************************
	//「参照」を行うファンクション
	//**************************************************
	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('kouji');

		if ( ! $data['kouji'] = Model_Kouji::find($id))
		{
			Session::set_flash('error', 'Could not find kouji #'.$id);
			Response::redirect('kouji');
		}

		$this->template->title = "Kouji";
		$this->template->content = View::forge('kouji/view', $data);
	}

	//**************************************************
	//「新規」を行うファンクション
	//**************************************************
	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Kouji::validate('create');

			if ($val->run())
			{
				$kouji = Model_Kouji::forge(array(
					'kouji_cd' => Input::post('kouji_cd'),
					'kouji_name' => Input::post('kouji_name'),
					'kouji_type' => Input::post('kouji_type'),
					'kouji_state' => Input::post('kouji_state'),
					'ip' => Input::post('ip'),
				));

				if ($kouji and $kouji->save())
				{
					Session::set_flash('success', 'Added kouji #'.$kouji->id.'.');

					Response::redirect('kouji');
				}

				else
				{
					Session::set_flash('error', 'Could not save kouji.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Koujis";
		$this->template->content = View::forge('kouji/create');
	}

	//**************************************************
	//「編集」を行うファンクション
	//**************************************************
	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('kouji');

		if ( ! $kouji = Model_Kouji::find($id))
		{
			Session::set_flash('error', 'Could not find kouji #'.$id);
			Response::redirect('kouji');
		}

		$val = Model_Kouji::validate('edit');

		if ($val->run())
		{
			$kouji->kouji_cd = Input::post('kouji_cd');
			$kouji->kouji_name = Input::post('kouji_name');
			$kouji->kouji_type = Input::post('kouji_type');
			$kouji->kouji_state = Input::post('kouji_state');
			$kouji->ip = Input::post('ip');

			if ($kouji->save())
			{
				Session::set_flash('success', 'Updated kouji #' . $id);

				Response::redirect('kouji');
			}

			else
			{
				Session::set_flash('error', 'Could not update kouji #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$kouji->kouji_cd = $val->validated('kouji_cd');
				$kouji->kouji_name = $val->validated('kouji_name');
				$kouji->kouji_type = $val->validated('kouji_type');
				$kouji->kouji_state = $val->validated('kouji_state');
				$kouji->ip = $val->validated('ip');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('kouji', $kouji, false);
		}

		$this->template->title = "Koujis";
		$this->template->content = View::forge('kouji/edit');
	}

	//**************************************************
	//「削除」を行うファンクション
	//**************************************************
	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('kouji');

		if ($kouji = Model_Kouji::find($id))
		{
			$kouji->delete();

			Session::set_flash('success', 'Deleted kouji #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete kouji #'.$id);
		}

		Response::redirect('kouji');
	}

	//**************************************************
	//「フロア」を行うファンクション
	//**************************************************
	public function action_floor($id = null)
	{
		is_null($id) and Response::redirect('kouji');

		if ( ! $data['kouji'] = Model_Kouji::find($id))
		{
			Session::set_flash('error', 'Could not find kouji #'.$id);
			Response::redirect('kouji');
		}

		$this->template->title = "Kouji";
		$this->template->content = View::forge('kouji/floor', $data);
	}

}
