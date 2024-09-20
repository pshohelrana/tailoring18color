<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbOrderId"])){
		$errors["order_id"]="Invalid order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbMeasurementId"])){
		$errors["measurement_id"]="Invalid measurement_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtSize"])){
		$errors["size"]="Invalid size";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbUomId"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbDressId"])){
		$errors["dress_id"]="Invalid dress_id";
	}

*/
	if(count($errors)==0){
		$tailorordermeasurement=new TailorOrderMeasurement();
		$tailorordermeasurement->order_id=$_POST["cmbOrderId"];
		$tailorordermeasurement->measurement_id=$_POST["cmbMeasurementId"];
		$tailorordermeasurement->size=$_POST["txtSize"];
		$tailorordermeasurement->uom_id=$_POST["cmbUomId"];
		$tailorordermeasurement->dress_id=$_POST["cmbDressId"];

		$tailorordermeasurement->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="tailor_order_measurements">Manage TailorOrderMeasurement</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='create-tailorordermeasurement' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=select_field(["label"=>"Order","name"=>"cmbOrderId","table"=>"orders"]);
	$html.=select_field(["label"=>"Measurement","name"=>"cmbMeasurementId","table"=>"measurements"]);
	$html.=input_field(["label"=>"Size","type"=>"text","name"=>"txtSize"]);
	$html.=select_field(["label"=>"Uom","name"=>"cmbUomId","table"=>"uom"]);
	$html.=select_field(["label"=>"Dress","name"=>"cmbDressId","table"=>"dresses"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
