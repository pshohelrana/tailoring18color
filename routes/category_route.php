<?php
if($page=="create-category"){
	$found=include("views/pages/ui/category/create_category.php");
}elseif($page=="edit-category"){
	$found=include("views/pages/ui/category/edit_category.php");
}elseif($page=="categories"){
	$found=include("views/pages/ui/category/manage_category.php");
}elseif($page=="details-category"){
	$found=include("views/pages/ui/category/details_category.php");
}elseif($page=="view-category"){
	$found=include("views/pages/ui/category/view_category.php");
}
?>
