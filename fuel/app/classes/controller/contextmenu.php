<?php

class Controller_contextmenu extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('contextmenu/index'));
	}

}

