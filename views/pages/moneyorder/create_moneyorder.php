<?php
if(isset($_POST["btnCreate"])){
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDue"])){
		$errors["due"]="Invalid due";
	}

*/
	if(count($errors)==0){
		$moneyorder=new MoneyOrder();
		$moneyorder->customer_name=$_POST["txtCustomerName"];
		$moneyorder->paid_amount=$_POST["txtPaidAmount"];
		$moneyorder->receipt_date=date("Y-m-d",strtotime($_POST["txtReceiptDate"]));
		$moneyorder->order_total=$_POST["txtOrderTotal"];
		$moneyorder->shipping_address=$_POST["txtShippingAddress"];
		$moneyorder->remark=$_POST["txtRemark"];
		$moneyorder->mobile=$_POST["txtMobile"];
		$moneyorder->discount=$_POST["txtDiscount"];
		$moneyorder->due=$_POST["txtDue"];

		$moneyorder->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="money_orders">Manage MoneyOrder</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='create-moneyorder' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Customer Name","type"=>"text","name"=>"txtCustomerName"]);
	$html.=input_field(["label"=>"Paid Amount","type"=>"text","name"=>"txtPaidAmount"]);
	$html.=input_field(["label"=>"Receipt Date","type"=>"text","name"=>"txtReceiptDate"]);
	$html.=input_field(["label"=>"Order Total","type"=>"text","name"=>"txtOrderTotal"]);
	$html.=input_field(["label"=>"Shipping Address","type"=>"text","name"=>"txtShippingAddress"]);
	$html.=input_field(["label"=>"Remark","type"=>"text","name"=>"txtRemark"]);
	$html.=input_field(["label"=>"Mobile","type"=>"text","name"=>"txtMobile"]);
	$html.=input_field(["label"=>"Discount","type"=>"text","name"=>"txtDiscount"]);
	$html.=input_field(["label"=>"Due","type"=>"text","name"=>"txtDue"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
