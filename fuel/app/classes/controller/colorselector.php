<?php

class Controller_colorselector extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('colorselector/index'));
	}
}