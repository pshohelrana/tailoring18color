<?php
if(isset($_POST["btnEdit"])){
	$division=Division::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}

*/
	if(count($errors)==0){
		$division=new Division();
		$division->id=$_POST["txtId"];
		$division->name=$_POST["txtName"];

		$division->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="division">Manage Division</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-division' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$division->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$division->name"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
