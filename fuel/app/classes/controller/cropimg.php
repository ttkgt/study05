<?php

class Controller_cropimg extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('cropimg/index'));
	}

}

