<style>
 #cmbSuppier{
   padding:5px;
 }
</style>
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> I-SHOP.
                    <small class="float-right">Date: <?php echo date("d M Y")?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
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
                  To
                  <address>
					  
                    <?php
                       echo Supplier::supplier_selectbox();
                    ?>
                   <div class="customer-info"></div>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 
                  <table>
                    <tr><td><b>Order ID:</b></td><td><input type="text" style="width:60px" value="<?php echo Order::get_last_id()+1;?>"  readonly/></td></tr>
                    <tr><td><b>Order Date:</b></td><td><input type="text" id="txtOrderDate" value=<?php echo date("d-m-Y");?> /></td></tr>
                    <tr><td><b>Due Date:</b></td><td><input type="text" id="txtDueDate" value=<?php echo date("d-m-Y");?> /></td></tr>
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
                      <th><input type="button" id="clearAll" value="Clear" /></th>
                    </tr>
                    <tr>
                      <th></th>
                      <th>
                        <?php
                          echo Product::product_selectbox();
                       ?>
                      </th>
                        <th><input type="text" id="txtPrice" /></th>
                        <th><input type="text" id="txtQty" /></th>
                        <th><input type="text" id="txtDiscount" /></th>
                        <th></th>
                        <th><input type="button" id="btnAddToCart" value=" + " /></th>
                      </tr>
                    </thead>
                    <tbody  id="items">                    
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="asset/dist/img/credit/visa.png" alt="Visa">
                  <img src="asset/dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="asset/dist/img/credit/american-express.png" alt="American Express">
                  <img src="asset/dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   Thank you for shopping
                  </p>
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
                        <th>Tax (5%)</th>
                        <td id="tax">0</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td id="shopping-cost">0</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td id="net-total">0</td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" id="btnProcessOrder" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Order </button>
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
        
        //Show calander in textbox
        $("#txtOrderDate").datepicker({dateFormat: 'dd-mm-yy'});
        $("#txtDueDate").datepicker({dateFormat: 'dd-mm-yy'});

        printCart();

        //Save into database table
        $("#btnProcessOrder").on("click",function(){

              let customer_id=$("#cmbSupplier").val();
              let order_date=$("#txtOrderDate").val();
              let due_date=$("#txtDueDate").val();
              let discount=0;
              let vat=0;
              let shipping_address="na";

              let products=JSON.parse(localStorage.getItem("cart"));

              $.ajax({
                url:'api/create_order',
                type:'POST',
                data:{
                  "cmbSupplier":customer_id,
                  "txtOrderDate":order_date,
                  "txtDueDate":due_date,
                  "txtShippingAddress":shipping_address,
                  "txtDiscount":discount,
                  "txtVat":vat,
                  "txtProducts":products
                },
                success:function(res){
                  console.log(res);
                  clearCart();
                  $("#items").html("");
                }
            });

        });   
             

      
        //Show customer other information
        $("#cmbSupplier").on("change",function(){        

           $.ajax({
             url:'api/get_supplier',
             type:'POST',
             data:{"cmbSupplier":$(this).val()},
             success:function(res){
                 let customer=JSON.parse(res);
               console.log(customer);
              
              $(".customer-info").html(customer.mobile+"<br>"+customer.email);
             }
           });


        });  //   


        
         //Show customer other information
         $("#cmbProduct").on("change",function(){
			$("#txtPrice").focus();

        //    $.ajax({
        //      url:'api/get_product',
        //      type:'POST',
        //      data:{"cmbProduct":$(this).val()},
        //      success:function(res){
        //        $("#txtPrice").val(res);
        //        $("#txtQty").val(1);
        //      }
        //    });

        });   //  
                       
          
		$("#txtPrice").on("keyup",function(e){

			if(e.which==13){
				$("#txtQty").focus();
			}

		});
       /*
         //cart
         [
          {'name':'jahid','item_id':20,'price':30,'qty':1,'discount':0,'subtotal':30},
          {'name':'jahid','item_id':20,'price':30,'qty':1,'discount':0,'subtotal':30},
          {'name':'jahid','item_id':20,'price':30,'qty':1,'discount':0,'subtotal':30},
          {'name':'jahid','item_id':20,'price':30,'qty':1,'discount':0,'subtotal':30}          
         ]
        */ 
      
      //Add item to bill temporarily

        $("#btnAddToCart").on("click",function(){
          
            let item_id=$("#cmbProduct").val(); 
            let name=  $("#cmbProduct option:selected").text();          
            let price=$("#txtPrice").val();
            let qty=$("#txtQty").val();
            let discount=$("#txtDiscount").val();
            let total_discount=discount*qty;
            let subtotal=price*qty-total_discount;
           
            let item={"name":name,"item_id":item_id,"price":price,"qty":parseFloat(qty),"discount":discount,'total_discount':total_discount,"subtotal":subtotal}; 

             save(item);
             printCart();        
          
        });
       

        // $("body #items").on("dblclick","tr td",function(){         
        //    $(this).attr('contentEditable',true);
        // });

        // $("body #items").on("input","tr td",function(){  
         
        //   let index=$(this).parent().data("id"); 
        //    //alert(index);
        //    if($(this).attr('contentEditable')){
                                  
        //      let field=$(this).data("field"); 
        //      let value=$(this).text();            
             
        //      if(field=="price"){
        //         //updatePrice(index,value);
        //       }else if(field=="qty"){
        //        // updateQty(index,value);
        //       }else if(field=="discount"){
        //        // updateDiscount(index,value);
        //       }
            
            
        //    }

        // });


        $("body").on("click",".delete",function(){
           let id=$(this).data("id");        
           delItem(id)
           printCart();
        });
     
        $("#clearAll").on("click",function(){
          clearCart();
          printCart();
        });


    //------------------Cart Functions----------//      

	function printCart(){

     let cart= getCart();
     let sn=1;          
     let $bill="";  
     let subtotal=0;

     cart.forEach(function(item,i){
          //console.log(item.name);
       subtotal+=item.price*item.qty-item.discount;
       let $html="<tr>";            
       $html+="<td>";
       $html+=sn;
       $html+="</td>";
       $html+="<td>";
       $html+=item.name;
       $html+="</td>";
       $html+="<td data-field='price'>";
       $html+=item.price;
       $html+="</td>";
       $html+="<td data-field='qty'>";
       $html+=item.qty;
       $html+="</td>";
       $html+="<td data-field='discount'>";
       $html+=item.total_discount;
       $html+="</td>";
       $html+="<td data-field='subtotal'>";
       $html+=item.subtotal;
       $html+="</td>";
       $html+="<td>";
       $html+="<input type='button' class='delete' data-id='"+item.item_id+"' value='-'/>";
       $html+="</td>";
       $html+="</tr>";
       $bill+=$html;
       sn++;
     });      
                
     $("#items").html($bill); 

     //Order Summary
     $("#subtotal").html(subtotal);
     let tax=(subtotal*0.05).toFixed(2);
     $("#tax").html(tax);
     $("#net-total").html(parseFloat(subtotal)+parseFloat(tax));
  }

 });

  </script>  
  <script src="js/cart.js"></script>
  
