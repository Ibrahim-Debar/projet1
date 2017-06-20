@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> les Thèeses </h2>
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



                    {!! Form::open(['url' => 'these/'.$these->id,'method' => 'PUT','class'=>'form-horizontal form-label-left']) !!}

                    <div class="form-group">
                        {!!  Form::label('titre_propre', 'Titre *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('titre_propre', $these->titre_propre,['placeholder'=>"entrer le titre de la thèse ",'class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('nom', 'Auteur *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('nom', $these->Auteurs->all()[0]->nom,['placeholder'=>"entrer l'auteur ",'class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!!  Form::label('date_soutenue', 'Date de Soutenance ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('date_soutenue',$these->date_soutenue,['placeholder'=>"entrer la date de soutenance ",'class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type de la thèse</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">

                            {!! Form::select('these_genre', [''=>'','CEA'=>'CEA', 'DES'=>'DES', '3 ème cycle' =>'3 ème cycle', "thèse d'état"=>"thèse d'état","Mémoire DESA (master/doctorat)"=>"Mémoire DESA (master/doctorat)"], $these->these_genre, ['class'=>' form-control','placeholder' => 'Pick a size...']) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('resumme', 'Résumé  ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::textarea('resumme', $these->resume,['placeholder'=>"tapez le résumé du livre ",'class' => 'form-control col-md-7 col-xs-12','size' => '30x3']) !!}
                        </div>
                    </div>




                    <div class="form-group">
                        <h4><center> séparer les mots clés par un point vergule ;</center> </h4>
                    </div>

                    <div class="form-group">
                        {!!  Form::label('motCles', 'Mots clés  ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::textarea('motCles',$these->mot_cle,['placeholder'=>"entrer les mots clés ",'class' => 'form-control col-md-7 col-xs-12','size' => '30x3']) !!}
                        </div>
                    </div>


                    <div class="form-group">
                        {!!  Form::label('langue', 'Langue ', ['placeholder'=>"sélectionner la langue ",'class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('langue', ['Arabe'=>'Arabe', 'Englais'=>'Englais', 'Francais' =>'Francais', 'Espagnol'=>'Espagnol'], $these->langue) !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            {!! Form::submit('Enregistrer',['class'=>'btn btn-success']) !!}
                            <button type="submit" class="btn btn-primary">Annuler</button>

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