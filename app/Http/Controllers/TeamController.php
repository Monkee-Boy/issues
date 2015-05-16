<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Input;
use Session;
use Redirect;
use App\User;
use App\Team;

class TeamController extends Controller {
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
		$teams = Team::all();

		return view('teams.index', array('teams'=>$teams));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('teams.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
        'name' => 'required',
    ]);

		$team = new Team;
    $team->name = Input::get('name');
		$team->color = Input::get('color');
    $team->save();

    Session::flash('message', Input::get('name').' was successfully created.');
    return Redirect::to('teams');
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
		$team = Team::find($id);

		if(!$team) {
			abort(404, 'Team not found.');
    }

		return view('teams.edit', array('team' => $team));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$team = Team::find($id);
		$team->name = Input::get('name');
		$team->color = Input::get('color');
		$team->save();

    Session::flash('message', Input::get('name').' was successfully updated.');
    return Redirect::to('teams');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$team = Team::find($id);
		$team_name = $team->name;
		$team->delete();

		Session::flash('message', $team_name.' was successfully deleted.');
    return Redirect::to('teams');
	}

}
