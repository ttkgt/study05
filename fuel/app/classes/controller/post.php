<?php
class Controller_Post extends Controller_Template
{

	//トップページ
	public function action_index()
	{
		//POSTモデルから、全データ取得してビューに渡すための配列に入れる
		$data['posts'] = Model_Post::find('all');
		//ビューテンプレート
		$this->template->title = "Posts";
		$this->template->content = View::forge('post/index', $data);

	}

	//投稿詳細ページ
	public function action_view($id = null)
	{
		//URLにidが含まれていないとき、postのトップページへリダイレクト
		is_null($id) and Response::redirect('post');

		//id番号の投稿データをmodel:postから取得して、$dataへ代入。
		if ( ! $data['post'] = Model_Post::find($id))
		{
			//idから、投稿データを見つけられなかったら、エラーメッセージをflashセッションにセットする
			Session::set_flash('error', 'Could not find post #'.$id);
			//postのトップページへリダイレクト
			Response::redirect('post');
		}

		//ビューテンプレート
		$this->template->title = "Post";
		$this->template->content = View::forge('post/view', $data);

	}

	//新規投稿
	public function action_create()
	{
		//投稿ボタンが押下、postされたとき
		if (Input::method() == 'POST')
		{
			//model/post.phpで定義された、validataメソッド実行
			//validateオブジェクトを$valに代入
			$val = Model_Post::validate('create');

			//validationチェックを実行してOKだった場合
			if ($val->run())
			{
				//各postデータをモデルオブジェクトとして、$postに代入
				$post = Model_Post::forge(array(
					'title' => Input::post('title'),
					'body' => Input::post('body'),
					'user_id' => Input::post('user_id'),
				));

				//各POSTデータの保存に成功したとき
				if ($post and $post->save())
				{
					//成功したメッセージをフラッシュセッションに入れる
					Session::set_flash('success', 'Added post #'.$post->id.'.');
					//TOPページへリダイレクト
					Response::redirect('post');
				}
				//各POSTデータの保存失敗時
				else
				{
					//エラーメッセージをフラッシュセッションに入れる
					Session::set_flash('error', 'Could not save post.');
				}
			}
			//validationでエラーが出た時
			else
			{
				//validationのエラーメッセージをセットする
				Session::set_flash('error', $val->error());
			}
		}

		//ビューテンプレート呼び出し
		$this->template->title = "Posts";
		$this->template->content = View::forge('post/create');

	}

	//編集画面
	public function action_edit($id = null)
	{
		//URLに記事idが含まれていないとき、トップページへ戻す
		is_null($id) and Response::redirect('post');

		//記事idのデータがモデルから見つけられないとき
		if ( ! $post = Model_Post::find($id))
		{
			//エラーメッセージをセット
			Session::set_flash('error', 'Could not find post #'.$id);
			//トップページへ戻す
			Response::redirect('post');
		}

		//model/post.phpで定義された、validataメソッド実行
		//validateオブジェクトを$valに代入
		$val = Model_Post::validate('edit');

		//validationチェックを実行してOKだった場合
		if ($val->run())
		{
			//入力データをそれぞれ$postに格納する
			$post->title = Input::post('title');
			$post->body = Input::post('body');
			$post->user_id = Input::post('user_id');

			//$postの保存成功
			if ($post->save())
			{
				//成功メッセージをセット
				Session::set_flash('success', 'Updated post #' . $id);
				//トップページへ戻る
				Response::redirect('post');
			}

			//$postの保存失敗
			else
			{
				//エラーメッセージをセット
				Session::set_flash('error', 'Could not update post #' . $id);
			}
		}
		//validationでエラーが出た時
		else
		{
			//postデータが送られた場合
			if (Input::method() == 'POST')
			{
				//validationチェックしてOKのフィールドは、$postへ保存する
				//validエラーのものは保存されない
				$post->title = $val->validated('title');
				$post->body = $val->validated('body');
				$post->user_id = $val->validated('user_id');

				//validエラーのメッセージをセットする
				Session::set_flash('error', $val->error());
			}

			//複数のビューに$postを渡せるようにset_globalで、ビューを呼び出す
			$this->template->set_global('post', $post, false);
		}

		//ビューテンプレート呼び出し
		$this->template->title = "Posts";
		$this->template->content = View::forge('post/edit');

	}

	//投稿削除
	public function action_delete($id = null)
	{
		//URLに記事idが含まれていないとき、トップページへ戻す
		is_null($id) and Response::redirect('post');

		//記事idのデータがモデルから見つかった場合
		if ($post = Model_Post::find($id))
		{
			//該当記事を削除する
			$post->delete();

			//削除に成功したメッセージをセット
			Session::set_flash('success', 'Deleted post #'.$id);
		}
		//記事idのデータがモデルから見つからない
		else
		{
			//エラーメッセージをセット
			Session::set_flash('error', 'Could not delete post #'.$id);
		}
		//トップページへ戻す
		Response::redirect('post');

	}

}