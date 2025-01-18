<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Sports extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'sports';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'sportsid';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'sportsname'
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
				SportsID LIKE ?  OR 
				SportsName LIKE ? 
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
			"SportsID AS sportsid",

			"SportsName AS sportsname" 
		];
	}

	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"SportsID AS sportsid",

			"SportsName AS sportsname" 
		];
	}

	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"SportsID AS sportsid",

			"SportsName AS sportsname" 
		];
	}

	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"SportsID AS sportsid",

			"SportsName AS sportsname" 
		];
	}

	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"SportsID AS sportsid",

			"SportsName AS sportsname" 
		];
	}
}
