<?php

class Controller_leaflet02 extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('leaflet02/index'));
	}

}