<?php

namespace App\Http\Controllers;

use App\Carte;
use App\exemplaire;
use App\ouvrage;
use Illuminate\Http\Request;

class CarteController extends Controller
{

    public $type_ouvr = 3;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //new function
        $cartes = Carte::ListeCarte();

        return view('cartes.index',['cartes'=>$cartes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cartes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request->all());


        $rules = array(
            'nom'                    => 'required',
            'type'                   => 'required',
            'echelle'                => 'required',
            'pays'                   => 'required',
            'nature'                 => 'required',
            'feuille'                => 'required',
            'lieuConservation'       => 'required',
        );
        // create custom validation messages ------------------
        $messages = array(
            'required' => ':attribute est obligatoire.',
        );
        $this->validate($request,$rules,$messages);

        $id = Carte::create([
            'echelle'           => $request->input('echelle'),
            'titre_propre'      => $request->input('nom')    ,
            'tyope_carte'       => $request->input('type')   ,
            'types_ouvrage_id'  => $this->type_ouvr          ,
            'pays'              => $request->input('pays')   ,
            'nature'            => $request->input('nature') ,
            'feuille'           => $request->input('feuille')    ,
            'subdivision'       => $request->input('subdivision'),
            'lieuConservation'  => $request->input('lieuConservation'),
            'annee_edition'  => $request->input('annee'),
            'mot_cle'  => $request->input('motCles'),

        ])->id;

        exemplaire::create([
            'n_ordre'=>$request->input('n_ordre'),
            'ouvrage_id'=>$id,
        ]);

        return redirect('carte/create')->with('message','Everything went great');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carte =Carte::find($id);

        return view('cartes.show',['carte'=>$carte]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carte =Carte::find($id);


        return view('cartes.edit',['carte'=>$carte]);
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
            'titre_propre'           => 'required',
            'tyope_carte'            => 'required',
            'echelle'                => 'required',
            'pays'                   => 'required',
            'nature'                 => 'required',
            'feuille'                => 'required',
            'annee_edition'          => 'required',
        );
        // create custom validation messages ------------------
        $messages = array(
            'required' => ':attribute est obligatoire.',
        );

        $this->validate($request,$rules,$messages);

      Carte::where('id',$id)->update([
      "echelle"          =>  $request->input('echelle'),
      "titre_propre"     => $request->input('titre_propre'),
      "tyope_carte"      => $request->input('tyope_carte'),
      "pays"             => $request->input('pays'),
      "nature"           => $request->input('nature'),
      "feuille"          => $request->input('feuille'),
      "annee_edition"    => $request->input('annee_edition'),
      "subdivision"      => $request->input('subdivision'),
      "mot_cle"      => $request->input('mot_cle'),
      "lieuConservation" => $request->input('lieuConservation')
      ]);

        return redirect('carte/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Carte::destroy($id);

        return redirect('carte/');

    }



    /**
     * Show the form for creating a new resource copy.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCopy($id)
    {
        $carte = Carte::find($id);
        return view('cartes.exemplaires.create',['carte'=>$carte]);
    }

    public function storeCopy(Request $request)
    {

        $rules = array(
            'titre'          => 'required',
            'n_ordre'       => 'required|unique:exemplaires',
        );
        // create custom validation messages ------------------
        $messages = array(
            'required' => 'The :attribute is really really really important.',
            'unique' => 'exist :attribute',
        );
        $this->validate($request,$rules,$messages);
        exemplaire::create([
            "ouvrage_id"=>    $request->input("idcarte"),
            "n_ordre"=>    $request->input("n_ordre")

        ]);
        return redirect()->to($this->getRedirectUrl())->with('message','Everything went great');
    }

    public function editCopy($id)
    {
        $exemple = exemplaire::find($id);
        return view('livres.exemplaires.edit',['exemple'=>$exemple]);
    }

    public function updateCopy(Request $request, $id)
    {


        $rules = array(
            'n_ordre'          => 'required',
        );

        // create custom validation messages ------------------

        $messages = array(
            'required' => 'The :attribute is really really really important.',
        );

        $this->validate($request,$rules,$messages);

        exemplaire::where('id',$id)->update([
            "n_ordre" => $request->input('n_ordre'),
            "type_achat" => $request->input('type_achat'),
            "prix" => $request->input('prix')

        ]);

        return redirect()->route('livre.show',$request->input('idLivre'));
    }


    public function destroyCopy(Request $request,$id)
    {

        exemplaire::destroy($id);
        return redirect()->route('livre.show',$request->input('idLivre'));

    }




}
