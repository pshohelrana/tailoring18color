<?php
class MoneyOrderApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["money_orders"=>MoneyOrder::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["money_orders"=>MoneyOrder::pagination($page,$perpage),"total_records"=>MoneyOrder::count()]);
	}
	function find($data){
		echo json_encode(["moneyorder"=>MoneyOrder::find($data["id"])]);
	}
	function delete($data){
		MoneyOrder::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	// customer_name:customer_name,
    //             mobile:mobile,
    //             shipping_address:shipping_address,
    //             receipt_date:receipt_date,
                
    //             paid_amount:paid_amount,
    //             order_total:order_total,
    //             remark:remark,
    //             discount:discount,
    //             due:due

	function save($data,$file=[]){

		$tailororder=new MoneyOrder();	
	
		$c=$data["customerInfo"];

		$tailororder->customer_name=$c["customer_name"];
		$tailororder->paid_amount=$c["paid_amount"];
	    $tailororder->receipt_date=$c["receipt_date"];
	    
		$tailororder->order_total=$c["order_total"];
		$tailororder->shipping_address=$c["shipping_address"];
		$tailororder->remark=$c["remark"];
		$tailororder->mobile=$c["mobile"];
		$tailororder->discount=$c["discount"];
		$tailororder->due=$c["due"];

		$order_id=$tailororder->save();


		$order_details=new MoneyDetail();
		$i=$data["itemInfo"];

		$order_details->dress_id=$i["dress_id"];
		$order_details->price=$i["price"];
		$order_details->qty=$i["qty"];
		$order_details->discount=$i["discount"];
		$order_details->order_id=$order_id;

        $order_details->save();
		echo json_encode(["success" => $data["customerInfo"]["customer_name"]]);
	}


	function update($data,$file=[]){
		$moneyorder=new MoneyOrder();
		$moneyorder->id=$data["id"];
		$moneyorder->customer_name=$data["customer_name"];
		$moneyorder->paid_amount=$data["paid_amount"];
		$moneyorder->receipt_date=$data["receipt_date"];
		$moneyorder->order_total=$data["order_total"];
		$moneyorder->shipping_address=$data["shipping_address"];
		$moneyorder->remark=$data["remark"];
		$moneyorder->mobile=$data["mobile"];
		$moneyorder->discount=$data["discount"];
		$moneyorder->due=$data["due"];

		$moneyorder->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
