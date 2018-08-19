<?php

class Controller_Conf extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('conf'));
	}

}
