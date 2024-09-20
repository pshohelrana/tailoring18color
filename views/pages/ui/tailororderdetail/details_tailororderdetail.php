<?php
if(isset($_POST["btnDetails"])){
	$tailororderdetail=TailorOrderDetail::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="tailor_order_details">Manage TailorOrderDetail</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>TailorOrderDetail Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$tailororderdetail->id</td></tr>";
		$html.="<tr><th>Dress Id</th><td>$tailororderdetail->dress_id</td></tr>";
		$html.="<tr><th>Price</th><td>$tailororderdetail->price</td></tr>";
		$html.="<tr><th>Qty</th><td>$tailororderdetail->qty</td></tr>";
		$html.="<tr><th>Discount</th><td>$tailororderdetail->discount</td></tr>";
		$html.="<tr><th>Order Id</th><td>$tailororderdetail->order_id</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
