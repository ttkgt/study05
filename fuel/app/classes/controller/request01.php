<?php

class Controller_request01 extends Controller
{
	public function action_index()
	{
        switch ($_GET['id']) {
            case 1:
                echo "田中";
                break;
            case 2:
                echo "佐藤";
                break;
            default:
                echo "なし";
                break;
        }
        
		return Response::forge(View::forge('request01/index'));
	}

}
