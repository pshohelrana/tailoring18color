<?php
class DistrictApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["district"=>District::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["district"=>District::pagination($page,$perpage),"total_records"=>District::count()]);
	}
	function find($data){
		echo json_encode(["district"=>District::find($data["id"])]);
	}
	function delete($data){
		District::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$district=new District();
		$district->name=$data["name"];
		$district->division_id=$data["division_id"];

		$district->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$district=new District();
		$district->id=$data["id"];
		$district->name=$data["name"];
		$district->division_id=$data["division_id"];

		$district->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
