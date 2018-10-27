<?php

class Controller_Textarea extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('textarea/index'));
	}
}
