<?php

class Controller_leaflet04 extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('leaflet04/index'));
	}

}