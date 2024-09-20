<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Stock_adjustment_type::get_stock_adjustment_type($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$name=$_POST["txtName"];
	$factor=$_POST["txtFactor"];

	$obj=new Stock_adjustment_type($id,$name,$factor);
	$obj->update();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Stock_adjustment_type</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Stock_adjustment_type</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-stock_adjustment_type' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-stock_adjustment_type' class='btn btn-success'>Manage Stock_adjustment_type</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=input_field(["label"=>"Name","name"=>"txtName","value"=>$obj->get_name()]);
$html.=input_field(["label"=>"Factor","name"=>"txtFactor","value"=>$obj->get_factor()]);

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