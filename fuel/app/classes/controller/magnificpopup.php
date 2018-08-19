<?php

class Controller_magnificpopup extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('magnificpopup/index'));
	}

}