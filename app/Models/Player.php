<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Player extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'player';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'playerid';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'sportsid','playernamenepali','playernameenglish','permanentaddress','temporaryaddress','dob','citizenshipno','qualification','weight','height','schoolname','playercontact','fathersname','mothersname','parentscontact','coachname','coachcontact','signature','photo','isapproved','uid'
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
				PlayerID LIKE ?  OR 
				PlayerNameNepali LIKE ?  OR 
				PlayerNameEnglish LIKE ?  OR 
				PermanentAddress LIKE ?  OR 
				TemporaryAddress LIKE ?  OR 
				CitizenshipNo LIKE ?  OR 
				Qualification LIKE ?  OR 
				SchoolName LIKE ?  OR 
				PlayerContact LIKE ?  OR 
				FathersName LIKE ?  OR 
				MothersName LIKE ?  OR 
				ParentsContact LIKE ?  OR 
				CoachName LIKE ?  OR 
				CoachContact LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"PlayerID AS playerid",

			"SportsID AS sportsid",

			"PlayerNameNepali AS playernamenepali",

			"PlayerNameEnglish AS playernameenglish",

			"PermanentAddress AS permanentaddress",

			"TemporaryAddress AS temporaryaddress",

			"DOB AS dob",

			"CitizenshipNo AS citizenshipno",

			"Qualification AS qualification",

			"Weight AS weight",

			"Height AS height",

			"SchoolName AS schoolname",

			"PlayerContact AS playercontact",

			"FathersName AS fathersname",

			"MothersName AS mothersname",

			"ParentsContact AS parentscontact",

			"CoachName AS coachname",

			"CoachContact AS coachcontact",

			"Signature AS signature",

			"Photo AS photo",

			"IsApproved AS isapproved",

			"uid",

			"date_created",

			"date_updated" 
		];
	}

	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"PlayerID AS playerid",

			"SportsID AS sportsid",

			"PlayerNameNepali AS playernamenepali",

			"PlayerNameEnglish AS playernameenglish",

			"PermanentAddress AS permanentaddress",

			"TemporaryAddress AS temporaryaddress",

			"DOB AS dob",

			"CitizenshipNo AS citizenshipno",

			"Qualification AS qualification",

			"Weight AS weight",

			"Height AS height",

			"SchoolName AS schoolname",

			"PlayerContact AS playercontact",

			"FathersName AS fathersname",

			"MothersName AS mothersname",

			"ParentsContact AS parentscontact",

			"CoachName AS coachname",

			"CoachContact AS coachcontact",

			"Signature AS signature",

			"Photo AS photo",

			"IsApproved AS isapproved",

			"uid",

			"date_created",

			"date_updated" 
		];
	}

	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"PlayerID AS playerid",

			"SportsID AS sportsid",

			"PlayerNameNepali AS playernamenepali",

			"PlayerNameEnglish AS playernameenglish",

			"PermanentAddress AS permanentaddress",

			"TemporaryAddress AS temporaryaddress",

			"DOB AS dob",

			"CitizenshipNo AS citizenshipno",

			"Qualification AS qualification",

			"Weight AS weight",

			"Height AS height",

			"SchoolName AS schoolname",

			"PlayerContact AS playercontact",

			"FathersName AS fathersname",

			"MothersName AS mothersname",

			"ParentsContact AS parentscontact",

			"CoachName AS coachname",

			"CoachContact AS coachcontact",

			"Signature AS signature",

			"Photo AS photo",

			"IsApproved AS isapproved",

			"uid",

			"date_created",

			"date_updated" 
		];
	}

	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"PlayerID AS playerid",

			"SportsID AS sportsid",

			"PlayerNameNepali AS playernamenepali",

			"PlayerNameEnglish AS playernameenglish",

			"PermanentAddress AS permanentaddress",

			"TemporaryAddress AS temporaryaddress",

			"DOB AS dob",

			"CitizenshipNo AS citizenshipno",

			"Qualification AS qualification",

			"Weight AS weight",

			"Height AS height",

			"SchoolName AS schoolname",

			"PlayerContact AS playercontact",

			"FathersName AS fathersname",

			"MothersName AS mothersname",

			"ParentsContact AS parentscontact",

			"CoachName AS coachname",

			"CoachContact AS coachcontact",

			"Signature AS signature",

			"Photo AS photo",

			"IsApproved AS isapproved",

			"uid",

			"date_created",

			"date_updated" 
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

			"PlayerNameNepali AS playernamenepali",

			"PlayerNameEnglish AS playernameenglish",

			"PermanentAddress AS permanentaddress",

			"TemporaryAddress AS temporaryaddress",

			"DOB AS dob",

			"CitizenshipNo AS citizenshipno",

			"Qualification AS qualification",

			"Weight AS weight",

			"Height AS height",

			"SchoolName AS schoolname",

			"PlayerContact AS playercontact",

			"FathersName AS fathersname",

			"MothersName AS mothersname",

			"ParentsContact AS parentscontact",

			"CoachName AS coachname",

			"CoachContact AS coachcontact",

			"Signature AS signature",

			"Photo AS photo",

			"IsApproved AS isapproved" 
		];
	}
}
