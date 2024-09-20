<?php
if(isset($_POST["btnEdit"])){
	$tailororder=TailorOrder::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCustomerName"])){
		$errors["customer_name"]="Invalid customer_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPaidAmount"])){
		$errors["paid_amount"]="Invalid paid_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtOrderTotal"])){
		$errors["order_total"]="Invalid order_total";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtShippingAddress"])){
		$errors["shipping_address"]="Invalid shipping_address";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}
	if(!is_valid_mobile($_POST["txtMobile"])){
		$errors["mobile"]="Invalid mobile";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDiscount"])){
		$errors["discount"]="Invalid discount";
	}

*/
	if(count($errors)==0){
		$tailororder=new TailorOrder();
		$tailororder->id=$_POST["txtId"];
		$tailororder->customer_name=$_POST["txtCustomerName"];
		$tailororder->paid_amount=$_POST["txtPaidAmount"];
		$tailororder->order_datetime=$now;
		$tailororder->delivery_datetime=date("Y-m-d",strtotime($_POST["txtDeliveryDatetime"]));
		$tailororder->order_total=$_POST["txtOrderTotal"];
		$tailororder->shipping_address=$_POST["txtShippingAddress"];
		$tailororder->remark=$_POST["txtRemark"];
		$tailororder->mobile=$_POST["txtMobile"];
		$tailororder->discount=$_POST["txtDiscount"];

		$tailororder->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="tailor_orders">Manage TailorOrder</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-tailororder' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$tailororder->id"]);
	$html.=input_field(["label"=>"Customer Name","type"=>"text","name"=>"txtCustomerName","value"=>"$tailororder->customer_name"]);
	$html.=input_field(["label"=>"Paid Amount","type"=>"text","name"=>"txtPaidAmount","value"=>"$tailororder->paid_amount"]);
	$html.=input_field(["label"=>"Delivery Datetime","type"=>"text","name"=>"txtDeliveryDatetime","value"=>"$tailororder->delivery_datetime"]);
	$html.=input_field(["label"=>"Order Total","type"=>"text","name"=>"txtOrderTotal","value"=>"$tailororder->order_total"]);
	$html.=input_field(["label"=>"Shipping Address","type"=>"text","name"=>"txtShippingAddress","value"=>"$tailororder->shipping_address"]);
	$html.=input_field(["label"=>"Remark","type"=>"text","name"=>"txtRemark","value"=>"$tailororder->remark"]);
	$html.=input_field(["label"=>"Mobile","type"=>"text","name"=>"txtMobile","value"=>"$tailororder->mobile"]);
	$html.=input_field(["label"=>"Discount","type"=>"text","name"=>"txtDiscount","value"=>"$tailororder->discount"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
