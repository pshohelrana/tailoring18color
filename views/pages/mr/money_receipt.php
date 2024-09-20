<style>
  #cmbCustomer {
    padding: 5px;
  }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Create Money Receipt</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Create Money Receipt</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">



        <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fas fa-globe"></i> I-SHOP.
                <small class="float-right">Date: <?php echo date("d M Y") ?></small>
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row">
              <div class="col-sm-3">
                <div class="btn-group">
                  <input type="text"  placeholder="Enter Invoice Id" name="search" class="form-control" id="search" />
                  <button id="go" class="btn btn-primary">Go</button>
                </div>
              </div>
          </div>
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>ISHOP, Inc.</strong><br>
                House:12, Road:1<br>
                Block:E<br>
                Mobile: 017834433<br>
                Email: info@ishop.com
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              Customer
              <input type="text" class="form-control" id="customer" readonly="readonly" />
              <address>
               

                <div id="customer-info"></div>

              </address>
              <div>
                Shipping Address:<br>
                <textarea class="form-control" id="txtShippingAddress"></textarea>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">

              <table>
                <tr>
                  <td><b>Receipt ID:</b></td>
                  <td><input id="receiptid" type="text" style="width:60px" value="<?php echo MoneyReceipt::get_last_id() + 1; ?>" readonly /></td>
                </tr>
                <tr>
                  <td><b>Receipt Date:</b></td>
                  <td><input type="text" id="txtOrderDate" value=<?php echo date("d-m-Y"); ?> /></td>
                </tr>
                
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Discount</th>
                    <th>Subtotal</th>
                   
                  </tr>
               
                </thead>
                <tbody id="items">

                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
              <strong>Remark</strong><br>
              <textarea class="form-control" id="txtRemark"></textarea>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <p class="lead">Amount Due 2/22/2014</p>

              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td id="subtotal">0</td>
                    </tr>


                    <tr>
                      <th>Total:</th>
                      <td id="net-total">0</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <a href="javascript:void(0)" onclick="window.print()" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              <button type="button" id="btnProcessMr" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Money Receipt </button>
              <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
              </button>
            </div>
          </div>
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
  $(function() {

  //----Global variables----

    var products=[];
    var customer_id;
    var date;


    //----------GO-------------
    $("#go").on("click",function(){ 
      
      let invoice_id=$("#search").val();          
      $.ajax({
        url:"api/order/find",
        type:"POST",
        data:{"id":invoice_id},
        success:function(res){
          let data=JSON.parse(res);
          $("#customer").val(data.customer.name);
          $("#txtShippingAddress").val(data.order.shipping_address);
          $("#txtOrderDate").val(data.order.order_date);
          
          customer_id=data.order.customer_id;
          products=data.products;        


          printRceipt(products);
        
          console.log(products);          

        }
      });
     

    });

    //Save into database table
    $("#btnProcessMr").on("click", function() {     
      let order_date = $("#txtOrderDate").val();
      let due_date = $("#txtDueDate").val();
      let discount = 0;
      let vat = 0;
      let shipping_address = $("#txtShippingAddress").val();
      let remark = $("#txtRemark").val();
      let receipt_total = $("#net-total").text();

     // let products = cart.getCart();

      $.ajax({
        url: 'api/moneyreceipt/save',
        type: 'POST',
        data: {
          "customer_id": customer_id,        
          "remark": remark,
          "receipt_total": receipt_total,
          "products": products
        },
        success: function(res) {

          let data=JSON.parse(res);
            $("#receiptid").val(data.id+1);

          window.print();
          console.log(res);
          cart.clearCart();
          $("#items").html("");
        }
      });

    });

   
    
 
    //Add item to bill temporarily      

    //------------------Cart Functions----------//     

    function printRceipt(products) {

    let orders = products;
    let sn = 1;
    let $bill = "";
    let subtotal = 0;

    if (orders != null) {

      orders.forEach(function(item, i) {
        //console.log(item.name);
        item.discount=item.discount==undefined?0:item.discount;

        subtotal += item.price * item.qty - item.discount;
        
        let $html = "<tr>";
        $html += "<td>";
        $html += sn;
        $html += "</td>";
        $html += "<td>";
        $html += item.name;
        $html += "</td>";
        $html += "<td data-field='price'>";
        $html += item.price;
        $html += "</td>";
        $html += "<td data-field='qty'>";
        $html += item.qty;
        $html += "</td>";
        $html += "<td data-field='discount'>";
        $html += item.total_discount==undefined?0:item.total_discount;
        $html += "</td>";
        $html += "<td data-field='subtotal'>";
        $html += item.price*item.qty - item.discount;
        $html += "</td>";
        $html += "<td>";
       // $html += "<input type='button' class='delete' data-id='" + item.item_id + "' value='-'/>";
        $html += "</td>";
        $html += "</tr>";
        $bill += $html;
        sn++;
      });
}

$("#items").html($bill);

//Order Summary
  $("#subtotal").html(subtotal);
  let tax = (subtotal * 0.05).toFixed(2);
  $("#tax").html(tax);
  $("#net-total").html(parseFloat(subtotal) + parseFloat(tax));
  }




  });
</script>
