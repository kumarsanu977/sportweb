<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PlayerSport extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'player_sport';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'playersportid';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'playerid','sportsid','date','location','uid'
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
				player_sport.Location LIKE ?  OR 
				player_sport.PlayerSportID LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%"
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
			"player_sport.PlayerID AS playerid",

			"player.playernamenepali AS player_playernamenepali",

			"player_sport.SportsID AS sportsid",

			"sports.sportsname AS sports_sportsname",

			"player_sport.Date AS date",

			"player_sport.Location AS location",

			"player_sport.PlayerSportID AS playersportid",

			"player_sport.uid AS uid" 
		];
	}

	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"player_sport.PlayerID AS playerid",

			"player.playernamenepali AS player_playernamenepali",

			"player_sport.SportsID AS sportsid",

			"sports.sportsname AS sports_sportsname",

			"player_sport.Date AS date",

			"player_sport.Location AS location",

			"player_sport.PlayerSportID AS playersportid",

			"player_sport.uid AS uid" 
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

			"SportsID AS sportsid",

			"Date AS date",

			"Location AS location",

			"PlayerSportID AS playersportid" 
		];
	}
}
