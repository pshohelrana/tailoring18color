<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Stock_adjustment::get_stock_adjustment($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$adjustment_at=date("Y-m-d",strtotime($_POST["txtAdjustment_at"]));
	$user_id=$_POST["cmbUser"];
	$remark=$_POST["txtRemark"];
	$adjustment_type_id=$_POST["cmbAdjustment_type"];
	$werehouse_id=$_POST["cmbWerehouse"];

	$obj=new Stock_adjustment($id,$adjustment_at,$user_id,$remark,$adjustment_type_id,$werehouse_id);
	$obj->update();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Stock_adjustment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Stock_adjustment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-stock_adjustment' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-stock_adjustment' class='btn btn-success'>Manage Stock_adjustment</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=input_field(["label"=>"Adjustment At","type"=>"date","name"=>"txtAdjustment_at","value"=>$obj->get_adjustment_at()]);
$html.=select_field(["label"=>"User Id","name"=>"cmbUser","table"=>"users","value"=>$obj->get_user_id()]);
$html.=input_field(["label"=>"Remark","name"=>"txtRemark","value"=>$obj->get_remark()]);
$html.=select_field(["label"=>"Adjustment Type Id","name"=>"cmbAdjustment_type","table"=>"adjustment_types","value"=>$obj->get_adjustment_type_id()]);
$html.=select_field(["label"=>"Werehouse Id","name"=>"cmbWerehouse","table"=>"werehouses","value"=>$obj->get_werehouse_id()]);

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