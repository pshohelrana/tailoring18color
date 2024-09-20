<?php
class TailorDressParameterApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["tailor_dress_parameters"=>TailorDressParameter::all()]);
	}

	function filter($data){
		$dress=TailorDresse::find($data["id"]);
		echo json_encode(["price"=>$dress->price,"parameters"=>TailorDressParameter::filter($data["id"])]);
	}

	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["tailor_dress_parameters"=>TailorDressParameter::pagination($page,$perpage),"total_records"=>TailorDressParameter::count()]);
	}
	function find($data){
		echo json_encode(["tailordressparameter"=>TailorDressParameter::find($data["id"])]);
	}
	function delete($data){
		TailorDressParameter::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$tailordressparameter=new TailorDressParameter();
		$tailordressparameter->name=$data["name"];
		$tailordressparameter->dress_id=$data["dress_id"];
		$tailordressparameter->default_size=$data["default_size"];

		$tailordressparameter->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$tailordressparameter=new TailorDressParameter();
		$tailordressparameter->id=$data["id"];
		$tailordressparameter->name=$data["name"];
		$tailordressparameter->dress_id=$data["dress_id"];
		$tailordressparameter->default_size=$data["default_size"];

		$tailordressparameter->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
