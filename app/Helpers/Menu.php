
<?php
	class Menu{
		
	public static function navbartopleft(){
		return [
		[
			'path' => 'player',
			'label' => "Player", 
			'icon' => '<i class="material-icons ">directions_run</i>'
		],
		
		[
			'path' => 'playersport',
			'label' => "Played Sports", 
			'icon' => '<i class="material-icons ">videogame_asset</i>'
		],
		
		[
			'path' => 'playerachievements',
			'label' => "Achievments", 
			'icon' => '<i class="material-icons ">filter_none</i>'
		],
		
		[
			'path' => 'sports',
			'label' => "Sports", 
			'icon' => '<i class="material-icons ">games</i>'
		],
		
		[
			'path' => 'users',
			'label' => "Users", 
			'icon' => '<i class="material-icons ">group</i>'
		],
		
		[
			'path' => 'audits',
			'label' => "Logs", 
			'icon' => '<i class="material-icons ">folder_shared</i>'
		]
	] ;
	}
	
		
	public static function qualification(){
		return [
		[
			'value' => 'Master', 
			'label' => "Master", 
		],
		[
			'value' => 'Bachelor', 
			'label' => "Bachelor", 
		],
		[
			'value' => 'Intermediate', 
			'label' => "Intermediate", 
		],
		[
			'value' => 'SLC', 
			'label' => "Slc", 
		],
		[
			'value' => 'General Education', 
			'label' => "General Education", 
		],] ;
	}
	
	public static function isapproved(){
		return [
		[
			'value' => '0', 
			'label' => "Not Checked", 
		],
		[
			'value' => '1', 
			'label' => "Approved", 
		],
		[
			'value' => '2', 
			'label' => "Pending", 
		],
		[
			'value' => '3', 
			'label' => "Not Approved", 
		],] ;
	}
	
	}
