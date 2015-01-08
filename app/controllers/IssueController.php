<?php
class IssueController extends BaseController {
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    $issues = Issue::all();

    return View::make('issue.index', array('issues' => $issues));
  }

  public function create()
  {
    return View::make('issue.create');
  }

  public function store()
  {
    $issue = new Issue;
    $issue->title = '';
    $issue->save();

    return Redirect::route('issues.index');
  }

  public function show()
  {
    return View::make('issue.show');
  }

  public function edit()
  {
    return View::make('issue.edit');
  }

  public function update()
  {

  }

  public function destroy()
  {

  }
}
