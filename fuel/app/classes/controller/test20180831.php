<?php

class Controller_test20180831 extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('test20180831/index'));
	}
}