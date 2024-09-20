<?php
if(isset($_POST["btnDetails"])){
	$stock=Stock::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="stocks">Manage Stock</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Stock Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$stock->id</td></tr>";
		$html.="<tr><th>Product Id</th><td>$stock->product_id</td></tr>";
		$html.="<tr><th>Qty</th><td>$stock->qty</td></tr>";
		$html.="<tr><th>Transaction Type Id</th><td>$stock->transaction_type_id</td></tr>";
		$html.="<tr><th>Remark</th><td>$stock->remark</td></tr>";
		$html.="<tr><th>Created At</th><td>$stock->created_at</td></tr>";
		$html.="<tr><th>Warehouse Id</th><td>$stock->warehouse_id</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
