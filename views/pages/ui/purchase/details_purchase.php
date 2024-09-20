<?php
if(isset($_POST["btnDetails"])){
	$purchase_id=$_POST["txtId"];
	$obj=Purchase::get_purchase($purchase_id);
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><div class='card-header'>
				<a href='manage-purchase' class='btn btn-success'>Manage Purchase</a>
			</div>
				<div class='card-body'>
<?php
$html="<table class='table'>";
$html.="<tr><th>Id</th><td>{$obj->get_id()}</td></tr>
<tr><th>Supplier Id</th><td>{$obj->get_supplier_id()}</td></tr>
<tr><th>Purchase Date</th><td>{$obj->get_purchase_date()}</td></tr>
<tr><th>Delivery Date</th><td>{$obj->get_delivery_date()}</td></tr>
<tr><th>Shipping Address</th><td>{$obj->get_shipping_address()}</td></tr>
<tr><th>Purchase Total</th><td>{$obj->get_purchase_total()}</td></tr>
<tr><th>Paid Amount</th><td>{$obj->get_paid_amount()}</td></tr>
<tr><th>Remark</th><td>{$obj->get_remark()}</td></tr>
<tr><th>Status Id</th><td>{$obj->get_status_id()}</td></tr>
<tr><th>Discount</th><td>{$obj->get_discount()}</td></tr>
<tr><th>Vat</th><td>{$obj->get_vat()}</td></tr>
";
$html.="</table>";
		echo $html;
?>
			</div>
				<div class='card-footer'>
			</div>

</section>
    <!-- /.content -->