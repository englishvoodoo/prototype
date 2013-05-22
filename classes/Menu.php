<?php
// classes/Menu.php

class Menu
{
	
	public function __construct()
	{

		require_once('classes/Database.php');

		$Database = new Database();
		$this->conn = $Database->connect();
		
		// populate the object with all menu elements

		$menu_array = array();
		
		$result1 = $this->conn->query("SELECT * FROM menu WHERE menu_parent_id = 0 ORDER BY menu_title");
		
		foreach($result1 as $row1) {

			//var_dump($row['menu_id']);
			$menu_array[$row1['menu_level']]['menu_id'] = $row1['menu_id'];

			$result2 = $this->conn->query("SELECT * FROM menu WHERE menu_parent_id = '".$row1['menu_id']."' ORDER BY menu_title");
			foreach($result2 as $row2) {

				$menu_array[$row2['menu_level']]['menu_id'] = $row2['menu_id'];

				$result3 = $this->conn->query("SELECT * FROM menu WHERE menu_parent_id = '".$row2['menu_id']."' ORDER BY menu_title");
				foreach($result3 as $row3) {

					$menu_array[$row3['menu_level']]['menu_id'] = $row3['menu_id'];
					
				}

			}

		}

		//var_dump($menu_array);

		$this->menu_array = $menu_array;


		

	}

	public function get_top_level()
	{

		$result = $this->conn->query("SELECT * FROM menu WHERE menu_parent_id = 0 ORDER BY menu_title");

		return $result;

	}

	public function get_sub_level($menu_id)
	{

		$result = $this->conn->query("SELECT * FROM menu WHERE menu_parent_id = '".$menu_id."' ORDER BY menu_title");

		return $result;
		
	}

	public function setData($data)
	{

		$this->menu_title = $data['menu_title'];
		$this->menu_level = $data['menu_level'];
		$this->menu_parent_id = $data['menu_parent_id'];

	}

	public function add()
	{

		$sqltext = "INSERT INTO menu (
						menu_title,
						menu_level,
						menu_parent_id
						) VALUES (
						'".$this->menu_title."',
						'".$this->menu_level."',
						'".$this->menu_parent_id."'
						)";
		$result = $this->conn->query($sqltext);

		return TRUE;

	}

	public function clear()
	{

		$sqltext = "DELETE FROM menu";
		
		$this->conn->query($sqltext);

		return TRUE;

	}



}
?>