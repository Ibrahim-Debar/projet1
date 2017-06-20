@extends('layouts.admin')

@section('content')

<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> les ouvrages  <small>different form elements</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    @include('alerts.success')
                    @include('alerts.errors')

                  <div class="x_content">
                    <br>



                      {!! Form::open(['url' => 'livre/','class'=>'form-horizontal form-label-left']) !!}


                      <div class="form-group">
                          {!!  Form::label('isbn', 'ISBN ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::text('isbn', '',['placeholder'=>"entrer l' ISBN",'class' => 'form-control col-md-7 col-xs-12']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!!  Form::label('titre', 'Titre *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::text('titre', '',['placeholder'=>"entrer le titre",'class' => 'form-control col-md-7 col-xs-12']) !!}
                          </div>
                      </div>

                      <div class="form-group">
                          <button class="add_field_button">Ajouter un auteur</button>
                          {!!  Form::label('auteur', 'Auteur(s) *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12 input_fields_wrap">
                              {!! Form::text('auteur[]', '',['placeholder'=>"entrer le(s) auteurs(s)",'class' => 'form-control col-md-7 col-xs-12']) !!}
                          </div>

                      </div>

                      <div class="form-group">
                          {!!  Form::label('collection', 'Collection', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::text('collection', '',['placeholder'=>"entrer la collection",'class' => 'form-control col-md-7 col-xs-12']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!!  Form::label('annee',  "Année d'éditon*", ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::text('annee', '',['placeholder'=>"taper l'année d'édirion",'class' => 'form-control col-md-7 col-xs-12']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!!  Form::label('anneeAcq',  "Année d'acquisition", ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::text('anneeAcq', '',['placeholder'=>"taper l'année d'aquisition",'class' => 'form-control col-md-7 col-xs-12']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!!  Form::label('typeAchat', "Type d'acquisition" , ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::select('typeAchat', ['achat'=>'achat', 'don'=>'don', 'echange' =>'echange'],'achat',['class'=>'form-control select2-hidden-accessible']) !!}

                          </div>
                      </div>
                      <div class="form-group">
                          {!!  Form::label('resume', 'Résumé  ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::textarea('resume', '',['placeholder'=>"tapez le résumé du livre ",'class' => 'form-control col-md-7 col-xs-12','size' => '30x3']) !!}
                          </div>
                      </div>
                              <div class="form-group">
                                  <h4><center> séparer les mots clés par un point vergule ;</center> </h4>
                              </div>

                              <div class="form-group">
                                  {!!  Form::label('motCles', 'Mots clés  ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      {!! Form::textarea('motCles', '',['placeholder'=>"entrer les mots clés ",'class' => 'form-control col-md-7 col-xs-12','size' => '30x3']) !!}
                                  </div>
                              </div>


                          <div class="form-group">
                              {!!  Form::label('langue', 'Langue ', ['placeholder'=>"sélectionner la langue ",'class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  {!! Form::select('langue', ['Arabe'=>'Arabe', 'Englais'=>'Englais', 'Francais' =>'Francais', 'Espagnol'=>'Espagnol'], 'Francais',['class'=>'form-control select2-hidden-accessible']) !!}
                              </div>
                          </div>

                      <div class="form-group">
                          {!!  Form::label('prix', 'Prix', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::text('prix', '',['placeholder'=>"entrer le prix",'class' => 'form-control col-md-7 col-xs-12']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!!  Form::label('n_order', 'N° D\'ordre', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::text('n_order', '',['placeholder'=>"entrer le n° ordre",'class' => 'form-control col-md-7 col-xs-12']) !!}
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              {!! Form::submit('Enregistrer',['class'=>'btn btn-success']) !!}

                              <a  class="btn btn-primary" href="{{route('livre.index')}}">Anuler</a>

                          </div>
                      </div>

                      {!! Form::close() !!}

                  </div>
                </div>
              </div>
            </div>


@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed

                    if (x==1)
                      $(wrapper).append(' <div><br><br><input class="form-control col-md-7 col-xs-12" name="auteur[]" type="text" value="" id="isbn"><a href="#" class="remove_field">Remove</a></div>'); //add input box
                    else
                        $(wrapper).append('<div><input class="form-control col-md-7 col-xs-12" name="auteur[]" type="text" value="" id="isbn"><a href="#" class="remove_field">Remove</a></div>'); //add input box
                    x++; //text box increment
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>


    @endsection
