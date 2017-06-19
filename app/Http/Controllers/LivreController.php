<?php

namespace App\Http\Controllers;

use App\Auteur;
use App\exemplaire;
use App\livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // list livre
        $livres = livre::Listelivre();




        return view('livres.index',['livres'=>$livres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livres.create');
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
            'titre'          => 'required|unique:ouvrages,titre_propre,NULL,id,types_ouvrage_id,1',
            'auteur'       => 'required',
        );

        // create custom validation messages ------------------
        $messages = array(
            'required' => 'The :attribute is really really really important.',
            'unique' => 'exist :attribute',
        );



        $this->validate($request,$rules,$messages);

        // "auteur" => ,
        // "collection" => $request->input('collection'),
       $id =  livre::create([

          "isbn" => $request->input('isbn'),
          "titre_propre" => $request->input('titre'),
          "edition" => $request->input('editeur'),
          "annee_edition" => $request->input('annee'),
          "prix" => $request->input('prix'),
          "langue" => $request->input('langue'),
          "typeAchat" => $request->input('typeAchat'),
          "resume" => $request->input('resumme'),
          "mot_cle" => $request->input('motCles'),
          "types_ouvrage_id" => 1

         ])->id;


        foreach($request->input('auteur') as $auteur){
            Auteur::create([
                'nom' => $auteur,
                'ouvrage_id' => $id,

            ]);
        }




        return redirect('livre/create')->with('message','Everything went great');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livre = livre::find($id);
        return view('livres.show',['livre'=>$livre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $livre = livre::find($id);

        return view('livres.edit',['livre'=>$livre]);

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





        livre::where('id',$id)->update([

            "isbn" => $request->input('isbn'),
            "titre_propre" => $request->input('titre'),
            "edition" => $request->input('editeur'),
            "annee_edition" => $request->input('annee'),
            "prix" => $request->input('prix'),
            "langue" => $request->input('langue'),
            "typeAchat" => $request->input('typeAchat'),
            "resume" => $request->input('resumme'),
            "mot_cle" => $request->input('motCles'),
            "types_ouvrage_id" => 1

        ]);

        Auteur::where('ouvrage_id',$id)->delete();

        foreach($request->input('auteur') as $auteur){
            Auteur::create([
                'nom' => $auteur,
                'ouvrage_id' => $id,

            ]);
        }

        return redirect('livre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        livre::destroy($id);
        return redirect('livre');
    }

    /**
     * Show the form for creating a new resource copy.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCopy($id)
    {
        $livre = livre::find($id);
        return view('livres.exemplaires.create',['livre'=>$livre]);
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
            "ouvrage_id"=>    $request->input("idLivre"),
            "n_ordre"=>    $request->input("n_ordre"),
            "type_achat"=>    $request->input("type_achat"),
            "prix"=>    $request->input("prix"),

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
