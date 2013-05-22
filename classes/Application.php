<?php
// classes/Application.php

class Application
{
	
	public function render($page)
	{

		$this->page = $page;

		switch($page)
		{

			

			case "menu_main" :

				require_once('classes/Menu.php');

				$Menu = new Menu();



				$this->render('header');
				include('views/menu_main.php');
				$this->render('footer');
				break;

			case "main" :
				$this->render('header');
				include('views/admin_main.php');
				$this->render('footer');
				break;

			case "header" :
				include('views/header.php');
				break;

			case "footer" :
				include('views/footer.php');
				break;

		}

	}

}
?>