<?php
	echo main_sidebar_dropdown([
		"name"=>"Money Receipt",
		"icon"=>"nav-icon fa fa-shopping-cart",
		"links"=>[
			// ["route"=>"mr","text"=>"Create Money Receipt","icon"=>"far fa-circle nav-icon"],
			// ["route"=>"manage-mr","text"=>"Manage Money Receipt","icon"=>"far fa-circle nav-icon"],
			["route"=>"tailor-mr","text"=>"Create tailor Money Receipt","icon"=>"far fa-circle nav-icon"],
			["route"=>"tailor-manage-mr","text"=>"tailor Manage Money Receipt","icon"=>"far fa-circle nav-icon"],
			// ["route"=>"tailor-mr-details","text"=>"Details tailor Money Receipt","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
