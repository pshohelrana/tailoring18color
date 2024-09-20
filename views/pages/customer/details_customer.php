<?php
if(isset($_POST["btnDetails"])){
	$customer=Customer::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="customers">Manage Customer</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Customer Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$customer->id</td></tr>";
		$html.="<tr><th>Name</th><td>$customer->name</td></tr>";
		$html.="<tr><th>Mobile</th><td>$customer->mobile</td></tr>";
		$html.="<tr><th>Email</th><td>$customer->email</td></tr>";
		$html.="<tr><th>Created At</th><td>$customer->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$customer->updated_at</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
