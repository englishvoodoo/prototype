<?php
// views/menu_main.php

?>
<h3>menu main</h3>

<form name="menu_form" method="POST" action="index.php?route=menu_submit">

<div id="menu_tree">

	<div><input type="button" id="add_top_level" value="+ top"></div>

<?php

$menu_array = $Menu->get_top_level();

// show the current menu structure

foreach($menu_array as $menu) {

	$sub_array = $Menu->get_sub_level($menu['menu_id']);

?>
	<div>
		<input type="text" id="top[]" name="top[]" value="<?php echo $menu['menu_title'];?>">
		<input type="button" id="add_sub_level_<?php echo $menu['menu_id'];?>" value="expand" onclick="javascript:expand(<?php echo $menu['menu_id'];?>);">
	</div>
	
	<div id="sub_tree_<?php echo $menu['menu_id'];?>" style="display:none;">
<?php	

	foreach($sub_array as $sub) {

	
?>
		<input type="text" id="" name="" value="<?php echo $sub['menu_title'];?>"><br />
<?php		

	}
?>
		<input type="submit" value="update">
	</div>
<?php
}
?>
	

</div>

<input type="submit" value="update tree">
</form>
