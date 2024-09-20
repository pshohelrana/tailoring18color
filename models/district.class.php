<?php
class District implements JsonSerializable{
	public $id;
	public $name;
	public $division_id;

	public function __construct(){
	}
	public function set($id,$name,$division_id){
		$this->id=$id;
		$this->name=$name;
		$this->division_id=$division_id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}district(name,division_id)values('$this->name','$this->division_id')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}district set name='$this->name',division_id='$this->division_id' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}district where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,division_id from {$tx}district");
		$data=[];
		while($district=$result->fetch_object()){
			$data[]=$district;
		}
			return $data;
	}

	public static function filter($criteria=""){
		global $db,$tx;
		$result=$db->query("select id,name,division_id from {$tx}district $criteria");
		$data=[];
		while($district=$result->fetch_object()){
			$data[]=$district;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,division_id from {$tx}district $criteria limit $top,$perpage");
		$data=[];
		while($district=$result->fetch_object()){
			$data[]=$district;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}district $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,division_id from {$tx}district where id='$id'");
		$district=$result->fetch_object();
			return $district;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}district");
		$district =$result->fetch_object();
		return $district->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Division Id:$this->division_id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbDistrict"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}district");
		while($district=$result->fetch_object()){
			$html.="<option value ='$district->id'>$district->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}district $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,division_id from {$tx}district $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-district\">New District</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Division Id</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Division Id</th></tr>";
		}
		while($district=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$district->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-district"]);
				$action_buttons.= action_button(["id"=>$district->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-district"]);
				$action_buttons.= action_button(["id"=>$district->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"district"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$district->id</td><td>$district->name</td><td>$district->division_id</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,division_id from {$tx}district where id={$id}");
		$district=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">District Details</th></tr>";
		$html.="<tr><th>Id</th><td>$district->id</td></tr>";
		$html.="<tr><th>Name</th><td>$district->name</td></tr>";
		$html.="<tr><th>Division Id</th><td>$district->division_id</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
