<?php

class Controller_leaflet05 extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('leaflet05/index'));
	}

}