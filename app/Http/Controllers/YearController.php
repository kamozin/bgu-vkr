<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vkr;
use Illuminate\Http\Request;

use App\Year;

class YearController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//

		$nav=NavigationController::index();
		$year=Year::all();
		return view('year.show', ['nav'=>$nav, 'year'=>$year]);
	}

	static function year()
	{
		//
		$year=Year::orderBy('year', 'desc')->get();

		return $year;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		//

		$year=new Year();

		$year->year=$request->year;

		if($year->save()){

			return redirect()->back()->with('message', 'Год '.$year->year.' успешно создан.');

		}else{

			return redirect()->back()->with('error', 'Ошибка попробуйте снова.');

		}


	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$nav=NavigationController::index();
		$year=$this->year();

		return view('year.store', ['nav'=>$nav, 'year'=>$year]);

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
		$years=Year::find($id);

		$yearss=$years->year;

		$vkr=Vkr::where('dt', '=', $yearss)->get();

		if(empty($vkr->items)){
			$nav=NavigationController::index();
			$year=$this->year();
			return view('year.edit', ['years'=>$years, 'nav'=>$nav, 'year'=>$year]);
		}else{


			return redirect()->back()->with('error', 'По году '.$yearss.' в базе данных ВКР существуют записи. Редактирование запрещенно.');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$year=Year::find($request->id);

		$year->year=$request->year;

		$year->save();

		return redirect('/year');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$years=Year::find($id);

		$yearss=$years->year;

		$vkr=Vkr::where('dt', '=', $yearss)->get();

		if(count($vkr)==0){


			$years->delete();
			return redirect()->back();
		}else if(count($vkr)>0){

			return redirect()->back()->with('error', 'По году '.$yearss.' в базе данных ВКР существуют записи. Удаление запрещенно.');
		}
	}

}
