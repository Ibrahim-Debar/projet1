<?php

namespace App\Http\Controllers;

use App\enseignant;
use App\emprunt;
use App\exemplaire;
use App\ouvrage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $date =Carbon::now();


        dd($date);

         $emprunts = emprunt::where('demande','<>',1)->get();

        return view('emprunts.index',['emprunts'=>$emprunts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table =[];
        $profs = enseignant::all();


        return view('emprunts.creer',['table'=>$table,'profs'=>$profs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $rules = array(
            'idexempl'          => 'required',
            'idprof'       => 'required',
            'delai'       => 'required',

        );

        // create custom validation messages ------------------
        $messages = array(
            'required' => 'The :attribute is really really really important.',
            'regex'  => ' :attribute invalid format',

        );
        $attributes = [
            'idexempl'          => 'titre exemplair',
            'idprof'       => 'nom prof',
            'delai'       => 'required',
        ];



        $this->validate($request,$rules,$messages,$attributes);

        emprunt::create([
            'exemplaire_id'=> $request->input('idexempl'),
            'enseignant_id'=> $request->input('idprof'),
            'deai'         => $request->input('delai'),
            'demande'         => 0
        ]);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function selectType(Request $request)
    {

       $table =  ouvrage::where('types_ouvrage_id',$request->input('types_ouvrage_id'))
              ->select('id','titre_propre as text')
              ->get();

        return response()->json( $table );

    }
    public function selectTypeExempl(Request $request)
    {


        $table =  exemplaire::where('ouvrage_id',$request->input('ouvrage_id'))
            ->select('id','n_ordre as text')
            ->get();

        return response()->json( $table );
    }
}
