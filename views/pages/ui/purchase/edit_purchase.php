<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Purchase::get_purchase($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$supplier_id=$_POST["cmbSupplier"];
	$purchase_date=$_POST["txtPurchase_date"];
	$delivery_date=$_POST["txtDelivery_date"];
	$shipping_address=$_POST["txtShipping_address"];
	$purchase_total=$_POST["txtPurchase_total"];
	$paid_amount=$_POST["txtPaid_amount"];
	$remark=$_POST["txtRemark"];
	$status_id=$_POST["cmbStatus"];
	$discount=$_POST["txtDiscount"];
	$vat=$_POST["txtVat"];

	$obj=new Purchase($id,$supplier_id,$purchase_date,$delivery_date,$shipping_address,$purchase_total,$paid_amount,$remark,$status_id,$discount,$vat);
	$obj->update();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Purchase</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Purchase</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-purchase' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-purchase' class='btn btn-success'>Manage Purchase</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=select_field(["label"=>"Supplier Id","name"=>"cmbSupplier","table"=>"suppliers","value"=>$obj->get_supplier_id()]);
$html.=input_field(["label"=>"Purchase Date","name"=>"txtPurchase_date","value"=>$obj->get_purchase_date()]);
$html.=input_field(["label"=>"Delivery Date","name"=>"txtDelivery_date","value"=>$obj->get_delivery_date()]);
$html.=input_field(["label"=>"Shipping Address","name"=>"txtShipping_address","value"=>$obj->get_shipping_address()]);
$html.=input_field(["label"=>"Purchase Total","name"=>"txtPurchase_total","value"=>$obj->get_purchase_total()]);
$html.=input_field(["label"=>"Paid Amount","name"=>"txtPaid_amount","value"=>$obj->get_paid_amount()]);
$html.=input_field(["label"=>"Remark","name"=>"txtRemark","value"=>$obj->get_remark()]);
$html.=select_field(["label"=>"Status Id","name"=>"cmbStatus","table"=>"statuss","value"=>$obj->get_status_id()]);
$html.=input_field(["label"=>"Discount","name"=>"txtDiscount","value"=>$obj->get_discount()]);
$html.=input_field(["label"=>"Vat","name"=>"txtVat","value"=>$obj->get_vat()]);

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