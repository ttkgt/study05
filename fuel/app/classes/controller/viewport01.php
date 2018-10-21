<?php

class Controller_Viewport01 extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('viewport01/index'));
	}
}
