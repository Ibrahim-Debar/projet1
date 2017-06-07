<?php

namespace App\Http\Controllers;

use App\enseignant;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enseignants.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enseignants.create');
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
            'nom'          => 'required|regex:/^[\pL\s\-]+$/u',
            'prenom'       => 'required|regex:/^[\pL\s\-]+$/u',
            'email'        => 'email|unique:enseignants,email',
        );

        // create custom validation messages ------------------
        $messages = array(
            'required' => 'The :attribute is really really really important.',
            'regex'  => ' :attribute invalid format',
            'unique' => ':attribute existe déjà '
        );



        $this->validate($request,$rules,$messages);


       enseignant::create([
           'nom'    => $request->input('nom'),
           'prenom' => $request->input('prenom'),
           'email'  => $request->input('email'),
       ]);

       return redirect('enseignant/create')->with('insert','101010101');
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
}
