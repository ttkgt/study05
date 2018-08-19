<?php

class Controller_Login extends Controller
{
    public function action_index()
    {
		//セッション変数の削除
		Session::delete('input_kouji_name');
		Session::delete('pagination_per_page');
		Session::delete('pagination_offset');
		
        //すでにログイン済であればログイン後のページへリダイレクト
        Auth::check() and Response::redirect('welcome');

        //エラーメッセージ用変数初期化
        $error = null;

        //ログイン用のオブジェクト生成
        $auth = Auth::instance();

        //ログインボタンが押されたら、ユーザ名、パスワードをチェックする
        if (Input::post()) {

            if ($auth->login(Input::post('username'), Input::post('password'))) {
                // ログイン成功時、ログイン後のページへリダイレクト
                //Response::redirect('welcome/');
                //Response::redirect('post/index');
                Response::redirect('menu2/index');
            }else{
                // ログイン失敗時、エラーメッセージ作成
                $error = 'ユーザ名かパスワードに誤りがあります';
            }
        }

        //ビューテンプレートを呼び出し
        $view = View::forge('login/index');

        //エラーメッセージをビューにセット
        $view->set('error', $error);

        return $view;

    }
}