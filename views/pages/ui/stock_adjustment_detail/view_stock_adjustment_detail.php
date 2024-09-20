<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Stock_adjustment_detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Stock_adjustment_detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card">
      				<div class='card-body'>
		<?php
			echo Stock_adjustment_detail::get_stock_adjustment_details();
		?>
			</div>
    <div class="card-footer">
      &nbsp;
    </div>
</div>

</section>
    <!-- /.content -->