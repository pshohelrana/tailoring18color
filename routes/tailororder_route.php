<?php
if($page=="create-tailororder"){
	$found=include("views/pages/tailororder/create_tailororder.php");
}elseif($page=="edit-tailororder"){
	$found=include("views/pages/tailororder/edit_tailororder.php");
}elseif($page=="tailor_orders"){
	$found=include("views/pages/tailororder/manage_tailororder.php");
}elseif($page=="details-tailororder"){
	$found=include("views/pages/tailororder/details_tailororder.php");
}elseif($page=="view-tailororder"){
	$found=include("views/pages/tailororder/view_tailororder.php");
}
?>
