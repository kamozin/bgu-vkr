<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vkr;
use App\Year;
use Illuminate\Http\Request;

use App\Models\Facultets;
use phpDocumentor\Reflection\Types\Self_;
use Storage;
use Input;
use File;
use Validator;
use Carbon\Carbon;


class VkrController extends Controller
{

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $v = Validator::make(Input::all(), [
            'file' => 'mimes:doc,pdf,rtf,docx',

        ]);

        if ($v->fails()) {
            return redirect()->back()->with('error', 'Формат файла не поддерживается')->withInput();
        }

        $vkr = new Vkr();

        $vkr->name = trim(Input::get('name'));
        $vkr->family = trim(Input::get('family'));
        $vkr->otchestvo = trim(Input::get('otchestvo'));
        $vkr->id_fakultet = trim(Input::get('id_fakultet'));
        $vkr->napravlenie_podgotovki = trim(Input::get('napravlenie_podgotovki'));
        $vkr->profile = trim(Input::get('profile'));
        $vkr->tema = trim(Input::get('tema'));
        $vkr->dt = trim(Input::get('year'));

        $facultet = Facultets::find($vkr->id_fakultet);

        $dir = $facultet['original']['url_fakultet'];

        $file = Input::file('file');

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

//        if (preg_match("/[а-я]+/i", $filename)) {
//
//            $filename = \Slug::make($filename) . '-' . time() . '.' . $extension;
//
//        } else {
            $filename = $filename . '-' . time() . '.' . $extension;

//        }

        $vkr->name_file = $filename;


        if (Input::file('file')->move('vkr/' . $dir, $filename)) {

            $vkr->save();
            return redirect()->back()->with('message', 'Работа успешно добавлена');
        } else {

            return redirect()->back()->with('error', 'Ошибка при загрузке файла');

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
        $nav = NavigationController::index();
        $year = YearController::year();
        $facultets = Facultets::all();
        return view('vkr.store', ['facultets' => $facultets, 'nav' => $nav, 'year' => $year]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $vkr = Vkr::find($id);

        return $vkr;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

        $vkr = $this->show($id);
        $nav = NavigationController::index();
        $year = YearController::year();
        $facultets = Facultets::all();

        return view('vkr.edit', ['nav' => $nav, 'year' => $year, 'vkr' => $vkr, 'facultets' => $facultets]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update()
    {

        $files_vkr=Input::file('file');

        if (empty($files_vkr)) {


            $vkr = Vkr::find(Input::get('id'));
            $vkr->name = trim(Input::get('name'));
            $vkr->family = trim(Input::get('family'));
            $vkr->otchestvo = trim(Input::get('otchestvo'));
            $vkr->id_fakultet = trim(Input::get('id_fakultet'));
            $vkr->napravlenie_podgotovki = trim(Input::get('napravlenie_podgotovki'));
            $vkr->profile = trim(Input::get('profile'));
            $vkr->tema = trim(Input::get('tema'));
            $vkr->dt = trim(Input::get('year'));

            if ($vkr->save()) {
                return redirect()->back()->with('message', 'Работа успешно обновлена');
            } else {
                return redirect()->back()->with('error', 'Произошла ошибка попробуйте еще раз')->withInput();

            }

        } else {

            $v = Validator::make(Input::all(), [
                'file' => 'mimes:doc,pdf,rtf,docx',

            ]);

            if ($v->fails()) {
                return redirect()->back()->with('error', 'Формат файла не поддерживается')->withInput();
            }

            $vkr = Vkr::find(Input::get('id'));

            $file_old = $vkr['original']['name_file'];


            $vkr->name = trim(Input::get('name'));
            $vkr->family = trim(Input::get('family'));
            $vkr->otchestvo = trim(Input::get('otchestvo'));
            $vkr->id_fakultet = trim(Input::get('id_fakultet'));
            $vkr->napravlenie_podgotovki = trim(Input::get('napravlenie_podgotovki'));
            $vkr->profile = trim(Input::get('profile'));
            $vkr->tema = trim(Input::get('tema'));
            $vkr->dt = trim(Input::get('year'));

            $facultet = Facultets::find($vkr->id_fakultet);

            $dir = $facultet['original']['url_fakultet'];

            $file = Input::file('file');

            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

//            if (preg_match("/[а-я]+/i", $filename)) {
//
//                $filename = \Slug::make($filename) . '-' . time() . '.' . $extension;
//
//            } else {
                $filename = $filename . '-' . time() . '.' . $extension;

//            }

            $vkr->name_file = $filename;


            if (Input::file('file')->move('vkr/' . $dir, $filename)) {
                Storage::delete('/vkr/' . $dir . '/' . $file_old);
                $vkr->save();
                return redirect()->back()->with('message', 'Работа успешно обновлена');
            } else {

                return redirect()->back()->with('error', 'Ошибка при загрузке файла')->withInput();

            }

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

    public function search(Request $request)
    {

        $url_facultet = $request->facultet;

        $year = $request->year;

        $facultet = Facultets::where('url_fakultet', '=', $url_facultet)->get();

        $id = $facultet[0]['original']['id'];

        $vkr = Vkr::where('id_fakultet', '=', $id)->where('dt', '=', $year)->get();

        $nav = NavigationController::index();
        $year = YearController::year();
        return view('vkr.show', ['vkr' => $vkr, 'nav' => $nav, 'year' => $year, 'facultet' => $facultet]);


    }


    public function all()
    {


        $value = ['family', 'name', 'otchestvo', 'id_fakultet',  'napravlenie_podgotovki',  'profile',  'tema', 'dt',];
        $data = Input::all();

        $data['dt']=$data['year'];
        $q = \DB::table('vkr');
//        $i=0;
        if(Input::get('conformity')){
            foreach ($value as $v) {

                if (!empty($data[$v])) {


                    $q->where($v, $data[$v]);
                }
            }

        }else {
            foreach ($value as $v) {

                if (!empty($data[$v])) {

                    $q->orWhere($v, $data[$v]);
                }
            }
        }
        $vkrs = $q->get();


        $i=0;

        $vkr=[];
        $f=[];
        foreach($vkrs as $v){

            $facultet=Facultets::find($v->id_fakultet);

             $f[$i]=$facultet['original'];
            $vkr[$i]=$vkrs[$i];




                $i++;
        }


//        dd($vkr, $f);
        $nav=NavigationController::index();
        $year=YearController::year();
        $facultets = Facultets::all();
        return view('vkr.showAll', ['vkr'=>$vkr, 'nav'=>$nav, 'year'=>$year, 'facultet'=>$f, 'facultets'=>$facultets]);

    }
}
