<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Http\Request;
use Auth;
use Input;
use Session;
use Redirect;
use App\User;
use App\Project;

class ProjectController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $projects = Auth::user()->projects;

		return view('projects.index', array('projects'=>$projects));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreProjectRequest $request)
	{
    $project = new Project;
    $project->title = Input::get('title');
		$project->url = Input::get('url');
		$project->designed_by = Input::get('designed_by');
		$project->developed_by = Input::get('developed_by');
    $project->save();
    $project->users()->attach(Auth::user()->id);

    Session::flash('message', Input::get('title').' was successfully created. You are ready to initiate QA.');
    return Redirect::to('projects');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// There is no show for Projects, lets redirect to the issues instead.
		// TODO: Add redirect to issues.
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = Project::find($id);

		return view('projects.edit', array('project' => $project));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, StoreProjectRequest $request)
	{
		$project = Project::find($id);
		$project->title = Input::get('title');
		$project->url = Input::get('url');
		$project->designed_by = Input::get('designed_by');
		$project->developed_by = Input::get('developed_by');
		$project->save();

    Session::flash('message', Input::get('title').' was successfully updated. Go forth and QA for as long as the sun is up.');
    return Redirect::to('projects');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$project = Project::find($id);
		$project_title = $project->title;
		$project->delete(); // softDelete is on so we are technically just archiving

		Session::flash('message', $project_title.' was successfully archived. Congrats on another amazing round of QA.');
    return Redirect::to('projects');
	}

}
