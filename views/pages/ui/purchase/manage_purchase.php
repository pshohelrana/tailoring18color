<?php
if(isset($_POST["btnDelete"])){
	$purchase_id=$_POST["txtId"];
	Purchase::delete($purchase_id);}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Purchase</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Purchase</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card">
      <div class='card-header'>
				<a href='create-purchase' class='btn btn-success'>New Purchase</a>
			</div>
				<div class='card-body'>
		<?php
			echo Purchase::manage_purchases();
		?>
			</div>
    <div class="card-footer">
      &nbsp;
    </div>
</div>

</section>
    <!-- /.content -->