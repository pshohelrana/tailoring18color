<?php
if(isset($_POST["btnDelete"])){
	$stock_adjustment_detail_id=$_POST["txtId"];
	Stock_adjustment_detail::delete($stock_adjustment_detail_id);}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Stock_adjustment_detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Stock_adjustment_detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card">
      <div class='card-header'>
				<a href='create-stock-adjustment-detail' class='btn btn-success'>New Stock_adjustment_detail</a>
			</div>
				<div class='card-body'>
		<?php
			echo Stock_adjustment_detail::manage_stock_adjustment_details();
		?>
			</div>
    <div class="card-footer">
      &nbsp;
    </div>
</div>

</section>
    <!-- /.content -->