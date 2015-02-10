<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::any("/", [
	"as"   => "user/login",
	"uses" => "UserController@login"
]);

Route::group(["before" => "auth"], function() {

	//Route::get('/', 'HomeController@showWelcome');
	Route::resource('issues', 'IssueController', array('only' => array('store', 'update', 'destroy')));

	Route::resource('projects', 'ProjectController');
	Route::get('projects/{project_id}/issues', array('as' => 'project_issues', 'uses' => 'IssueController@index'));
	Route::get('projects/{project_id}/issues/create', array('as' => 'project_issues_create', 'uses' => 'IssueController@create'));
	Route::get('projects/{project_id}/issues/{issue_id}', array('as' => 'project_issues_show', 'uses' => 'IssueController@show'));
	Route::get('projects/{project_id}/issues/{issue_id}/edit', array('as' => 'project_issues_edit', 'uses' => 'IssueController@edit'));

	Route::any("/logout", [
		"as"   => "user/logout",
		"uses" => "UserController@logout"
	]);

});

Route::any("/request", [
	"as"   => "user/request",
	"uses" => "UserController@request"
]);

Route::any("/reset/{token}", [
	"as"   => "user/reset",
	"uses" => "UserController@reset"
]);
