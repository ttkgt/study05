<?php

class Controller_leaflet06 extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('leaflet06/index'));
	}

}