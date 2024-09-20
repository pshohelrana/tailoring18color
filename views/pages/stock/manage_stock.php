
<?php
echo page_header(["title"=>"Stock Report"]);
?>
<div class="p-4">
<?php echo table_wrap_open();?>
<?php
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	echo Stock::html_table_summary($current_page,5);
?>
<?php echo table_wrap_close();?>
</div>
