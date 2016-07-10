<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Facultets;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {

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
		//

		$users=User::all();

		$nav=\App\Http\Controllers\NavigationController::index();
		$year=YearController::year();
		return view('user.show', ['users'=>$users, 'nav'=>$nav, 'year'=>$year]);


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{

		$user=new User();

		$user->name=$request->name;
		$user->email=$request->email;
		$user->password=bcrypt($request->password);
		$user->facultet_id=$request->facultet_id;
		$user->role=$request->role;

		if($user->save()){

			return redirect()->back()->with('message', 'Пользователь '.$request->name.' успешно создан');


		}else{

			return redirect()->back()->withInput()->with('message', 'При создании пользователя возникла ошибка');

		}

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$nav=\App\Http\Controllers\NavigationController::index();
		$year=YearController::year();
		$facultet=Facultets::all();
		return view ('user.store', ['nav'=>$nav, 'year'=>$year, 'facultet'=>$facultet]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user=User::find($id);

		return $user;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request)
	{
		$id=$request->id;

		$user=$this->show($id);

		$nav=NavigationController::index();
		$year=YearController::year();
		$facultet=Facultets::all();
		return view ('user.edit', ['user'=>$user, 'nav'=>$nav, 'year'=>$year, 'facultet'=>$facultet]);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{

		$id=$request->id;


		$password=$request->password;

//		dd($password);

		if(empty($password)){
			$user=User::find($id);

			$user->name=$request->name;
			$user->email=$request->email;
			$user->facultet_id=$request->facultet_id;
			$user->role=$request->role;
//			dd($request->all());
			if($user->save()){

				return redirect('/users');

			}else{

				return redirect()->back()->with('message', 'Возникла ошибка при обновлении данных');

			}

		}else{

			$user=User::find($id);
			$user->name=$request->name;
			$user->email=$request->email;
			$user->facultet_id=$request->facultet_id;
			$user->password=bcrypt($request->password);


			$user->role=$request->role;

				dd($user);
			if($user->save()){

				return redirect('/users');

			}else{

				return redirect()->back()->with('message', 'Возникла ошибка при обновлении данных');

			}
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete(Request $request)
	{

		$id=$request->id;

		$user=User::find($id);

		$user->delete();

		return redirect()->back();
	}

}
