<?php

class Controller_Index extends Controller
{
	//入力フォームで取り扱うフィールドを配列として設定
	//name：名前、email：メールアドレス、msg：本文
	private $fields = array('name','email','msg','item','item2');
	
	//selectボックス用の選択項目の配列を作成します
	private $select = array(
				""	=> "選択してください",
				"hokkaido"	=> "北海道",
				"aomori"	=> "青森県",
				"iwate"		=> "岩手県",
				"akita"		=> "秋田県",
			);

	public function action_index()
	{

		//フォームのsubmitボタンを押されたとき
		if (Input::post('submit'))
		{
			//postされた各データをフラッシュセッションに保存
			foreach ($this->fields as $field)
			{
				Session::set_flash($field, Input::post($field));
			}
		}

		//入力チェックのためのvalidationオブジェクトを呼び出す
		$val = Validation::forge();
		
		//各項目に対して、入力の検証ルールを設定する
		//名前を入力必須にする
		$val->add('name','名前')->add_rule('required');
		//メールアドレスを入力必須、正しいアドレス形式かチェック
		$val->add('email','メールアドレス')->add_rule('required')->add_rule('valid_email');
		//セレクトボックスを選択必須にするための条件を追加する
		$val->add('item2','セレクトボックス')->add_rule('required');
		//内容を入力必須にする
		$val->add('msg','内容')->add_rule('required');

		//$vai->run()で、入力チェックの実行
		//Security::check_token()で、hiddenでpostされたCSRFトークンをチェック
		if($val->run() and Security::check_token())
		{
			//それぞれのチェックが成功したら、確認画面にリダイレクト
			//確認画面に遷移しなかったので調査した。
			//controller/index.php のaction_confにたどりつかないので、
			//index.phpのaction_confにリダイレクトするように変更してみた
			Response::redirect('index/conf');
//			Response::redirect('welcome'); // 調査の結果、controller/welcome.phpにリダイレクトすることがわかった。
		}

		//ビューに渡すデータの配列を作る
		$data = array();

		//validationオブジェクトを配列に保存
		$data['val'] = $val;
		
		//selectボックスの選択しのデータ$selsctを、viewへ渡すために$dataへ入れる
		$data['select'] = $this->select;

		//$dataをビューに埋め込み、ビューを表示する
		return View::forge('index',$data);

	}	
	
	public function action_conf()
	{

		//データ用の配列初期化
		$data = array();

		//入力のときに保存したセッションデータを配列に保存
		foreach ($this->fields as $field)
		{
			$data[$field] = Session::get_flash($field);

			//セッション変数を次のリクエストを維持
			Session::keep_flash($field);
		}
		
		//selectボックスの選択肢のデータ$selectを、viewへ渡すために$dataへ入れる
		$data['select'] = $this->select;

		//データをビューに渡す
		$view = View::forge('conf',$data);

		return $view;
	}
	
	public function action_send()
	{

		//確認画面で「修正ボタン」押下
		if (Input::post('back'))
		{
			//各フィールドのセッション期限延期
			foreach ($this->fields as $field)
			{
				Session::keep_flash($field);
			}

			//入力画面にリダイレクト
			Response::redirect('/');
		}

		//csrfトークンをチェック->NGのとき
		if(!Security::check_token() )
		{
			$data['message'] = "ページ遷移が正しくありません";
			$view = View::forge('send',$data);
			return $view;
		}

		//セッション確認、リロード対策
		if(Session::get_flash('email'))
		{
			//メール本文のビューデータ初期化
			$mail = array();

			//各フィールドのデータをセッションから取得
			foreach ($this->fields as $field)
			{
				//メール本文用のフィールドにデータを代入
				$mail[$field] = Session::get_flash($field);
			}

			//selectボックスの選択肢のデータ$selectを、メール本文のview:contact_mail.phpへ渡すために$mailへ入れる
			$mail['select'] = $this->select;

			//メールのビュー呼び出し
			$body = View::forge('contact_mail',$mail);
			
			//Class 'Email' not foundのエラーが出たので、これを入れてみた
			package::load('email');
			
			//Emailオブジェクト
			$email = Email::forge();

			//from設定
			$email->from(Session::get_flash('email'), Session::get_flash('name'));

			//to設定
			$email->to(Config::get('contact_to'));

			//件名
			$email->subject('【fuweb.info】お問い合わせ');

			//bodyをエンコードして設定
			$email->body(mb_convert_encoding($body, 'jis'));

			//送信
			try
			{
				$email->send();
			}
			catch(\EmailValidationFailedException $e)
			{
				//メールアドレスの検証失敗
				$message = "送信に失敗しました。送信先のメールアドレスが正しくありません";
			}
			catch(\EmailSendingFailedException $e)
			{
				//送信に失敗
				$message = "送信に失敗しました。";
			}

			//送信できた　try-catchでエラーなし。
			$message = '送信が完了しました。ありがとうございました。';
		}
		else
		{
			//フラッシュセッションが取得できないとき
			$message = 'お問い合わせフォームが正しく送信されていません。';
		}

		//メッセージを変数に渡す
		$data['message'] = $message;
		
		//ビューの読み込み
		$view = View::forge('send',$data);

		return $view;

	}

}
