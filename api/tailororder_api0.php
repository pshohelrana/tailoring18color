<?php
class TailorOrderApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["tailor_orders"=>TailorOrder::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["tailor_orders"=>TailorOrder::pagination($page,$perpage),"total_records"=>TailorOrder::count()]);
	}
	function find($data){
		echo json_encode(["tailororder"=>TailorOrder::find($data["id"])]);
	}
	function delete($data){
		TailorOrder::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}

	function save($data,$file=[]){

		$tailororder=new TailorOrder();		
		$tailororder->customer_name=$data["customerInfo"]["customer_name"];
		$tailororder->paid_amount=$data["customerInfo"]["paid_amount"];
	    $tailororder->delivery_datetime=$data["customerInfo"]["delivery_datetime"];
		$tailororder->order_total=$data["customerInfo"]["order_total"];
		$tailororder->shipping_address=$data["customerInfo"]["shipping_address"];
		$tailororder->remark=$data["customerInfo"]["remark"];
		$tailororder->mobile=$data["customerInfo"]["mobile"];

		$order_id=$tailororder->save();


		$order_details=new TailorOrderDetail();
		$order_details->dress_id=$data["itemInfo"]["dress_id"];
		$order_details->price=$data["itemInfo"]["price"];
		$order_details->qty=$data["itemInfo"]["qty"];
		$order_details->discount=$data["itemInfo"]["discount"];
		$order_details->order_id=$order_id;

        $order_details->save();






		echo json_encode(["success" => $data["customerInfo"]["customer_name"]]);
	}



	function update($data,$file=[]){
		$tailororder=new TailorOrder();
		$tailororder->id=$data["id"];
		$tailororder->customer_name=$data["customer_name"];
		$tailororder->paid_amount=$data["paid_amount"];
		$tailororder->delivery_datetime=$data["delivery_datetime"];
		$tailororder->order_total=$data["order_total"];
		$tailororder->shipping_address=$data["shipping_address"];
		$tailororder->remark=$data["remark"];
		$tailororder->mobile=$data["mobile"];

		$tailororder->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
