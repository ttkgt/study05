<?php

class Controller_Viewport03 extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('viewport03/index'));
	}
}
