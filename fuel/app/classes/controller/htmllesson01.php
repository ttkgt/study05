<?php

class Controller_htmllesson01 extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('htmllesson01/index'));
	}

}