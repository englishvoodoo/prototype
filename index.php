<?php
// index.php

require_once('classes/Application.php');
require_once('classes/Menu.php');
require_once('classes/Helper.php');

$Application = new Application();

if(isset($_GET['route'])) {

	$route = $_GET['route'];

} else {

	$route = '';

}

switch ($route)
{

	case "menu_submit" :

		$Menu = new Menu();
		$Menu->clear();

		// add any new top level menus
		if(isset($_REQUEST['top'])) {
			
			$top_array = $_REQUEST['top'];

			foreach($top_array as $new_top) {

				if($new_top) {

					$data = array(
							'menu_title' => $new_top,
							'menu_level' => 0,
							'menu_parent_id' => 0,
							);
					$Menu->setData($data);
					$Menu->add();
				}
						
			}

		}

		// to retrieve the subs we need to cycle through the top level menus
		$top_level_menus = $Menu->get_top_level();

		foreach($top_level_menus as $top_level) {

			$tmp_menu_id = $top_level['menu_id'];
			
			if(isset($_REQUEST['sub_'.$tmp_menu_id])) {

				$sub_array = $_REQUEST['sub_'.$tmp_menu_id];

				foreach($sub_array as $new_sub) {

					if($new_sub) {
						$data = array(
								'menu_title' => $new_sub,
								'menu_level' => 1,
								'menu_parent_id' => $tmp_menu_id,
								);
						$Menu->setData($data);
						$Menu->add();
					}
				}

			}
		}

		$Helper = new Helper();

		$Helper->redirect('menu');

		
		

		exit();
		break;

	case "menu":
		$Application->render('menu_main');
		break;

	default :
		$Application->render('main');
		break;

}
?>

	


