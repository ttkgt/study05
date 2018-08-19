<?php

class Controller_Bbs extends Controller
{

	public function action_index()
	{

		//ビューに渡すデータの配列を初期化
		$data = array();

		//入力チェックのためのvalidationオブジェクトを呼び出す
		$val = Validation::forge();

		//名前を入力必須、入力上限を15文字までにする
		$val->add('name','ユーザ名')
			->add_rule('required')
			->add_rule('max_length', 15);

		//メッセージを入力必須、入力上限を200文字までにする
		$val->add('message','メッセージ')
			->add_rule('required')
			->add_rule('max_length', 200);

		//validationチェックが実行　and ビューから送られてくるセキュリティ用トークンをチェック
		if($val->run() and Security::check_token())
		{

			/*----------------------------
			画像ファイルの入力あったらアップロード
			----------------------------*/
			//データ保存用変数　初期化
			$upload_file = '';
			if(Input::file('upload.name')){

				//アップロード用初期設定
				$config = array(
					'path' => DOCROOT.'uploads',
					'randomize' => true,
					'ext_whitelist' => array('JPG','jpg','jpeg','gif','png'),
				);

				// アップロード基本プロセス
				Upload::process($config);

				// 検証
				if (Upload::is_valid())
				{
					// 設定を元に保存
					Upload::save();

					//保存先のパス/ファイル名を変数に入れる
					$getfile = Upload::get_files();
					$upload_file = $getfile[0]['saved_as'];

				}
				else
				{
					//ファイルがアップロードできなかったとき、メッセージをフラッシュセッションにセット。
					Session::set_flash('uerr', 'ファイルが正しくアップできませんでした');
					//投稿を中断して、入力画面へリダイレクト
					Response::redirect('/bbs/');
				}

			}

			/*----------------------------
			postされた各データをDB保存
			----------------------------*/
			//各送信データを配列
			$props = array(
				'name'		=> Input::post('name'),
				'message'	=> Input::post('message'),
				'image'		=> $upload_file,
				'ip'		=> Input::real_ip()
			);

			//モデルオブジェクト作成
			$new = Model_Mybbs::forge($props);

			//データ保存する
			if(!$new->save()){
				//保存失敗
				$data['save'] = '正しく投稿できませんでした';
			}
			else
			{
				//保存成功
				$data['save'] = '投稿されました';
			}

		} //$val->run()ここまで

		//validationオブジェクトをviewに渡す
		$data['val'] = $val;

		/*----------------------------
		投稿済のデータをDBから取得
		----------------------------*/
		// $data['posts'] = Model_Mybbs::find('all',array(
		// 				'order_by' => array(
		// 					'created_at' => 'desc'
		// 				)
		// 			)
		// 		);

		//ページネーションで設定するため、表示させるデータの全件数をcount関数で取得します。
		$total = count(Model_Mybbs::find('all'));

		//ページネーションの設定用変数を変更します
		$config = array(
		        'pagination_url' => 'bbs/', //urlからindexを削除する
		        'uri_segment' => 2, //ページ番号をURLの第2セグメントに設定する。デフォルトは3。
		        'per_page' => 3,
		        'total_items' => $total
		);
		
		// 'mypagination' という名前の pagination インスタンスを作る
		$pagination = Pagination::forge('mypagination', $config);

		//モデルからデータを取得、
		$data['posts'] = Model_Mybbs::find('all',array(
						'order_by' => array(
							'created_at' => 'desc'
						),
						'limit' => $pagination->per_page,
						'offset' => $pagination->offset
					)
				);

		return View::forge('bbs/index',$data);
	}


}

