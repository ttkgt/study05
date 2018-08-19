<?php

class Controller_locatedarea extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('locatedarea/index'));
	}

}