<?php
if(isset($_POST["btnDetails"])){
	$division=Division::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="division">Manage Division</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Division Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$division->id</td></tr>";
		$html.="<tr><th>Name</th><td>$division->name</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
