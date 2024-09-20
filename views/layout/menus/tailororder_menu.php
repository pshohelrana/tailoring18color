<?php
	echo main_sidebar_dropdown([
		"name"=>"TailorOrder",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			
			["route"=>"tailor-order","text"=>"Create Tailor Order","icon"=>"far fa-circle nav-icon"],
			
			["route"=>"tailor_orders","text"=>"Manage TailorOrder","icon"=>"far fa-circle nav-icon"],
			["route"=>"tailor_order_details","text"=>"Manage TailorOrderDetail","icon"=>"far fa-circle nav-icon"],
			["route"=>"tailor_order_measurements","text"=>"Manage TailorOrderMeasurement","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
