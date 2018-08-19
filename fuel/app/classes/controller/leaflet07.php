<?php

class Controller_leaflet07 extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('leaflet07/index'));
	}

}