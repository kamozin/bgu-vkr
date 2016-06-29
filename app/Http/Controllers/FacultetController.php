<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Facultets;
use Carbon\Carbon;

class FacultetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        if(\Auth::user()->role==0){

            return redirect()->back();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //

        $facultets = Facultets::all();

        $nav=\App\Http\Controllers\NavigationController::index();
        $year=YearController::year();
        return view('facultets.show', ['facultets' => $facultets, 'nav'=>$nav, 'year'=>$year]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {

        $facultet = new Facultets();

        $facultet->name_fakultet = $request->name_fakultet;
        $str=$request->name_fakultet;
        $facultet->url_fakultet = TranslitController::str2url($str);
        //Дата создания факультета
        $dt = Carbon::today();
        $createdAt = Carbon::parse($dt);
        $dt_create = $createdAt->format('d.m.Y');
        $facultet->dt = $dt_create;


        if ($facultet->save()) {
            return redirect()->back()->with('message', 'Факультет успешно создан');
        } else {

            return redirect()->back()->withInput()->with('message', 'Возникла ошибка попробуйте еще раз');

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
        return view('facultets.store', ['nav'=>$nav, 'year'=>$year]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
            $facultet=Facultets::find($id);

        return $facultet;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Request $request)
    {
        //
        $id=$request->id;

        $facultet=$this->show($id);
        $nav=\App\Http\Controllers\NavigationController::index();
        $year=YearController::year();
        return view('facultets.edit', ['facultet'=>$facultet, 'nav'=>$nav, 'year'=>$year]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request)
    {
        //

        $facultet = Facultets::find($request->id);

        $facultet->name_fakultet = $request->name_fakultet;
        $str=$request->name_fakultet;
        $facultet->url_fakultet = TranslitController::str2url($str);
        //Дата создания факультета
        $dt = Carbon::today();
        $createdAt = Carbon::parse($dt);
        $dt_create = $createdAt->format('d.m.Y');
        $facultet->dt = $dt_create;


        if ($facultet->save()) {
            return redirect('/facultets');
        } else {

            return redirect()->back()->withInput()->with('message', 'Возникла ошибка попробуйте еще раз');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
