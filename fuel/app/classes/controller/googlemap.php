<?php

class Controller_googlemap extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('googlemap/index'));
	}

}
