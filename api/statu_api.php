<?php
class StatuApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["status"=>Statu::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["status"=>Statu::pagination($page,$perpage),"total_records"=>Statu::count()]);
	}
	function find($data){
		echo json_encode(["statu"=>Statu::find($data["id"])]);
	}
	function delete($data){
		Statu::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$statu=new Statu();
		$statu->name=$data["name"];

		$statu->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$statu=new Statu();
		$statu->id=$data["id"];
		$statu->name=$data["name"];

		$statu->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
