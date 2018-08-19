<?php

class Controller_leaflet03 extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('leaflet03/index'));
	}

}