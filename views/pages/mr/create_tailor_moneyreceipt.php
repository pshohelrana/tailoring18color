<style>
    .order-head{
        margin-bottom:30px;
    }
    table,td{
        border:1px solid lightgray;
    }

    #cmbUom{
        width:100%;
    }
  
</style>
<div class="section">
      <div class="row">
          <div class="col-12 p-3">
             
              <div class="shadow-lg" style="background-color:#a5d6a7">
                <table class="table">  
                 <tr ><td colspan="4"style="background:#4caf50"><h3 class="d-flex justify-content-center ">Create Money Receipt</h3></td></tr>
                 <!-- <tr><td colspan="2"style="background:#fd7e1426"><h2 class="d-flex justify-content-center">Munshi tailor & fabrics</h2></td></tr>
                 <tr><td colspan="2"style="background:#fd7e1426"><h5 class="d-flex justify-content-center">propritor:Helal munshi<br>mobile:01961631322<br>B.H.T, Naoujur, Gajipur.</h5></td></tr> -->
                 
                 

                 <!-- <tr><td> Order Date</td><td> <input class="" type="date"id="orderDate" ></td></tr> -->
                 <tr><td colspan="1"> Money Receipt Date</td><td> <input class="" type="date" id="receipt_date" ></td></tr>
                 <tr><td>Customer Name</td><td><input type="text" id="customer_name" /></td></tr>
                 <tr><td>Mobile</td><td><input type="text" id="mobile" /></td></tr>
                 <tr><td>Shipping Address</td><td><textarea id="shippingaddress"></textarea></td></tr>
                    
                 <tr><td>Dress</td><td><?php
                       echo TailorDresse::html_select("cmbDresses");
                     ?></td></tr>
                    

                <tr><td>Price</td><td> <input type="text" class="cal" id="price" /></td></tr>   
                <tr><td>Qty</td><td><input type="text" class="cal" id="qty" /></td></tr> 

                
                         
                         <td colspan="2" style="text-align:right;font-weight:bold">Discount</td>
                         <td><input class="cal" type="text" id="discount" /></td>
                        </tr>
                        <tr>                         
                         <td colspan="2" style="text-align:right;font-weight:bold">Total</td>
                         <td><input type="text" readonly id="order_total" /></td>
                        </tr>
                        <tr>
                        <tr>                         
                         <td colspan="2" style="text-align:right;font-weight:bold">Paid Amount</td>
                         <td><input class="cal" type="text" id="paid_amount" /></td>
                        </tr>
                        <tr>
                        <tr>                         
                         <td colspan="2" style="text-align:right;font-weight:bold">Due</td>
                         <td><input type="text" readonly id="due" /></td>
                        </tr>
                        <tr>
                         <td colspan="2" style="text-align:right;font-weight:bold">Remark</td>
                         <td><textarea id="remark"></textarea></td>
                        </tr>
                        <tr>
                         
                         <td colspan="2" style="text-align:right;font-weight:bold"></td>
                         
                         <td><input type="button" id="save" value="Save" class="btn btn-primary" /></td>
                        </tr>
                        
                        
                   </table>
                  </td>    
                </tr>
                
                
               </table>

              </div>

          </div>
      </div>
      
      <div class="row no-print">
                <div class="col-12">
                  <a href="javascript:void(0)" onclick="print()"  rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  
                </div>
              </div>



</div>

<script>
      
    $(function(){
        var details=[];
           $("#save").on("click",function(){               
            if(confirm("Are you sure?")){
                    // console.log("save");
               let customer_name=$("#customer_name").val();
               let mobile=$("#mobile").val();
               let shipping_address=$("#shippingaddress").val();
               let receipt_date=$("#receipt_date").val();
              
               let paid_amount=$("#paid_amount").val();
               let order_total=$("#order_total").val();
               let remark=$("#remark").val();
               let discount=$("#discount").val();
               let due=$("#due").val();

               let customerDetails={
                customer_name:customer_name,
                mobile:mobile,
                shipping_address:shipping_address,
                receipt_date:receipt_date,
                
                paid_amount:paid_amount,
                order_total:order_total,
                remark:remark,
                discount:discount,
                due:due
              }
          //  console.log(customerDetails);

             let dress_id=$("#cmbDresses").val();
             let price=$("#price").val();
             let qty=$("#qty").val();
             
            

              let itemDetails={
                    dress_id:dress_id,
                    price:price,
                    qty:qty,
                    discount:discount
              }



              let data={
                customerInfo:customerDetails,
                itemInfo:itemDetails,
                
              }
              // console.log(data);

            $.ajax({
               type:"post",
               url:"api/MoneyOrder/save",
               data:data,
               success:function(res){
                 console.log(res);
               }
            });
          }       
          
           });


            $("#cmbDresses").on("change",function(){
                  
                let _id=$("#cmbDresses").val();
                $.ajax({
                    type:"POST",
                    data:{id:_id},
                    url:"api/TailorDressParameter/filter",
                    success:function(res){
                        let _data=JSON.parse(res);

                        $("#price").val(_data.price);
                        $("#qty").val(1);
                        $("#order_total").val(_data.price);

                    }
                      });

                    });  
                    
       
         $(".cal").on("input",function(){
            updateOrder();
         });
            
    });

    function updateOrder(){
               console.log("Ok");
                let price=$("#price").val();
                let qty=$("#qty").val();
                let discount=$("#discount").val();

                let total=price*qty-discount;
                $("#order_total").val(total);

                let advance=$("#paid_amount").val();
                let due=total-advance;
                $("#due").val(due);
   }

   
</script>

// <script src="js/cart_array.js"></script>