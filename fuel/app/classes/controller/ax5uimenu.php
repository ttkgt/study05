<?php

class Controller_ax5uimenu extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('ax5uimenu/index'));
	}
}