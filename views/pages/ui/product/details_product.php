<?php
if(isset($_POST["btnDetails"])){
	$product=Product::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="products">Manage Product</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Product Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$product->id</td></tr>";
		$html.="<tr><th>Name</th><td>$product->name</td></tr>";
		$html.="<tr><th>Offer Price</th><td>$product->offer_price</td></tr>";
		$html.="<tr><th>Manufacturer Id</th><td>$product->manufacturer_id</td></tr>";
		$html.="<tr><th>Regular Price</th><td>$product->regular_price</td></tr>";
		$html.="<tr><th>Description</th><td>$product->description</td></tr>";
		$html.="<tr><th>Photo</th><td><img src='img/$product->photo' width='100' /></td></tr>";
		$html.="<tr><th>Product Category Id</th><td>$product->product_category_id</td></tr>";
		$html.="<tr><th>Product Section Id</th><td>$product->product_section_id</td></tr>";
		$html.="<tr><th>Is Featured</th><td>$product->is_featured</td></tr>";
		$html.="<tr><th>Star</th><td>$product->star</td></tr>";
		$html.="<tr><th>Is Brand</th><td>$product->is_brand</td></tr>";
		$html.="<tr><th>Offer Discount</th><td>$product->offer_discount</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$product->uom_id</td></tr>";
		$html.="<tr><th>Weight</th><td>$product->weight</td></tr>";
		$html.="<tr><th>Barcode</th><td>$product->barcode</td></tr>";
		$html.="<tr><th>Created At</th><td>$product->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$product->updated_at</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
