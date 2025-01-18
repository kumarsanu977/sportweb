<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerAddRequest;
use App\Http\Requests\PlayerEditRequest;
use App\Models\Player;
use Illuminate\Http\Request;
use Exception;
class PlayerController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.player.list";

		$query = Player::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Player::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "player.playerid";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$allowedRoles = auth()->user()->hasRole(["admin"]);
		if(!$allowedRoles){
			//check if user is the owner of the record.
			$query->where("player.uid", auth()->user()->uid);
		}
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Player::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Player::query();
		$allowedRoles = auth()->user()->hasRole(["admin"]);
		if(!$allowedRoles){
			//check if user is the owner of the record.
			$query->where("player.uid", auth()->user()->uid);
		}
		$record = $query->findOrFail($rec_id, Player::viewFields());
		return $this->renderView("pages.player.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.player.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.player.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(PlayerAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("signature", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['signature'], "signature");
			$modeldata['signature'] = $fileInfo['filepath'];
		}

		
		if( array_key_exists("photo", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['photo'], "photo");
			$modeldata['photo'] = $fileInfo['filepath'];
		}
		$modeldata['uid'] = auth()->user()->uid;
		
		//save Player record
		$record = Player::create($modeldata);
		$rec_id = $record->playerid;
		return $this->redirect("player", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(PlayerEditRequest $request, $rec_id = null){
		$query = Player::query();
		$allowedRoles = auth()->user()->hasRole(["admin"]);
		if(!$allowedRoles){
			//check if user is the owner of the record.
			$query->where("player.uid", auth()->user()->uid);
		}
		$record = $query->findOrFail($rec_id, Player::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("signature", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['signature'], "signature");
			$modeldata['signature'] = $fileInfo['filepath'];
		}

		
		if( array_key_exists("photo", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['photo'], "photo");
			$modeldata['photo'] = $fileInfo['filepath'];
		}
			$record->update($modeldata);
			return $this->redirect("player", "Record updated successfully");
		}
		return $this->renderView("pages.player.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Player::query();
		$allowedRoles = auth()->user()->hasRole(["admin"]);
		if(!$allowedRoles){
			//check if user is the owner of the record.
			$query->where("player.uid", auth()->user()->uid);
		}
		$query->whereIn("playerid", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
