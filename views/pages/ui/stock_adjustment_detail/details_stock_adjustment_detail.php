<?php
if(isset($_POST["btnDetails"])){
	$stock_adjustment_detail_id=$_POST["txtId"];
	$obj=Stock_adjustment_detail::get_stock_adjustment_detail($stock_adjustment_detail_id);
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stock_adjustment_detail Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Stock_adjustment_detail Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><div class='card-header'>
				<a href='manage-stock_adjustment_detail' class='btn btn-success'>Manage Stock_adjustment_detail</a>
			</div>
				<div class='card-body'>
<?php
$html="<table class='table'>";
$html.="<tr><th>Id</th><td>{$obj->get_id()}</td></tr>
<tr><th>Adjustment Id</th><td>{$obj->get_adjustment_id()}</td></tr>
<tr><th>Product Id</th><td>{$obj->get_product_id()}</td></tr>
<tr><th>Qty</th><td>{$obj->get_qty()}</td></tr>
<tr><th>Price</th><td>{$obj->get_price()}</td></tr>
";
$html.="</table>";
		echo $html;
?>
			</div>
				<div class='card-footer'>
			</div>

</section>
    <!-- /.content -->