<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbDressId"])){
		$errors["dress_id"]="Invalid dress_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPrice"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtQty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDiscount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbOrderId"])){
		$errors["order_id"]="Invalid order_id";
	}

*/
	if(count($errors)==0){
		$tailororderdetail=new TailorOrderDetail();
		$tailororderdetail->dress_id=$_POST["cmbDressId"];
		$tailororderdetail->price=$_POST["txtPrice"];
		$tailororderdetail->qty=$_POST["txtQty"];
		$tailororderdetail->discount=$_POST["txtDiscount"];
		$tailororderdetail->order_id=$_POST["cmbOrderId"];

		$tailororderdetail->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="tailor_order_details">Manage TailorOrderDetail</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='create-tailororderdetail' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=select_field(["label"=>"Dress","name"=>"cmbDressId","table"=>"dress"]);
	$html.=input_field(["label"=>"Price","type"=>"text","name"=>"txtPrice"]);
	$html.=input_field(["label"=>"Qty","type"=>"text","name"=>"txtQty"]);
	$html.=input_field(["label"=>"Discount","type"=>"text","name"=>"txtDiscount"]);
	$html.=select_field(["label"=>"Order","name"=>"cmbOrderId","table"=>"orders"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
