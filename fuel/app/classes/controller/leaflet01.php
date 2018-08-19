<?php

class Controller_leaflet01 extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('leaflet01/index'));
	}

}