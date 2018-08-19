<?php
class Controller_edittest extends Controller
{
	public function action_index()
	{
		//$username=$_POST["item_top"];
		//$password=$_POST["item_left"];
		//echo "Username: ".$username;
		//echo "<br>";
		//echo "Password: ".$password;
		
		$item = Model_Item::find(0);
		$val = Model_Item::validate('edit');
	
		$val->run();
		if(Input::post('item_top')=='null' && Input::post('item_left')=='null')
		{
			$item->item_top  = NULL;
			$item->item_left = NULL;
		}else{	
			$item->item_top  = Input::post('item_top');
			$item->item_left = Input::post('item_left');
		}
		
		$item->save();
		
		$data['items'] = Model_Item::find('all', array(
				'where' => 	array(
					array('item_name', 'like', '%%'),
				),
				'order_by' => array(
					'id' => 'asc'
				),
			)
		);
		
		return Response::forge(View::forge('cropimg2/index', $data));
		
	}
	
}