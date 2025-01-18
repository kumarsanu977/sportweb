<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



	Route::get('', 'IndexController@index')->name('index')->middleware(['redirect.to.home']);
	Route::get('index/login', 'IndexController@login')->name('login');
	
	Route::post('auth/login', 'AuthController@login')->name('auth.login');
	Route::any('auth/logout', 'AuthController@logout')->name('logout')->middleware(['auth']);

	Route::get('auth/accountcreated', 'AuthController@accountcreated')->name('accountcreated');
	Route::get('auth/accountpending', 'AuthController@accountpending')->name('accountpending');
	Route::get('auth/accountblocked', 'AuthController@accountblocked')->name('accountblocked');
	Route::get('auth/accountinactive', 'AuthController@accountinactive')->name('accountinactive');


	
	Route::get('index/register', 'AuthController@register')->name('auth.register')->middleware(['redirect.to.home']);
	Route::post('index/register', 'AuthController@register_store')->name('auth.register_store');
		
	Route::post('auth/login', 'AuthController@login')->name('auth.login');
	Route::get('auth/password/forgotpassword', 'AuthController@showForgotPassword')->name('password.forgotpassword');
	Route::post('auth/password/sendemail', 'AuthController@sendPasswordResetLink')->name('password.email');
	Route::get('auth/password/reset', 'AuthController@showResetPassword')->name('password.reset.token');
	Route::post('auth/password/resetpassword', 'AuthController@resetPassword')->name('password.resetpassword');
	Route::get('auth/password/resetcompleted', 'AuthController@passwordResetCompleted')->name('password.resetcompleted');
	Route::get('auth/password/linksent', 'AuthController@passwordResetLinkSent')->name('password.resetlinksent');
	

/**
 * All routes which requires auth
 */
Route::middleware(['auth', 'rbac'])->group(function () {
		
	Route::get('home', 'HomeController@index')->name('home');

	

/* routes for Audits Controller */
	Route::get('audits', 'AuditsController@index')->name('audits.index');
	Route::get('audits/index/{filter?}/{filtervalue?}', 'AuditsController@index')->name('audits.index');	
	Route::get('audits/view/{rec_id}', 'AuditsController@view')->name('audits.view');	
	Route::get('audits/add', 'AuditsController@add')->name('audits.add');
	Route::post('audits/add', 'AuditsController@store')->name('audits.store');
		
	Route::any('audits/edit/{rec_id}', 'AuditsController@edit')->name('audits.edit');	
	Route::get('audits/delete/{rec_id}', 'AuditsController@delete');

/* routes for Permissions Controller */
	Route::get('permissions', 'PermissionsController@index')->name('permissions.index');
	Route::get('permissions/index/{filter?}/{filtervalue?}', 'PermissionsController@index')->name('permissions.index');	
	Route::get('permissions/view/{rec_id}', 'PermissionsController@view')->name('permissions.view');	
	Route::get('permissions/add', 'PermissionsController@add')->name('permissions.add');
	Route::post('permissions/add', 'PermissionsController@store')->name('permissions.store');
		
	Route::any('permissions/edit/{rec_id}', 'PermissionsController@edit')->name('permissions.edit');	
	Route::get('permissions/delete/{rec_id}', 'PermissionsController@delete');

/* routes for Player Controller */
	Route::get('player', 'PlayerController@index')->name('player.index');
	Route::get('player/index/{filter?}/{filtervalue?}', 'PlayerController@index')->name('player.index');	
	Route::get('player/view/{rec_id}', 'PlayerController@view')->name('player.view');
	Route::get('player/masterdetail/{rec_id}', 'PlayerController@masterDetail')->name('player.masterdetail')->withoutMiddleware(['rbac']);	
	Route::get('player/add', 'PlayerController@add')->name('player.add');
	Route::post('player/add', 'PlayerController@store')->name('player.store');
		
	Route::any('player/edit/{rec_id}', 'PlayerController@edit')->name('player.edit');	
	Route::get('player/delete/{rec_id}', 'PlayerController@delete');

/* routes for PlayerAchievements Controller */
	Route::get('playerachievements', 'PlayerAchievementsController@index')->name('playerachievements.index');
	Route::get('playerachievements/index/{filter?}/{filtervalue?}', 'PlayerAchievementsController@index')->name('playerachievements.index');	
	Route::get('playerachievements/view/{rec_id}', 'PlayerAchievementsController@view')->name('playerachievements.view');	
	Route::get('playerachievements/add', 'PlayerAchievementsController@add')->name('playerachievements.add');
	Route::post('playerachievements/add', 'PlayerAchievementsController@store')->name('playerachievements.store');
		
	Route::any('playerachievements/edit/{rec_id}', 'PlayerAchievementsController@edit')->name('playerachievements.edit');	
	Route::get('playerachievements/delete/{rec_id}', 'PlayerAchievementsController@delete');

/* routes for PlayerSport Controller */
	Route::get('playersport', 'PlayerSportController@index')->name('playersport.index');
	Route::get('playersport/index/{filter?}/{filtervalue?}', 'PlayerSportController@index')->name('playersport.index');	
	Route::get('playersport/view/{rec_id}', 'PlayerSportController@view')->name('playersport.view');	
	Route::get('playersport/add', 'PlayerSportController@add')->name('playersport.add');
	Route::post('playersport/add', 'PlayerSportController@store')->name('playersport.store');
		
	Route::any('playersport/edit/{rec_id}', 'PlayerSportController@edit')->name('playersport.edit');	
	Route::get('playersport/delete/{rec_id}', 'PlayerSportController@delete');

/* routes for Roles Controller */
	Route::get('roles', 'RolesController@index')->name('roles.index');
	Route::get('roles/index/{filter?}/{filtervalue?}', 'RolesController@index')->name('roles.index');	
	Route::get('roles/view/{rec_id}', 'RolesController@view')->name('roles.view');
	Route::get('roles/masterdetail/{rec_id}', 'RolesController@masterDetail')->name('roles.masterdetail')->withoutMiddleware(['rbac']);	
	Route::get('roles/add', 'RolesController@add')->name('roles.add');
	Route::post('roles/add', 'RolesController@store')->name('roles.store');
		
	Route::any('roles/edit/{rec_id}', 'RolesController@edit')->name('roles.edit');	
	Route::get('roles/delete/{rec_id}', 'RolesController@delete');

/* routes for Sports Controller */
	Route::get('sports', 'SportsController@index')->name('sports.index');
	Route::get('sports/index/{filter?}/{filtervalue?}', 'SportsController@index')->name('sports.index');	
	Route::get('sports/view/{rec_id}', 'SportsController@view')->name('sports.view');
	Route::get('sports/masterdetail/{rec_id}', 'SportsController@masterDetail')->name('sports.masterdetail')->withoutMiddleware(['rbac']);	
	Route::get('sports/add', 'SportsController@add')->name('sports.add');
	Route::post('sports/add', 'SportsController@store')->name('sports.store');
		
	Route::any('sports/edit/{rec_id}', 'SportsController@edit')->name('sports.edit');	
	Route::get('sports/delete/{rec_id}', 'SportsController@delete');

/* routes for Users Controller */
	Route::get('users', 'UsersController@index')->name('users.index');
	Route::get('users/index/{filter?}/{filtervalue?}', 'UsersController@index')->name('users.index');	
	Route::get('users/view/{rec_id}', 'UsersController@view')->name('users.view');	
	Route::any('account/edit', 'AccountController@edit')->name('account.edit');	
	Route::get('account', 'AccountController@index');	
	Route::post('account/changepassword', 'AccountController@changepassword')->name('account.changepassword');	
	Route::get('users/add', 'UsersController@add')->name('users.add');
	Route::post('users/add', 'UsersController@store')->name('users.store');
		
	Route::any('users/edit/{rec_id}', 'UsersController@edit')->name('users.edit');	
	Route::get('users/delete/{rec_id}', 'UsersController@delete');
});


	
Route::get('componentsdata/role_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->role_id_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/sportsid_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->sportsid_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/playerid_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->playerid_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/users_name_value_exist',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->users_name_value_exist($request);
	}
);
	
Route::get('componentsdata/users_email_value_exist',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->users_email_value_exist($request);
	}
);


Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');


/**
 * All static content routes
 */
Route::get('info/about',  function(){
		return view("pages.info.about");
	}
);
Route::get('info/faq',  function(){
		return view("pages.info.faq");
	}
);

Route::get('info/contact',  function(){
	return view("pages.info.contact");
}
);
Route::get('info/contactsent',  function(){
	return view("pages.info.contactsent");
}
);

Route::post('info/contact',  function(Request $request){
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		]);

		$senderName = $request->name;
		$senderEmail = $request->email;
		$message = $request->message;

		$receiverEmail = config("mail.from.address");

		Mail::send(
			'pages.info.contactemail', [
				'name' => $senderName,
				'email' => $senderEmail,
				'comment' => $message
			],
			function ($mail) use ($senderEmail, $receiverEmail) {
				$mail->from($senderEmail);
				$mail->to($receiverEmail)
					->subject('Contact Form');
			}
		);
		return redirect("info/contactsent");
	}
);


Route::get('info/features',  function(){
		return view("pages.info.features");
	}
);
Route::get('info/privacypolicy',  function(){
		return view("pages.info.privacypolicy");
	}
);
Route::get('info/termsandconditions',  function(){
		return view("pages.info.termsandconditions");
	}
);

Route::get('info/changelocale/{locale}', function ($locale) {
	app()->setlocale($locale);
	session()->put('locale', $locale);
    return redirect()->back();
})->name('info.changelocale');