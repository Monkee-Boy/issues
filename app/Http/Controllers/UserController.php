<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Input;
use Session;
use Redirect;
use App\User;
use App\Team;

class UserController extends Controller {
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
		$users = User::all();

		return view('users.index', array('users'=>$users));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$teams = Team::all();

		return view('users.create', array('teams' => $teams));
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
				'email' => 'required',
				'password' => 'required',
    ]);

		$user = new User;
    $user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
    $user->save();

		$user->teams()->sync(Input::get('teams'));

    Session::flash('message', Input::get('name').' was successfully created.');
    return Redirect::to('users');
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
		$user = User::where('id', $id)->with('teams')->first();

		if(!$user) {
			abort(404, 'User not found.');
    }

		$teams = Team::all();

		$user_team_ids = null;
		foreach($user->teams as $team) {
			$user_team_ids[] = $team->id;
		}

		return view('users.edit', array('user' => $user, 'teams' => $teams, 'user_team_ids' => $user_team_ids));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$this->validate($request, [
        'name' => 'required',
				'email' => 'required',
    ]);

		$user = User::find($id);
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->save();

		$user->teams()->sync(Input::get('teams'));

    Session::flash('message', Input::get('name').' was successfully updated.');
    return Redirect::to('users');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// TODO: Deleting users needs to be worked out but after privileges.
	}
}
