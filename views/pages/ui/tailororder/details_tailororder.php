<?php
if(isset($_POST["btnDetails"])){
	$order=TailorOrder::find($_POST["txtId"]);
	$detail=TailorOrderDetail::find($_POST["txtId"]);
	// $parameter=TailorDressParameter::find($_POST["txtId"]);
  $customer=$order->customer_name;
}
?>
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
             
              <div class="shadow-lg" style="background-color:#d1c4e9">
                <table class="table">  
                 <tr ><td colspan="7"style="background:#8c9eff"><h3 class="d-flex justify-content-center ">Invoice</h3></td></tr>
                 <tr><td colspan="7"style="background:#8c9eff"><h2 class="d-flex justify-content-center">Munshi tailor & fabrics</h2></td></tr>
                 <tr><td colspan="7"style="background:#8c9eff"><h5 class="d-flex justify-content-center">propritor:Helal munshi<br>mobile:01961631322<br>B.H.T, Naoujur, Gajipur.</h5></td></tr>
                 
                 
                 <tr><td colspan="3"><b>Order ID:</b></td><td><?php  echo $order->id;?>  </td></tr>
                 <tr><td colspan="3"> Order Date</td><td> <?php echo $order->order_datetime;?> </td></tr>
                 <tr><td colspan="3"> Delivery Date</td><td> <?php echo $order->delivery_datetime;?> </td></tr>
                 <tr><td colspan="3">Customer Name</td><td><?php echo $order->customer_name;?></td></tr>
                 <tr><td colspan="3">Mobile</td><td><?php echo $order->mobile;?></td></tr>
                 <tr><td colspan="3">Shipping Address</td><td><?php echo $order->shipping_address;?></td></tr>
                  
                 

                 
                 <tr><td><b>SN</b></td><td><b>Dress Name</b></td><td><b>Price</b></td><td><b>qty</b></td><td><b>Discount</b></td><td><b>Total</b></td></tr>
                  <tbody>                    
                      <?php
					     $order_details= TailorOrderDetail::all_by_order_id($order->id);
						 $i=1;
						 $sub_total=0;
						 foreach($order_details as $line){
							$line_total=$line->price*$line->qty-$line->discount;
							$sub_total+=$line_total;

                           echo "<tr><th>".$i++."</th>
						   <td>{$line->name}</td>
						   <td>{$line->price}</td>
						   <td>{$line->qty}</td>                     
						   <td>{$line->discount}</td>						   
						   <td>{$line_total}</td>
						   <td></td>
               
               </tr>";
						 }
					  ?>
                    </tbody>

                        <tr>                         
                         <td colspan="5" style="text-align:right;font-weight:bold">Advance</td>
                         <td><?php echo $order->paid_amount;?></td>
                        </tr>
                        <tr>                         
                         <td colspan="5" style="text-align:right;font-weight:bold">Due</td>
                         <td><?php echo $order->due;?></td>
                        </tr>
                        

                        <tr>
                         <td colspan="5" style="text-align:right;font-weight:bold">Remark</td>
                         <td><?php echo $order->remark;?></td>
                        </tr>
                        <tr>
                         
                         
                        </tr>
                        <tr><td><b>SN</b></td><td><b>Measurement Name</b></td><td><b>Size</b></td><td><b>Uoms</b></td><td><b>Dresses</b></td></tr>
                  <tbody>                    
                      <?php
					     $order_details= TailorOrderMeasurement::all_by_order_id($order->id);
						 $i=1;
						//  $sub_total=0;
						 foreach($order_details as $line){
							

                           echo "<tr><th>".$i++."</th>
						   <td>{$line->measurement}</td>
						   <td>{$line->size}</td>
						   <td>{$line->uoms}</td>                     
						   <td>{$line->dresses}</td>						   
						   
						   <td></td>
               
               </tr>";
						 }
					  ?>
                    </tbody>
                        
                        
                        
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



