<?php
class IssueController extends BaseController {
  private $project_id = 1; /* Hardcoded for dev. */
  private $user_id = 1; /* Hardcoded for dev. */

  /**
  * Display a listing of the resource.
  *
  * @param  int  $project_id
  * @return Response
  */
  public function index($project_id)
  {
    $project = Project::find($project_id);

    if(empty($project)) {
      App::abort(404, 'Project not found.');
    }

    $issues = Issue::where('project_id', $project_id)->with('labels', 'status', 'priority', 'project', 'createdby')->get();

    $this->layout->content = View::make('issues.index', array('issues' => $issues, 'project' => $project));
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function show($project_id, $issue_id)
  {
    $project = Project::find($project_id);
    $issue = Issue::find($issue_id);

    $this->layout->content = View::make('issues.show', array('project' => $project, 'issue' => $issue));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @param  int  $project_id
  * @return Response
  */
  public function create($project_id)
  {
    $project = Project::find($project_id);

    if(empty($project)) {
      App::abort(404, 'Project not found.');
    }

    $priorities = Priority::all()->lists('name','id');

    $this->layout->content = View::make('issues.create', array('priorities' => $priorities, 'project' => $project));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
    $rules = array(
      'title' => 'required',
      'content' => 'required',
      'link' => 'url'
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()) {
      return Redirect::route('project_issues_create', $this->project_id)->withErrors($validator)->withInput(Input::all());
    } else {
      $issue = new Issue;
      $issue->title = Input::get('title');
      $issue->content = Input::get('content');
      $issue->link = Input::get('link');
      $issue->status_id = 1;
      $issue->priority_id = Input::get('priority_id');
      $issue->project_id = $this->project_id;
      $issue->created_by = $this->user_id;

      $issue->save();

      Session::flash('message', 'Successfully created issue!');
      return Redirect::route('project_issues', $this->project_id);
    }
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function edit($project_id, $issue_id)
  {
    $project = Project::find($project_id);
    $issue = Issue::find($issue_id);
    $priorities = Priority::all()->lists('name','id');
    $statuses = Status::all()->lists('name','id');

    $this->layout->content = View::make('issues.edit', array('project' => $project, 'issue' => $issue, 'priorities' => $priorities, 'statuses' => $statuses));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function update($id)
  {
    $rules = array(
      'title' => 'required',
      'content' => 'required',
      'link' => 'url'
    );

    $validator = Validator::make(Input::all(), $rules);


    if ($validator->fails()) {
      return Redirect::route('project_issues_edit', array('project_id' => $this->project_id, 'issue_id' => $id))->withErrors($validator)->withInput(Input::all());
    } else {
      $issue = Issue::find($id);
      $issue->title = Input::get('title');
      $issue->content = Input::get('content');
      $issue->link = Input::get('link');
      $issue->status_id = Input::get('status_id');
      $issue->priority_id = Input::get('priority_id');
      $issue->save();

      Session::flash('message', 'Successfully updated issue!');
      return Redirect::route('project_issues', $this->project_id);
    }
  }

  /**
  * Remove the specified resource in storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
    $issue = Issue::find($id);
    $issue->delete();

    Session::flash('message', 'Successfully deleted the issue!');
    return Redirect::route('project_issues', $this->project_id);
  }
}
