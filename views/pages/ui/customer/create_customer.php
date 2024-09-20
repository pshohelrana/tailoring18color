<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!is_valid_mobile($_POST["txtMobile"])){
		$errors["mobile"]="Invalid mobile";
	}
	if(!is_valid_email($_POST["txtEmail"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtAddress"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhoto"])){
		$errors["photo"]="Invalid photo";
	}

*/
	if(count($errors)==0){
		$customer=new Customer();
		$customer->name=$_POST["txtName"];
		$customer->mobile=$_POST["txtMobile"];
		$customer->email=$_POST["txtEmail"];
		$customer->created_at=$now;
		$customer->updated_at=$now;
		$customer->address=$_POST["txtAddress"];
		$customer->photo=upload($_FILES["filePhoto"], "img",$_POST["txtMobile"]);

		$customer->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="customers">Manage Customer</a>
<?php echo form_wrap_open(["title"=>"Create Customer"]);?>
<form class='form-horizontal' action='create-customer' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=input_field(["label"=>"Mobile","type"=>"text","name"=>"txtMobile"]);
	$html.=input_field(["label"=>"Email","type"=>"text","name"=>"txtEmail"]);
	$html.=input_field(["label"=>"Address","type"=>"text","name"=>"txtAddress"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
