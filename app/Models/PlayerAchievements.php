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
				PrizeID LIKE ?  OR 
				Medal LIKE ?  OR 
				Certificate LIKE ? 
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
			"PrizeID AS prizeid",

			"PlayerID AS playerid",

			"sportid",

			"Date AS date",

			"Medal AS medal",

			"Certificate AS certificate",

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
			"PrizeID AS prizeid",

			"PlayerID AS playerid",

			"sportid",

			"Date AS date",

			"Medal AS medal",

			"Certificate AS certificate",

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
			"PrizeID AS prizeid",

			"PlayerID AS playerid",

			"sportid",

			"Date AS date",

			"Medal AS medal",

			"Certificate AS certificate",

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
			"PrizeID AS prizeid",

			"PlayerID AS playerid",

			"sportid",

			"Date AS date",

			"Medal AS medal",

			"Certificate AS certificate",

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
			"PrizeID AS prizeid",

			"PlayerID AS playerid",

			"sportid",

			"Date AS date",

			"Medal AS medal",

			"Certificate AS certificate" 
		];
	}
}
