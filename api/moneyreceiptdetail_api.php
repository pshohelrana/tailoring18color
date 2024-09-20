<?php
class MoneyReceiptDetailApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["money_receipt_details"=>MoneyReceiptDetail::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["money_receipt_details"=>MoneyReceiptDetail::pagination($page,$perpage),"total_records"=>MoneyReceiptDetail::count()]);
	}
	function find($data){
		echo json_encode(["moneyreceiptdetail"=>MoneyReceiptDetail::find($data["id"])]);
	}
	function delete($data){
		MoneyReceiptDetail::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$moneyreceiptdetail=new MoneyReceiptDetail();
		$moneyreceiptdetail->money_receipt_id=$data["money_receipt_id"];
		$moneyreceiptdetail->product_id=$data["product_id"];
		$moneyreceiptdetail->price=$data["price"];
		$moneyreceiptdetail->qty=$data["qty"];

		$moneyreceiptdetail->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$moneyreceiptdetail=new MoneyReceiptDetail();
		$moneyreceiptdetail->id=$data["id"];
		$moneyreceiptdetail->money_receipt_id=$data["money_receipt_id"];
		$moneyreceiptdetail->product_id=$data["product_id"];
		$moneyreceiptdetail->price=$data["price"];
		$moneyreceiptdetail->qty=$data["qty"];

		$moneyreceiptdetail->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
