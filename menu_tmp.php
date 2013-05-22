<?php
echo "<BR>menu_tmp.php";

//var_dump($_REQUEST);

// add any new top level menus
if($_REQUEST['top']) {
	$top_array = $_REQUEST['top'];

	//echo "<pre>";
	//var_dump($top_array);
	//echo "</pre>";

	foreach($top_array as $new_top) {

		echo "<BR>new_top:".$new_top;

	}

}

if($_REQUEST['sub']) {
	$sub_array = $_REQUEST['sub'];


}
?>