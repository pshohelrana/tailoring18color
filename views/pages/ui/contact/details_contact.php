<?php
if(isset($_POST["btnDetails"])){
	$contact=Contact::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="contacts">Manage Contact</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Contact Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$contact->id</td></tr>";
		$html.="<tr><th>Name</th><td>$contact->name</td></tr>";
		$html.="<tr><th>Contact Category Id</th><td>$contact->contact_category_id</td></tr>";
		$html.="<tr><th>Contact No</th><td>$contact->contact_no</td></tr>";
		$html.="<tr><th>Email</th><td>$contact->email</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
