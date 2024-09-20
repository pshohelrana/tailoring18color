<?php
if(isset($_POST["btnEdit"])){
	$tailororderdetail=TailorOrderDetail::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
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
		$tailororderdetail->id=$_POST["txtId"];
		$tailororderdetail->dress_id=$_POST["cmbDressId"];
		$tailororderdetail->price=$_POST["txtPrice"];
		$tailororderdetail->qty=$_POST["txtQty"];
		$tailororderdetail->discount=$_POST["txtDiscount"];
		$tailororderdetail->order_id=$_POST["cmbOrderId"];

		$tailororderdetail->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="tailor_order_details">Manage TailorOrderDetail</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-tailororderdetail' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$tailororderdetail->id"]);
	$html.=select_field(["label"=>"Dress","name"=>"cmbDressId","table"=>"dresss","value"=>"$tailororderdetail->dress_id"]);
	$html.=input_field(["label"=>"Price","type"=>"text","name"=>"txtPrice","value"=>"$tailororderdetail->price"]);
	$html.=input_field(["label"=>"Qty","type"=>"text","name"=>"txtQty","value"=>"$tailororderdetail->qty"]);
	$html.=input_field(["label"=>"Discount","type"=>"text","name"=>"txtDiscount","value"=>"$tailororderdetail->discount"]);
	$html.=select_field(["label"=>"Order","name"=>"cmbOrderId","table"=>"orders","value"=>"$tailororderdetail->order_id"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
