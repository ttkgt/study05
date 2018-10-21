<?php

class Controller_Viewport02 extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('viewport02/index'));
	}
}
