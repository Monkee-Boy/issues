<?php
class IssueController extends BaseController {
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    $issues = Issue::with('labels', 'status', 'priority', 'user')->get();

    $this->layout->content = View::make('issue.index', array('issues' => $issues));
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function show($id)
  {
    $issue = Issue::find($id);

    $this->layout->content = View::make('issue.show')->with('issue', $issue);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return Response
  */
  public function create()
  {
    $priorities = Priority::all()->lists('name','id');

    $this->layout->content = View::make('issue.create', array('priorities' => $priorities));
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
      return Redirect::to('issues/create')->withErrors($validator)->withInput(Input::all());
    } else {
      $issue = new Issue;
      $issue->title = Input::get('title');
      $issue->content = Input::get('content');
      $issue->link = Input::get('link');
      $issue->status_id = 1;
      $issue->priority_id = Input::get('priority_id');
      $issue->created_by = 1; /* Hardcoded for dev. */

      $issue->save();

      Session::flash('message', 'Successfully created nerd!');
      return Redirect::to('issues');
    }
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function edit($id)
  {
    $issue = Issue::find($id);
    $priorities = Priority::all()->lists('name','id');
    $statuses = Status::all()->lists('name','id');

    $this->layout->content = View::make('issue.edit', array('issue' => $issue, 'priorities' => $priorities, 'statuses' => $statuses));
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
      return Redirect::to('issue.edit', $id)->withErrors($validator)->withInput(Input::all());
    } else {
      $issue = Issue::find($id);
      $issue->title = Input::get('title');
      $issue->content = Input::get('content');
      $issue->link = Input::get('link');
      $issue->status_id = Input::get('status_id');
      $issue->priority_id = Input::get('priority_id');
      $issue->save();

      Session::flash('message', 'Successfully updated issue!');
      return Redirect::to('issues');
    }
  }

  public function destroy()
  {

  }
}
