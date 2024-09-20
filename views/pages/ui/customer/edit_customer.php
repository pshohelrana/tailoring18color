<?php
if(isset($_POST["btnEdit"])){
	$customer=Customer::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
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
		$customer->id=$_POST["txtId"];
		$customer->name=$_POST["txtName"];
		$customer->mobile=$_POST["txtMobile"];
		$customer->email=$_POST["txtEmail"];
		$customer->created_at=$now;
		$customer->updated_at=$now;
		$customer->address=$_POST["txtAddress"];
		if($_FILES["filePhoto"]["name"]!=""){
			$customer->photo=upload($_FILES["filePhoto"], "img",$_POST["txtId"]);
		}else{
			$customer->photo=Customer::find($_POST["txtId"])->photo;
		}

		$customer->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="customers">Manage Customer</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-customer' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$customer->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$customer->name"]);
	$html.=input_field(["label"=>"Mobile","type"=>"text","name"=>"txtMobile","value"=>"$customer->mobile"]);
	$html.=input_field(["label"=>"Email","type"=>"text","name"=>"txtEmail","value"=>"$customer->email"]);
	$html.=input_field(["label"=>"Address","type"=>"text","name"=>"txtAddress","value"=>"$customer->address"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
