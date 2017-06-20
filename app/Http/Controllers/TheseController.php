<?php

namespace App\Http\Controllers;

use App\Auteur;
use App\exemplaire;
use App\these;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'nom'                           => 'required',
            'date_soutenue'                   => 'required',
            'these_genre'                 => 'required',
            'n_ordre'                 => 'required|unique:exemplaires',
        );
        // create custom validation messages ------------------
        $messages = array(
            'required' => ':attribute est obligatoire.',
            'unique' => ' :attribute exist.',
        );

        $input  = $request->input('date_soutenue');

        $this->validate($request,$rules,$messages);


       $id= These::create([
            'titre_propre'      => $request->input('titre_propre')    ,
            'date_soutenue'           =>$input ,
            'types_ouvrage_id'  => $this->type_ouvr          ,
            'these_genre'              => $request->input('these_genre')   ,
            'resume'              => $request->input('resumme')   ,
            'mot_cle'              => $request->input('motCles')   ,
            'langue'              => $request->input('langue')


        ])->id;
        Auteur::create([
           'nom'=> $request->input('nom'),
            'ouvrage_id'=>$id,

        ]);

        exemplaire::create([
            'n_ordre'=> $request->input('n_ordre'),
            'ouvrage_id'=> $id

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

        $these = these::find($id);

        return view('theses.show',['these'=>$these]);
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

        return view('theses.edit',['these'=>$these]);

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

        $rules = array(
            'titre_propre'                    => 'required',
            'nom'                           => 'required',
            'date_soutenue'                   => 'required',
            'these_genre'                 => 'required',
        );
        // create custom validation messages ------------------
        $messages = array(
            'required' => ':attribute est obligatoire.',
            'unique' => ' :attribute exist.',
        );



        $this->validate($request,$rules,$messages);


        $format = 'd-m-Y';


      These::where('id',$id)->update([
            'titre_propre'      => $request->input('titre_propre')    ,
            'date_soutenue'           =>  Carbon::createFromFormat($format,$request->input('date_soutenue')),
            'types_ouvrage_id'  => $this->type_ouvr          ,
            'these_genre'              => $request->input('these_genre')   ,
            'resume'              => $request->input('resumme')   ,
            'mot_cle'              => $request->input('motCles')   ,
            'langue'              => $request->input('langue')


        ]);

        Auteur::where('ouvrage_id',$id)->delete();
        Auteur::create([
            'nom'=> $request->input('nom'),
            'ouvrage_id'=>$id,

        ]);
        return redirect('these')->with('message','insertion avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       these::destroy($id);
        return redirect('these');
    }



    public function createCopy($id)
    {

        $these = these::find($id);
        return view('theses.exemplaires.create',['these'=>$these]);
    }

    public function storeCopy(Request $request)
    {


        $rules = array(
            'n_ordre'       => 'required|unique:exemplaires',
        );
        // create custom validation messages ------------------
        $messages = array(
            'required' => ':attribute est obligatoire.',
            'unique' => ' :attribute exist.',
        );
        $this->validate($request,$rules,$messages);

        exemplaire::create([
            "ouvrage_id"=>    $request->input("idThese"),
            "n_ordre"=>    $request->input("n_ordre"),


        ]);
        return redirect()->to($this->getRedirectUrl())->with('message','Everything went great');
    }

    public function editCopy($id)
    {
        $exemple = exemplaire::find($id);
        return view('theses.exemplaires.edit',['exemple'=>$exemple]);
    }

    public function updateCopy(Request $request, $id)
    {


        $rules = array(
            'n_ordre'          => 'required',
        );

        // create custom validation messages ------------------

        $messages = array(
            'required' => ':attribute est obligatoire.',
        );

        $this->validate($request,$rules,$messages);

        exemplaire::where('id',$id)->update([
            "n_ordre" => $request->input('n_ordre'),
        ]);

        return redirect()->route('these.show',$request->input('idthese'));
    }


    public function destroyCopy(Request $request,$id)
    {

        exemplaire::destroy($id);
        return redirect()->route('livre.show',$request->input('idLivre'));

    }




}
