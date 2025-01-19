<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerSportAddRequest;
use App\Http\Requests\PlayerSportEditRequest;
use App\Models\PlayerSport;
use Illuminate\Http\Request;
use Exception;
class PlayerSportController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.playersport.list";

		$query = PlayerSport::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			PlayerSport::search($query, $search); // search table records
		}
		$query->join("player", "player_sport.playerid", "=", "player.PlayerID");
		$query->join("sports", "player_sport.sportsid", "=", "sports.SportsID");
		$orderby = $request->orderby ?? "player_sport.playersportid";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$allowedRoles = auth()->user()->hasRole(["admin"]);
		if(!$allowedRoles){
			//check if user is the owner of the record.
			$query->where("player_sport.uid", auth()->user()->uid);
		}
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, PlayerSport::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.playersport.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(PlayerSportAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['uid'] = auth()->user()->uid;
		
		//save PlayerSport record
		$record = PlayerSport::create($modeldata);
		$rec_id = $record->playersportid;
		return $this->redirect("playersport", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(PlayerSportEditRequest $request, $rec_id = null){
		$query = PlayerSport::query();
		$allowedRoles = auth()->user()->hasRole(["admin"]);
		if(!$allowedRoles){
			//check if user is the owner of the record.
			$query->where("player_sport.uid", auth()->user()->uid);
		}
		$record = $query->findOrFail($rec_id, PlayerSport::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("playersport", "Record updated successfully");
		}
		return $this->renderView("pages.playersport.edit", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = PlayerSport::query();
		$allowedRoles = auth()->user()->hasRole(["admin"]);
		if(!$allowedRoles){
			//check if user is the owner of the record.
			$query->where("player_sport.uid", auth()->user()->uid);
		}
		$query->whereIn("playersportid", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
