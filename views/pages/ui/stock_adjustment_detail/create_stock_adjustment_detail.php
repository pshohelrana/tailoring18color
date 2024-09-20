<?php
if(isset($_POST["btnCreate"])){

		$adjustment_id=$_POST["cmbAdjustment"];
	$product_id=$_POST["cmbProduct"];
	$qty=$_POST["txtQty"];
	$price=$_POST["txtPrice"];

	$obj=new Stock_adjustment_detail("",$adjustment_id,$product_id,$qty,$price);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Stock_adjustment_detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Stock_adjustment_detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-stock_adjustment_detail' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-stock-adjustment-detail' class='btn btn-success'>Manage Stock_adjustment_detail</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=select_field(["label"=>"Adjustment Id","name"=>"cmbAdjustment","table"=>"adjustments"]);
$html.=select_field(["label"=>"Product Id","name"=>"cmbProduct","table"=>"products"]);
$html.=input_field(["label"=>"Qty","name"=>"txtQty"]);
$html.=input_field(["label"=>"Price","name"=>"txtPrice"]);

		echo $html;
?>
			</div>
				<div class='card-footer'>
<?php
	$html=input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]);
		echo $html;
?>
			</div>
</form>

</section>
    <!-- /.content -->