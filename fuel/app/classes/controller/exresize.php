<?php

class Controller_exresize extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('exresize/index'));
	}

}