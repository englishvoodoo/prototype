

<footer>
[footer]
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<script>
$("#add_top_level").click(function(){
	$node = '<p><label>top : </label><input type="text" name="top[]" id="top[]">';
	$(this).parent().after($node);
});



function add_sub(which) {

	$node = '<p><label>sub : </label><input type="text" name="sub_'+which+'[]" id="sub'+which+'[]">';

	tmp_element = "#add_sub_level_"+which;
	$(tmp_element).after($node);

}

function expand(which) {

	$("#sub_tree_"+which).show();
	
}

</script>
</body>

</html>