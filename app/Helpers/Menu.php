
<?php
	class Menu{
		
	public static function navbartopleft(){
		return [
		[
			'path' => 'player',
			'label' => "खेलाडीहरु", 
			'icon' => '<i class="material-icons ">directions_run</i>'
		],
		
		[
			'path' => 'playersport',
			'label' => "प्रतियोगिताहरु", 
			'icon' => '<i class="material-icons ">videogame_asset</i>'
		],
		
		[
			'path' => 'playerachievements',
			'label' => "उपलब्धिहरु", 
			'icon' => '<i class="material-icons ">filter_none</i>'
		],
		
		[
			'path' => 'sports',
			'label' => "खेलहरु", 
			'icon' => '<i class="material-icons ">games</i>'
		],
		
		[
			'path' => 'users',
			'label' => "प्रयोगकर्ताहरु", 
			'icon' => '<i class="material-icons ">group</i>'
		],
		
		[
			'path' => 'audits',
			'label' => "लगहरु", 
			'icon' => '<i class="material-icons ">folder_shared</i>'
		]
	] ;
	}
	
		
	public static function qualification(){
		return [
		[
			'value' => 'स्नातकोत्तर', 
			'label' => "स्नातकोत्तर", 
		],
		[
			'value' => 'स्नातक', 
			'label' => "स्नातक", 
		],
		[
			'value' => 'उच्च शिक्षा', 
			'label' => "उच्च शिक्षा", 
		],
		[
			'value' => 'माध्यमिक तह', 
			'label' => "माध्यमिक तह", 
		],
		[
			'value' => 'साधारण लेखपढ', 
			'label' => "साधारण लेखपढ", 
		],] ;
	}
	
	public static function isapproved(){
		return [
		[
			'value' => '0', 
			'label' => "नहेरिएको", 
		],
		[
			'value' => '1', 
			'label' => "स्वीकृत", 
		],
		[
			'value' => '2', 
			'label' => "विचाराधीन", 
		],
		[
			'value' => '3', 
			'label' => "अस्वीकृत", 
		],] ;
	}
	
	}
