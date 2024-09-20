<?php
if(isset($_POST["btnDelete"])){
	Contact::delete($_POST["txtId"]);
}
?>
<?php
echo page_header(["title"=>"Manage Contact"]);
?>
<div class="p-4">
<?php echo table_wrap_open();?>
<?php
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	echo Contact::html_table($current_page,10);
?>
<?php echo table_wrap_close();?>
</div>
