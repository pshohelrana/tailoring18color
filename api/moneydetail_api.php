<?php
class MoneyDetailApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["money_details"=>MoneyDetail::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["money_details"=>MoneyDetail::pagination($page,$perpage),"total_records"=>MoneyDetail::count()]);
	}
	function find($data){
		echo json_encode(["moneydetail"=>MoneyDetail::find($data["id"])]);
	}
	function delete($data){
		MoneyDetail::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$moneydetail=new MoneyDetail();
		$moneydetail->dress_id=$data["dress_id"];
		$moneydetail->price=$data["price"];
		$moneydetail->qty=$data["qty"];
		$moneydetail->discount=$data["discount"];
		$moneydetail->order_id=$data["order_id"];

		$moneydetail->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$moneydetail=new MoneyDetail();
		$moneydetail->id=$data["id"];
		$moneydetail->dress_id=$data["dress_id"];
		$moneydetail->price=$data["price"];
		$moneydetail->qty=$data["qty"];
		$moneydetail->discount=$data["discount"];
		$moneydetail->order_id=$data["order_id"];

		$moneydetail->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
