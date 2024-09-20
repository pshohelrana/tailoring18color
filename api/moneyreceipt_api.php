<?php
class MoneyReceiptApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["money_receipts"=>MoneyReceipt::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["money_receipts"=>MoneyReceipt::pagination($page,$perpage),"total_records"=>MoneyReceipt::count()]);
	}
	function find($data){
		echo json_encode(["moneyreceipt"=>MoneyReceipt::find($data["id"])]);
	}
	function delete($data){
		MoneyReceipt::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
   
	static function save($data){ 	   

		$now=date("Y-m-d H:i:s");
		$moneyreceipt=new MoneyReceipt();

		$moneyreceipt->created_at=$now;
		$moneyreceipt->updated_at=$now;
		$moneyreceipt->customer_id=$data["customer_id"];
		$moneyreceipt->remark=isset($data["remark"])?$data["remark"]:"NA";
		$moneyreceipt->receipt_total=$data["receipt_total"];

	    $mr_id=$moneyreceipt->save();		
		
		$products=$data["products"];
	  
		foreach($products as $product){
			
			$moneyreceiptdetail=new MoneyReceiptDetail();

			$moneyreceiptdetail->money_receipt_id=$mr_id;
			$moneyreceiptdetail->product_id=$product["product_id"];
			$moneyreceiptdetail->price=$product["price"];
			$moneyreceiptdetail->qty=$product["qty"];	
			$moneyreceiptdetail->save();			
		  
		 
		}
	
	   
		echo json_encode(["id"=>$mr_id,"status" => "success"]);
	  
	  
	
	  }//end function


	
	  function save2($data,$file=[]){
		$moneyreceipt=new MoneyReceipt();
		$moneyreceipt->created_at=$data["created_at"];
		$moneyreceipt->updated_at=$data["updated_at"];
		$moneyreceipt->customer_id=$data["customer_id"];
		$moneyreceipt->remark=$data["remark"];
		$moneyreceipt->receipt_total=$data["receipt_total"];

		$moneyreceipt->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$moneyreceipt=new MoneyReceipt();
		$moneyreceipt->id=$data["id"];
		$moneyreceipt->created_at=$data["created_at"];
		$moneyreceipt->updated_at=$data["updated_at"];
		$moneyreceipt->customer_id=$data["customer_id"];
		$moneyreceipt->remark=$data["remark"];
		$moneyreceipt->receipt_total=$data["receipt_total"];

		$moneyreceipt->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
