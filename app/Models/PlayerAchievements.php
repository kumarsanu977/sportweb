<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PlayerAchievements extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'player_achievements';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'prizeid';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'playerid','sportid','date','medal','certificate','uid'
	];
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				player_achievements.Medal LIKE ?  OR 
				player_achievements.Certificate LIKE ?  OR 
				player_achievements.PrizeID LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);

	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"player_achievements.PlayerID AS playerid",

			"player.playernamenepali AS player_playernamenepali",

			"player_achievements.sportid AS sportid",

			"sports.sportsname AS sports_sportsname",

			"player_achievements.Date AS date",

			"player_achievements.Medal AS medal",

			"player_achievements.Certificate AS certificate",

			"player_achievements.PrizeID AS prizeid",

			"player_achievements.uid AS uid" 
		];
	}

	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"player_achievements.PlayerID AS playerid",

			"player.playernamenepali AS player_playernamenepali",

			"player_achievements.sportid AS sportid",

			"sports.sportsname AS sports_sportsname",

			"player_achievements.Date AS date",

			"player_achievements.Medal AS medal",

			"player_achievements.Certificate AS certificate",

			"player_achievements.PrizeID AS prizeid",

			"player_achievements.uid AS uid" 
		];
	}

	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
		];
	}

	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"PlayerID AS playerid",

			"sportid",

			"Date AS date",

			"Medal AS medal",

			"Certificate AS certificate",

			"PrizeID AS prizeid" 
		];
	}
}
