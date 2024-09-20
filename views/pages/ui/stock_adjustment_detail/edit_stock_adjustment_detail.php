<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Stock_adjustment_detail::get_stock_adjustment_detail($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$adjustment_id=$_POST["cmbAdjustment"];
	$product_id=$_POST["cmbProduct"];
	$qty=$_POST["txtQty"];
	$price=$_POST["txtPrice"];

	$obj=new Stock_adjustment_detail($id,$adjustment_id,$product_id,$qty,$price);
	$obj->update();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Stock_adjustment_detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Stock_adjustment_detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-stock_adjustment_detail' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-stock_adjustment_detail' class='btn btn-success'>Manage Stock_adjustment_detail</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=select_field(["label"=>"Adjustment Id","name"=>"cmbAdjustment","table"=>"adjustments","value"=>$obj->get_adjustment_id()]);
$html.=select_field(["label"=>"Product Id","name"=>"cmbProduct","table"=>"products","value"=>$obj->get_product_id()]);
$html.=input_field(["label"=>"Qty","name"=>"txtQty","value"=>$obj->get_qty()]);
$html.=input_field(["label"=>"Price","name"=>"txtPrice","value"=>$obj->get_price()]);

		echo $html;
?>
			</div>
				<div class='card-footer'>
<?php
	$html=input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]);
		echo $html;
?>
			</div>
</form>
</section>
    <!-- /.content -->