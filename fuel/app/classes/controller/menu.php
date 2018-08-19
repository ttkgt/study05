<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The test Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_menu extends Controller
{
	public function action_index()
	{
		//セッション変数の削除
		Session::delete('input_kouji_name');
		Session::delete('pagination_per_page');
		Session::delete('pagination_offset');

		return Response::forge(View::forge('menu/index'));
	}
}