<?php

namespace App\Http\Controllers;

use App\Auteur;
use App\these;
use Illuminate\Http\Request;

class TheseController extends Controller
{
    public $type_ouvr = 2;
    public function index()
    {

        $theses = these::get();



        return view('theses.index',['theses'=>$theses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $rules = array(
            'titre_propre'                    => 'required',
            'nom'                   => 'required',
            'edition'                => 'required',
            'date_soutenue'                   => 'required',
            'these_genre'                 => 'required',

        );
        // create custom validation messages ------------------
        $messages = array(
            'required' => ':attribute est obligatoire.',
        );

        $this->validate($request,$rules,$messages);

       $id= These::create([
            'titre_propre'      => $request->input('titre_propre')    ,
            'edition'       => $request->input('edition')   ,

            'date_soutenue'           => $request->input('date_soutenue'),
            'types_ouvrage_id'  => $this->type_ouvr          ,
            'these_genre'              => $request->input('these_genre')   ,

        ])->id;
        Auteur::create([
           'nom'=> $request->input('nom'),
            'ouvrage_id'=>$id,

        ]);


        return redirect('these/create')->with('message','insertion avec succès');
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
        $these =these::find($id);
        $auteur =Auteur::find($id);
        return view('theses.edit',['these'=>$these],['Auteur'=>$auteur]);

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
}
