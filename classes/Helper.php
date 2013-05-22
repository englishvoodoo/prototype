<?php
// classes/Helper.php

class Helper
{
	
	public function __construct()
	{

		

	}

	public function redirect($location)
	{

		header("Location: index.php?route=".$location);

		exit();

	}

}
?>