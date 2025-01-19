<?php 
namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components data Model
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Model
 */
class ComponentsData{
	

	/**
     * role_id_option_list Model Action
     * @return array
     */
	function role_id_option_list(){
		$sqltext = "SELECT role_id as value, role_name as label FROM roles";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}

	

	/**
     * sportsid_option_list Model Action
     * @return array
     */
	function sportsid_option_list(){
		$sqltext = "SELECT SportsID as value, sportsname as label FROM sports";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}

	

	/**
     * playerid_option_list Model Action
     * @return array
     */
	function playerid_option_list(){
		$sqltext = "SELECT PlayerID as value, playernamenepali as label FROM player WHERE uid=:userid" ;
		$query_params = [];
$query_params['userid'] = auth()->user()->uid;
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}

	

	/**
     * sportid_option_list Model Action
     * @return array
     */
	function sportid_option_list(){
		$sqltext = "SELECT  DISTINCT sportsid AS value,sportsname AS label FROM sports";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}

	

	/**
     * playersport_playerid_option_list Model Action
     * @return array
     */
	function playersport_playerid_option_list(){
		$sqltext = "SELECT PlayerID as value, playernamenepali as label FROM player WHERE uid=:userid" ;
		$query_params = [];
		$query_params['userid'] = auth()->user()->uid;
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}

	

	/**
     * Check if value already exist in Users table
	 * @param string $value
     * @return bool
     */
	function users_name_value_exist(Request $request){
		$value = trim($request->value);
		$exist = DB::table('users')->where('name', $value)->value('name');   
		if($exist){
			return true;
		}
		return false;
	}

	

	/**
     * Check if value already exist in Users table
	 * @param string $value
     * @return bool
     */
	function users_email_value_exist(Request $request){
		$value = trim($request->value);
		$exist = DB::table('users')->where('email', $value)->value('email');   
		if($exist){
			return true;
		}
		return false;
	}
}
