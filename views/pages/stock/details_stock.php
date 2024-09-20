<?php
if(isset($_POST["btnDetails"])){
	$stock=Stock::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="stocks">Stock Report</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Stock Details</th></tr>
<?php
  echo Stock::html_table($stock->product_id);
?>
</table>
<?php echo table_wrap_close();?>
</div>
