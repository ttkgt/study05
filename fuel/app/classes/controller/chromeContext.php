<?php

class Controller_chromeContext extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('chromeContext/index'));
	}

}