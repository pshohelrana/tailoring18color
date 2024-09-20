<?php
if(isset($_POST["btnCreate"])){

		$adjustment_at=date("Y-m-d",strtotime($_POST["txtAdjustment_at"]));
	$user_id=$_POST["cmbUser"];
	$remark=$_POST["txtRemark"];
	$adjustment_type_id=$_POST["cmbAdjustment_type"];
	$werehouse_id=$_POST["cmbWerehouse"];

	$obj=new Stock_adjustment("",$adjustment_at,$user_id,$remark,$adjustment_type_id,$werehouse_id);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Stock_adjustment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Stock_adjustment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-stock_adjustment' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-stock-adjustment' class='btn btn-success'>Manage Stock_adjustment</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["label"=>"Adjustment At","type"=>"date","name"=>"txtAdjustment_at"]);
$html.=select_field(["label"=>"User Id","name"=>"cmbUser","table"=>"users"]);
$html.=input_field(["label"=>"Remark","name"=>"txtRemark"]);
$html.=select_field(["label"=>"Adjustment Type Id","name"=>"cmbAdjustment_type","table"=>"adjustment_types"]);
$html.=select_field(["label"=>"Werehouse Id","name"=>"cmbWerehouse","table"=>"werehouses"]);

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