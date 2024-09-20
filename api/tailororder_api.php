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
	
		$c=$data["customerInfo"];

		$tailororder->customer_name=$c["customer_name"];
		$tailororder->paid_amount=$c["paid_amount"];
	    $tailororder->delivery_datetime=$c["delivery_datetime"];
	    $tailororder->order_datetime=$c["order_datetime"];
		$tailororder->order_total=$c["order_total"];
		$tailororder->shipping_address=$c["shipping_address"];
		$tailororder->remark=$c["remark"];
		$tailororder->mobile=$c["mobile"];
		$tailororder->discount=$c["discount"];
		$tailororder->due=$c["due"];

		$order_id=$tailororder->save();


		$order_details=new TailorOrderDetail();
		$i=$data["itemInfo"];

		$order_details->dress_id=$i["dress_id"];
		$order_details->price=$i["price"];
		$order_details->qty=$i["qty"];
		$order_details->discount=$i["discount"];
		$order_details->order_id=$order_id;

        $order_details->save();

		$ms=$data["measurementInfo"];

		foreach($ms as $m){

            $md=new TailorOrderMeasurement();
			$md->order_id=$order_id;
			$md->measurement_id=$m["measure_id"];
			$md->size=$m["size"];
			$md->uom_id=$m["uom_id"];
			$md->dress_id=$i["dress_id"];
			$md->save();
			
		}


		echo json_encode(["success" => $data["customerInfo"]["customer_name"]]);
	}

	function update($data,$file=[]){
		$tailororder=new TailorOrder();
		$tailororder->id=$data["id"];
		$tailororder->customer_name=$data["customer_name"];
		$tailororder->paid_amount=$data["paid_amount"];
		$tailororder->delivery_datetime=$data["delivery_datetime"];
		$tailororder->order_datetime=$data["order_datetime"];
		$tailororder->order_total=$data["order_total"];
		$tailororder->shipping_address=$data["shipping_address"];
		$tailororder->remark=$data["remark"];
		$tailororder->mobile=$data["mobile"];
		$tailororder->discount=$data["discount"];
		$tailororder->due=$data["due"];

		$tailororder->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
