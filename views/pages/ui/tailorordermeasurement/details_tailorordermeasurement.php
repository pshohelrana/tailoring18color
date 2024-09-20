<?php
if(isset($_POST["btnDetails"])){
	$tailorordermeasurement=TailorOrderMeasurement::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="tailor_order_measurements">Manage TailorOrderMeasurement</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>TailorOrderMeasurement Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$tailorordermeasurement->id</td></tr>";
		$html.="<tr><th>Order Id</th><td>$tailorordermeasurement->order_id</td></tr>";
		$html.="<tr><th>Measurement Id</th><td>$tailorordermeasurement->measurement_id</td></tr>";
		$html.="<tr><th>Size</th><td>$tailorordermeasurement->size</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$tailorordermeasurement->uom_id</td></tr>";
		$html.="<tr><th>Dress Id</th><td>$tailorordermeasurement->dress_id</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
