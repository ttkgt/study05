<?php

class Controller_html2canvas extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('html2canvas/index'));
	}

}

