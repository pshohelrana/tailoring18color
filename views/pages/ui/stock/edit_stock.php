<?php
if(isset($_POST["btnEdit"])){
	$stock=Stock::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbProductId"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtQty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbTransactionTypeId"])){
		$errors["transaction_type_id"]="Invalid transaction_type_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbWarehouseId"])){
		$errors["warehouse_id"]="Invalid warehouse_id";
	}

*/
	if(count($errors)==0){
		$stock=new Stock();
		$stock->id=$_POST["txtId"];
		$stock->product_id=$_POST["cmbProductId"];
		$stock->qty=$_POST["txtQty"];
		$stock->transaction_type_id=$_POST["cmbTransactionTypeId"];
		$stock->remark=$_POST["txtRemark"];
		$stock->created_at=$now;
		$stock->warehouse_id=$_POST["cmbWarehouseId"];

		$stock->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="stocks">Manage Stock</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-stock' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$stock->id"]);
	$html.=select_field(["label"=>"Product","name"=>"cmbProductId","table"=>"products","value"=>"$stock->product_id"]);
	$html.=input_field(["label"=>"Qty","type"=>"text","name"=>"txtQty","value"=>"$stock->qty"]);
	$html.=select_field(["label"=>"Transaction Type","name"=>"cmbTransactionTypeId","table"=>"transaction_types","value"=>"$stock->transaction_type_id"]);
	$html.=input_field(["label"=>"Remark","type"=>"text","name"=>"txtRemark","value"=>"$stock->remark"]);
	$html.=select_field(["label"=>"Warehouse","name"=>"cmbWarehouseId","table"=>"warehouses","value"=>"$stock->warehouse_id"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
