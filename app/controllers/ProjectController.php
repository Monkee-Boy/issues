<?php
class ProjectController extends BaseController {
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    $user = User::find(Auth::user()->id);
    $projects = $user->projects;

    $this->layout->content = View::make('projects.index', array('projects' => $projects));
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function show($id)
  {

  }

  /**
  * Show the form for creating a new resource.
  *
  * @return Response
  */
  public function create()
  {
    $this->layout->content = View::make('projects.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
    $rules = array(
      'title' => 'required'
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()) {
      return Redirect::to('project.create')->withErrors($validator)->withInput(Input::all());
    } else {
      $project = new Project;
      $project->title = Input::get('title');
      $project->created_by = Auth::user()->id;
      $project->save();
      $project->users()->attach(Auth::user()->id);

      Session::flash('message', 'Successfully created project!');
      return Redirect::to('projects');
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
    $project = Project::find($id);

    $this->layout->content = View::make('projects.edit', array('project' => $project));
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
      'title' => 'required'
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()) {
      return Redirect::to('project.edit', $id)->withErrors($validator)->withInput(Input::all());
    } else {
      $project = Project::find($id);
      $project->title = Input::get('title');
      $project->save();

      Session::flash('message', 'Successfully updated project!');
      return Redirect::to('projects');
    }
  }

  public function destroy()
  {

  }
}
