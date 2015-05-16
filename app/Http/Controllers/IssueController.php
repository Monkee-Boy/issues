<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreIssueRequest;
use Auth;
use Input;
use Session;
use Redirect;
use App\User;
use App\Project;
use App\Issue;
use App\Status;
use App\Priority;
use App\Team;

class IssueController extends Controller {
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
	public function index($project_id)
	{
		$project = Project::where('id', $project_id)->with('issues', 'issues.status', 'issues.priority', 'issues.createdby', 'issues.assignedto')->first();

		if(!$project) {
			abort(404, 'Project not found.');
    }

		foreach($project->issues as &$issue) {
			$this->prepare_issue($issue);
		}

		return view('issues.index', array('project' => $project));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($project_id)
	{
		$project = Project::where('id', $project_id)->first();

		if(!$project) {
			abort(404, 'Project not found.');
    }

		$statuses = Status::select('id', 'name')->get();
		$priorities = Priority::select('id', 'name')->get();
		$users = User::select('id', 'name')->get();
		$teams = Team::select('id', 'name')->get();

		return view('issues.create', array('project' => $project, 'statuses' => $statuses, 'priorities' => $priorities, 'users' => $users, 'teams' => $teams));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreIssueRequest $request)
	{
		$assignedto = explode('-', Input::get('assignedto')); // assignedto is TEAM-USER_ID

		$issue = new Issue;
		$issue->project_id = Input::get('project_id');
		$issue->title = Input::get('title');
		$issue->content = Input::get('content');
		$issue->link = Input::get('link');
		$issue->status_id = 1;
		$issue->priority_id = Input::get('priority_id');
		$issue->assignedto_id = $assignedto[1];
		$issue->assignedto_type = $assignedto[0];
		$issue->createdby_id = Input::get('createdby_id');
    $issue->save();

    Session::flash('message', Input::get('title').' was successfully created.');
    return Redirect::route('project_issues', [Input::get('project_id')]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Clean up the resource and prepare it for View.
	 *
	 * @param  Object  $issue
	 * @return Object
	 */
	private function prepare_issue($issue) {
		if($issue->assignedto_type === 'team') {
			$issue->assignedto = Team::select('id', 'name')->where('id', $issue->assignedto_id)->first();
		} elseif($issue->assignedto_type === 'user') {
			$issue->assignedto = User::select('id', 'name')->where('id', $issue->assignedto_id)->first();
		}

		return $issue;
	}

}
