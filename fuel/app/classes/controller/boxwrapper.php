<?php

class Controller_boxwrapper extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('boxwrapper/index'));
	}

}