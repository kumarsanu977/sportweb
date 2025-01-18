<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerAchievementsAddRequest;
use App\Http\Requests\PlayerAchievementsEditRequest;
use App\Models\PlayerAchievements;
use Illuminate\Http\Request;
use Exception;
class PlayerAchievementsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.playerachievements.list";

		$query = PlayerAchievements::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			PlayerAchievements::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "player_achievements.prizeid";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$allowedRoles = auth()->user()->hasRole(["admin"]);
		if(!$allowedRoles){
			//check if user is the owner of the record.
			$query->where("player_achievements.uid", auth()->user()->uid);
		}
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, PlayerAchievements::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = PlayerAchievements::query();
		$allowedRoles = auth()->user()->hasRole(["admin"]);
		if(!$allowedRoles){
			//check if user is the owner of the record.
			$query->where("player_achievements.uid", auth()->user()->uid);
		}
		$record = $query->findOrFail($rec_id, PlayerAchievements::viewFields());
		return $this->renderView("pages.playerachievements.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.playerachievements.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(PlayerAchievementsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['uid'] = auth()->user()->uid;
		
		//save PlayerAchievements record
		$record = PlayerAchievements::create($modeldata);
		$rec_id = $record->prizeid;
		return $this->redirect("playerachievements", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(PlayerAchievementsEditRequest $request, $rec_id = null){
		$query = PlayerAchievements::query();
		$allowedRoles = auth()->user()->hasRole(["admin"]);
		if(!$allowedRoles){
			//check if user is the owner of the record.
			$query->where("player_achievements.uid", auth()->user()->uid);
		}
		$record = $query->findOrFail($rec_id, PlayerAchievements::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("playerachievements", "Record updated successfully");
		}
		return $this->renderView("pages.playerachievements.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = PlayerAchievements::query();
		$allowedRoles = auth()->user()->hasRole(["admin"]);
		if(!$allowedRoles){
			//check if user is the owner of the record.
			$query->where("player_achievements.uid", auth()->user()->uid);
		}
		$query->whereIn("prizeid", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
