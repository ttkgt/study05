<?php

class Controller_tinyDraggable extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('tinyDraggable/index'));
	}

}