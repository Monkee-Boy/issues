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

Route::get('/', 'DashboardController@index');
Route::resource('users', 'UserController', array('except' => array('show')));
Route::resource('teams', 'TeamController', array('except' => array('show')));
Route::resource('projects', 'ProjectController');

/* TODO: Use project slugs for pretty urls. */
Route::resource('issues', 'IssueController', array('only' => array('store', 'update', 'destroy')));
Route::get('projects/{project_id}/issues', array('as' => 'project_issues', 'uses' => 'IssueController@index'));
Route::get('projects/{project_id}/issues/create', array('as' => 'project_issues_create', 'uses' => 'IssueController@create'));
Route::get('projects/{project_id}/issues/{issue_id}', array('as' => 'project_issues_show', 'uses' => 'IssueController@show'));
Route::get('projects/{project_id}/issues/{issue_id}/edit', array('as' => 'project_issues_edit', 'uses' => 'IssueController@edit'));


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
