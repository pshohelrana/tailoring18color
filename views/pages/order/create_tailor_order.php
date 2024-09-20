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
             
              <div class="shadow-lg" style="background-color:#fd7e1429">
                <table class="table">  
                 <tr ><td colspan="2"style="background:#fd7e1454"><h3 class="d-flex justify-content-center ">Create Order</h3></td></tr>
                 <!-- <tr><td colspan="2"style="background:#fd7e1426"><h2 class="d-flex justify-content-center">Munshi tailor & fabrics</h2></td></tr>
                 <tr><td colspan="2"style="background:#fd7e1426"><h5 class="d-flex justify-content-center">propritor:Helal munshi<br>mobile:01961631322<br>B.H.T, Naoujur, Gajipur.</h5></td></tr> -->
                 
                 

                 <tr><td> Order Date</td><td> <input class="" type="date"id="orderDate" ></td></tr>
                 <tr><td> Delivery Date</td><td> <input class="" type="date" id="deliveryDate" ></td></tr>
                 <tr><td>Customer Name</td><td><input type="text" id="customer" /></td></tr>
                 <tr><td>Mobile</td><td><input type="text" id="mobile" /></td></tr>
                 <tr><td>Shipping Address</td><td><textarea id="shippingAddress"></textarea></td></tr>
                    
                 <tr><td>Dress</td><td><?php
                       echo TailorDresse::html_select("cmbDresses");
                     ?></td></tr>
                    

                <tr><td>Price</td><td> <input type="text" class="cal" id="price" /></td></tr>   
                <tr><td>Qty</td><td><input type="text" class="cal" id="qty" /></td></tr> 

                <tr>
                  <td colspan="2">
                    <table class="table">
                          <tr>
                            <td>Measurement</td>
                            <td>Size</td>
                            <td>Uom</td>
                            <td>Action</td>
                          </tr>
                          <tr>
                            <td style="width:200px;">
                            <select class="form-control" id="measurement" ></select>
                           </td>
                            <td>
                                <input type="text" id="size" />
                            </td>
                            <td>
                                <?php
                               echo TailorUom::html_select("cmbUom");
                                ?>
                            </td>
                            <td>
                            <input type="button" id="addMeasure" value="+">
                            </td>
                        </tr>  
                        <tbody id="bill">
                        </tbody>

                        <tr>
                         
                         <td colspan="2" style="text-align:right;font-weight:bold">Discount</td>
                         <td><input class="cal" type="text" id="discount" /></td>
                        </tr>
                        <tr>                         
                         <td colspan="2" style="text-align:right;font-weight:bold">Total</td>
                         <td><input type="text" readonly id="total" /></td>
                        </tr>
                        <tr>
                        <tr>                         
                         <td colspan="2" style="text-align:right;font-weight:bold">Advance</td>
                         <td><input class="cal" type="text" id="advance" /></td>
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
                         
                         <td><input type="button" id="save" value="Save" class="btn btn-danger" /></td>
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
                  <!-- <button type="button" id="btnProcessOrder" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Order </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                </div>
              </div>



</div>

<script>
      
    $(function(){
        var details=[];
           $("#save").on("click",function(){               
            if(confirm("Are you sure?")){
         
               let customer=$("#customer").val();
               let mobile=$("#mobile").val();
               let shipping_address=$("#shippingAddress").val();
               let delivery_date=$("#deliveryDate").val();
               let order_date=$("#orderDate").val();
               let paid_amount=$("#advance").val();
               let order_total=$("#total").val();
               let remark=$("#remark").val();
               let discount=$("#discount").val();
               let due=$("#due").val();

               let customerDetails={
                customer_name:customer,
                mobile:mobile,
                shipping_address:shipping_address,
                delivery_datetime:delivery_date,
                order_datetime:order_date,
                paid_amount:paid_amount,
                order_total:order_total,
                remark:remark,
                discount:discount,
                due:due
              }

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
                measurementInfo:details
              }

            $.ajax({
               type:"post",
               url:"api/TailorOrder/save",
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
                        $("#total").val(_data.price);

                       //console.log(_data);
                       let html="";
                       _data.parameters.forEach(function(d,i){
                        
                         html+=`<option value='${d.id}'>${d.name}</option>`;                       
                       
                        });
                        $("#measurement").html(html);


                       
                    }
                });

            });          
            
           

           $("#addMeasure").on("click",function(){           
            
             let measure_id= $("#measurement").val();
             let measure_name= $("#measurement option:selected").text();
             let size=$("#size").val();
             let uom_id=$("#cmbUom").val();
             let uom_name=$("#cmbUom option:selected").text();

             details.push({measure_id:measure_id,measure_name:measure_name,size:size,uom_id:uom_id,uom_name:uom_name});

            // console.log(details);
             printDetails(details);

           });

           function printDetails(details){
            sn=1;
            $("#bill").html("");
            details.forEach(function(item){
                $("#bill").append(`<tr>
                  <td>${sn++}</td>
                  <td>${item.measure_name}</td>
                  <td>${item.size}</td>
                  <td>${item.uom_name}</td>
                  <td><button class="btn-del" data-id="${item.measure_id}">Del</button></td>
                </tr>`);
            });
            
           }//end printDetails

           $("body").on("click",".btn-del",function(){
                let id=$(this).data("id");
            
                details= details.filter(f=>{
                    return f.measure_id!=id
                });

                printDetails(details);

           });//end Event
       
         $(".cal").on("input",function(){
            updateOrder();
         });
            
    });

    function updateOrder(){
               // console.log("Ok");
                let price=$("#price").val();
                let qty=$("#qty").val();
                let discount=$("#discount").val();

                let total=price*qty-discount;
                $("#total").val(total);

                let advance=$("#advance").val();
                let due=total-advance;
                $("#due").val(due);
   }

   
</script>

<script src="js/cart_array.js"></script>