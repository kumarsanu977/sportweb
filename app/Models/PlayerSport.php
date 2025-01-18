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
				PlayerSportID LIKE ?  OR 
				Location LIKE ? 
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
			"PlayerSportID AS playersportid",

			"PlayerID AS playerid",

			"SportsID AS sportsid",

			"Date AS date",

			"Location AS location",

			"uid" 
		];
	}

	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"PlayerSportID AS playersportid",

			"PlayerID AS playerid",

			"SportsID AS sportsid",

			"Date AS date",

			"Location AS location",

			"uid" 
		];
	}

	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"PlayerSportID AS playersportid",

			"PlayerID AS playerid",

			"SportsID AS sportsid",

			"Date AS date",

			"Location AS location",

			"uid" 
		];
	}

	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"PlayerSportID AS playersportid",

			"PlayerID AS playerid",

			"SportsID AS sportsid",

			"Date AS date",

			"Location AS location",

			"uid" 
		];
	}

	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"PlayerSportID AS playersportid",

			"PlayerID AS playerid",

			"SportsID AS sportsid",

			"Date AS date",

			"Location AS location" 
		];
	}
}
