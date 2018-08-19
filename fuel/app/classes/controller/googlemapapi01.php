<?php

class Controller_googlemapapi01 extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('googlemapapi01/index'));
	}

}