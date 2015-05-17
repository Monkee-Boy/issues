<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use League\CommonMark\CommonMarkConverter;

use Illuminate\Http\Request;
use App\Http\Requests\StoreIssueRequest;
use DB;
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
use Carbon\Carbon;

class IssueController extends Controller {
	protected $markdown;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(CommonMarkConverter $markdown)
	{
		$this->middleware('auth');
		$this->markdown = $markdown;
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
	 * @param  int  $issue_id
	 * @return Response
	 */
	public function show($project_id, $issue_id)
	{
		$issue = Issue::where('id', $issue_id)->with('project', 'status', 'priority', 'createdby')->first();

		if(!$issue) {
			abort(404, 'Issue not found.');
    }

		$this->prepare_issue($issue);

		return view('issues.show', array('issue' => $issue));
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
		/* Need to convert any markdown in the content to HTML. */
		$issue->content = $this->markdown->convertToHtml($issue->content);

		/* Add some human readable dates. */
		$issue->created_at_formatted = Carbon::parse($issue->created_at)->diffForHumans();
		$issue->updated_at_formatted = Carbon::parse($issue->updated_at)->diffForHumans();

		/* Figure out who exactly the issue is assigned to. */
		if($issue->assignedto_type === 'team') {
			$issue->assignedto = Team::select('id', 'name')->where('id', $issue->assignedto_id)->first();
		} elseif($issue->assignedto_type === 'user') {
			$issue->assignedto = User::select('id', 'name')->where('id', $issue->assignedto_id)->first();
		}

		/* Get all activity for this issue and prepare each item. */
		$issue_activity = DB::table('issue_activity')->where('issue_id', $issue->id)->get();

		foreach($issue_activity as &$activity) {
			$this->prepare_issue_activity($activity);
		}

		$issue->activity = $issue_activity;

		return $issue;
	}

	/**
	 * Clean up the resource and prepare it for View.
	 *
	 * @param  Object  $activity
	 * @return Object
	 */
	private function prepare_issue_activity($activity) {
		/* Get the user that triggered this activity. */
		$activity->user = User::select('id', 'name')->where('id', $activity->user_id)->first();

		/* Add some human readable dates. */
		$activity->created_at_formatted = Carbon::parse($activity->created_at)->diffForHumans();
		$activity->updated_at_formatted = Carbon::parse($activity->updated_at)->diffForHumans();

		/* Based on the type lets figure out how to handle the data. */
		if($activity->type === 'comment') {
			/* Need to convert any markdown in the content to HTML. */
			$activity->data = $this->markdown->convertToHtml($activity->data);
		} elseif($activity->type === 'assignment') {
			$assignment = json_decode($activity->data);

			/* Figure out who exactly the issue is assigned to. */
			if($assignment->assignedto_type === 'team') {
				$activity->assignment = Team::select('id', 'name')->where('id', $assignment->assignedto_id)->first();
			} elseif($assignment->assignedto_type === 'user') {
				$activity->assignment = User::select('id', 'name')->where('id', $assignment->assignedto_id)->first();
			}
		} elseif($activity->type === 'status') {
			$activity->status = Status::select('id', 'name')->where('id', $activity->data)->first();
		} elseif($activity->type === 'priority') {
			$activity->priority = Priority::select('id', 'name')->where('id', $activity->data)->first();
		} elseif($activity->type === 'commit') {
			/* TODO: Add ability to pull git commits from GitHub & Beanstalk and attach to an issue. */
		} elseif($activity->type === 'mention') {
			/* TODO: Add ability to mention an issue from within another issue. */
		}

		return $activity;
	}

}
