<?php
class MoneyOrder implements JsonSerializable{
	public $id;
	public $customer_name;
	public $paid_amount;
	public $receipt_date;
	public $order_total;
	public $shipping_address;
	public $remark;
	public $mobile;
	public $discount;
	public $due;

	public function __construct(){
	}
	public function set($id,$customer_name,$paid_amount,$receipt_date,$order_total,$shipping_address,$remark,$mobile,$discount,$due){
		$this->id=$id;
		$this->customer_name=$customer_name;
		$this->paid_amount=$paid_amount;
		$this->receipt_date=$receipt_date;
		$this->order_total=$order_total;
		$this->shipping_address=$shipping_address;
		$this->remark=$remark;
		$this->mobile=$mobile;
		$this->discount=$discount;
		$this->due=$due;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}money_orders(customer_name,paid_amount,receipt_date,order_total,shipping_address,remark,mobile,discount,due)values('$this->customer_name','$this->paid_amount','$this->receipt_date','$this->order_total','$this->shipping_address','$this->remark','$this->mobile','$this->discount','$this->due')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}money_orders set customer_name='$this->customer_name',paid_amount='$this->paid_amount',receipt_date='$this->receipt_date',order_total='$this->order_total',shipping_address='$this->shipping_address',remark='$this->remark',mobile='$this->mobile',discount='$this->discount',due='$this->due' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}money_orders where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,customer_name,paid_amount,receipt_date,order_total,shipping_address,remark,mobile,discount,due from {$tx}money_orders");
		$data=[];
		while($moneyorder=$result->fetch_object()){
			$data[]=$moneyorder;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,customer_name,paid_amount,receipt_date,order_total,shipping_address,remark,mobile,discount,due from {$tx}money_orders $criteria limit $top,$perpage");
		$data=[];
		while($moneyorder=$result->fetch_object()){
			$data[]=$moneyorder;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}money_orders $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,customer_name,paid_amount,receipt_date,order_total,shipping_address,remark,mobile,discount,due from {$tx}money_orders where id='$id'");
		$moneyorder=$result->fetch_object();
			return $moneyorder;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}money_orders");
		$moneyorder =$result->fetch_object();
		return $moneyorder->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Customer Name:$this->customer_name<br> 
		Paid Amount:$this->paid_amount<br> 
		Receipt Date:$this->receipt_date<br> 
		Order Total:$this->order_total<br> 
		Shipping Address:$this->shipping_address<br> 
		Remark:$this->remark<br> 
		Mobile:$this->mobile<br> 
		Discount:$this->discount<br> 
		Due:$this->due<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbMoneyOrder"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}money_orders");
		while($moneyorder=$result->fetch_object()){
			$html.="<option value ='$moneyorder->id'>$moneyorder->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}money_orders $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,customer_name,paid_amount,receipt_date,order_total,shipping_address,remark,mobile,discount,due from {$tx}money_orders $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-moneyorder\">New MoneyOrder</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Customer Name</th><th>Paid Amount</th><th>Receipt Date</th><th>Order Total</th><th>Shipping Address</th><th>Remark</th><th>Mobile</th><th>Discount</th><th>Due</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Customer Name</th><th>Paid Amount</th><th>Receipt Date</th><th>Order Total</th><th>Shipping Address</th><th>Remark</th><th>Mobile</th><th>Discount</th><th>Due</th></tr>";
		}
		while($moneyorder=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$moneyorder->id, "name"=>"Details", "value"=>"Details", "class"=>"dark", "url"=>"details-moneyorder"]);
				$action_buttons.= action_button(["id"=>$moneyorder->id, "name"=>"Edit", "value"=>"Edit", "class"=>"dark", "url"=>"edit-moneyorder"]);
				$action_buttons.= action_button(["id"=>$moneyorder->id, "name"=>"Delete", "value"=>"Delete", "class"=>"dark", "url"=>"money_orders"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$moneyorder->id</td><td>$moneyorder->customer_name</td><td>$moneyorder->paid_amount</td><td>$moneyorder->receipt_date</td><td>$moneyorder->order_total</td><td>$moneyorder->shipping_address</td><td>$moneyorder->remark</td><td>$moneyorder->mobile</td><td>$moneyorder->discount</td><td>$moneyorder->due</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,customer_name,paid_amount,receipt_date,order_total,shipping_address,remark,mobile,discount,due from {$tx}money_orders where id={$id}");
		$moneyorder=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">MoneyOrder Details</th></tr>";
		$html.="<tr><th>Id</th><td>$moneyorder->id</td></tr>";
		$html.="<tr><th>Customer Name</th><td>$moneyorder->customer_name</td></tr>";
		$html.="<tr><th>Paid Amount</th><td>$moneyorder->paid_amount</td></tr>";
		$html.="<tr><th>Receipt Date</th><td>$moneyorder->receipt_date</td></tr>";
		$html.="<tr><th>Order Total</th><td>$moneyorder->order_total</td></tr>";
		$html.="<tr><th>Shipping Address</th><td>$moneyorder->shipping_address</td></tr>";
		$html.="<tr><th>Remark</th><td>$moneyorder->remark</td></tr>";
		$html.="<tr><th>Mobile</th><td>$moneyorder->mobile</td></tr>";
		$html.="<tr><th>Discount</th><td>$moneyorder->discount</td></tr>";
		$html.="<tr><th>Due</th><td>$moneyorder->due</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
