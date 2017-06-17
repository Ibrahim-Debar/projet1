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



                    {!! Form::open(['url' => 'livre/'.$livre->id,'method' => 'PUT','class'=>'form-horizontal form-label-left']) !!}

                    <div class="form-group">
                        {!!  Form::label('isbn', 'ISBN ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('isbn',$livre->isbn,['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!!  Form::label('titre', 'Titre Propre *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('titre', $livre->titre_propre,['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('editeur', 'Editeur', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('editeur',$livre->edition ,['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="add_field_button">Add More Fields</button>
                        <label for="auteur" class="control-label col-md-3 col-sm-3 col-xs-12">Auteur(s) *</label>

                        <div class="col-md-6 col-sm-6 col-xs-12 input_fields_wrap">
                            {!! Form::text('auteur[]', $livre->Auteurs->all()[0]->nom,['class' => 'form-control col-md-7 col-xs-12']) !!}


                            @foreach($livre->Auteurs->all() as  $key => $value)
                                @if($key>0)
                                    @if($key == 1 )
                                        <div><br><br><br>{!! Form::text('auteur[]', $value->nom,['class' => 'form-control col-md-7 col-xs-12']) !!}<a href="#" class="remove_field">Remove</a></div>
                                    @else
                                        <div>{!! Form::text('auteur[]', $value->nom,['class' => 'form-control col-md-7 col-xs-12']) !!}<a href="#" class="remove_field">Remove</a></div>
                                    @endif
                                @endif


                            @endforeach
                        </div>

                    </div>
                    <div class="form-group">
                        {!!  Form::label('collection', 'Collection', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('collection', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('annee', 'Annee', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('annee', $livre->annee_edition,['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('prix', 'Prix', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('prix', $livre->prix,['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!!  Form::label('langue', 'Langue ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('langue', ['ar'=>'Arabic', 'en'=>'English', 'fr' =>'French', 'es'=>'Spanish'], 'fr', ['placeholder' => 'Pick a size...']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!!  Form::label('typeAchat', 'Type Achat ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('typeAchat', $livre->typeAchat,['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('resumme', 'Resumme  ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::textarea('resumme', $livre->resume,['class' => 'form-control col-md-7 col-xs-12','size' => '30x3']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('motCles', 'Mot-cles  ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::textarea('motCles', $livre->mot_cle,['class' => 'form-control col-md-7 col-xs-12','size' => '30x3']) !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            {!! Form::submit('Submit',['class'=>'btn btn-success']) !!}
                            <button type="submit" class="btn btn-primary">Cancel</button>

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