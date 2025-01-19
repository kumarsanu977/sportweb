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
				player.PlayerID LIKE ?  OR 
				player.PlayerNameNepali LIKE ?  OR 
				player.PlayerNameEnglish LIKE ?  OR 
				player.PermanentAddress LIKE ?  OR 
				player.TemporaryAddress LIKE ?  OR 
				player.CitizenshipNo LIKE ?  OR 
				player.Qualification LIKE ?  OR 
				player.SchoolName LIKE ?  OR 
				player.PlayerContact LIKE ?  OR 
				player.FathersName LIKE ?  OR 
				player.MothersName LIKE ?  OR 
				player.ParentsContact LIKE ?  OR 
				player.CoachName LIKE ?  OR 
				player.CoachContact LIKE ? 
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
			"player.PlayerID AS playerid",

			"player.SportsID AS sportsid",

			"sports.sportsname AS sports_sportsname",

			"player.PlayerNameNepali AS playernamenepali",

			"player.PlayerNameEnglish AS playernameenglish",

			"player.PermanentAddress AS permanentaddress",

			"player.TemporaryAddress AS temporaryaddress",

			"player.DOB AS dob",

			"player.CitizenshipNo AS citizenshipno",

			"player.Qualification AS qualification",

			"player.Weight AS weight",

			"player.Height AS height",

			"player.SchoolName AS schoolname",

			"player.PlayerContact AS playercontact",

			"player.FathersName AS fathersname",

			"player.MothersName AS mothersname",

			"player.ParentsContact AS parentscontact",

			"player.CoachName AS coachname",

			"player.CoachContact AS coachcontact",

			"player.Signature AS signature",

			"player.Photo AS photo",

			"player.IsApproved AS isapproved",

			"player.uid AS uid" 
		];
	}

	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"player.PlayerID AS playerid",

			"player.SportsID AS sportsid",

			"sports.sportsname AS sports_sportsname",

			"player.PlayerNameNepali AS playernamenepali",

			"player.PlayerNameEnglish AS playernameenglish",

			"player.PermanentAddress AS permanentaddress",

			"player.TemporaryAddress AS temporaryaddress",

			"player.DOB AS dob",

			"player.CitizenshipNo AS citizenshipno",

			"player.Qualification AS qualification",

			"player.Weight AS weight",

			"player.Height AS height",

			"player.SchoolName AS schoolname",

			"player.PlayerContact AS playercontact",

			"player.FathersName AS fathersname",

			"player.MothersName AS mothersname",

			"player.ParentsContact AS parentscontact",

			"player.CoachName AS coachname",

			"player.CoachContact AS coachcontact",

			"player.Signature AS signature",

			"player.Photo AS photo",

			"player.IsApproved AS isapproved",

			"player.uid AS uid" 
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

			"date_updated",

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

			"date_updated",

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

			"PlayerID AS playerid" 
		];
	}
}
