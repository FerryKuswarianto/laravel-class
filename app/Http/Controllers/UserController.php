<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use App\Group;
use \Input;
use \Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller {

	use ValidatesRequests;

	protected $rules = [
		'name' => 'required|min:10',
		'email' => 'email|required',
		'password' => 'required|min:8'
	];

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::get();

		return view('user.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = new User;
		$groups = Group::get()->lists('name', 'id');
		$userGroups = [];
		return view('user.create', compact('user', 'groups', 'userGroups'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, $this->rules);

		$user = User::create(Input::all());
		return redirect()->route('user.show', $user->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);
		$groups = Group::get()->lists('name', 'id');

		$userGroups = $user->groups->lists('id');
		return view('user.show', compact('user', 'groups', 'userGroups'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		$groups = Group::get()->lists('name', 'id');

		$userGroups = $user->groups->lists('id');

		return view('user.edit', compact('user', 'groups', 'userGroups'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, $this->rules);

		$user = User::findOrFail($id);
		$user->update(Input::all());

		$groups = Input::get('groups') ?: [];
		$user->groups()->sync($groups);

		return redirect()->route('user.show', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$user = User::findOrFail($id);
		$user->delete();

		return redirect()->route('user.index');
	}

	public function login(Request $request)
	{
		if ($request->isMethod('get')) {
			return view('user.login');
		} else {
			$user = User::where('email', Input::get('email'))
				->where('password', Input::get('password'))
				->first();
			if ($user != null) {
				Auth::loginUsingId($user->id);
	            return redirect()->route('user.index');
	        } else {
	        	return redirect()->back();
	        }
		}
	}

}
