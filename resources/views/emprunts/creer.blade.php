@extends('layouts.admin')
@section('css')
    <!-- Select2 -->
    <link href="{{asset('vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    @endsection
@section('js')
    <!-- Select2 -->
    <script src="{{asset('/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- Select2 -->
    <script>
        $(document).ready(function() {

           // var data = [{ id: 0, text: 'enhancement' }, { id: 1, text: 'bug' }, { id: 2, text: 'duplicate' }, { id: 3, text: 'invalid' }, { id: 4, text: 'wontfix' }];


            $("#listTitre").select2({

                allowClear: true
            });
            $("#listExempl").select2({

                allowClear: true
            });
             $("#Enseigne").select2({

                            allowClear: true
                        });

            $('#selectType').click(function ()
            {


                $.ajax({
                    method:"POST",
                    url: "{{url('selectType')}}",
                    data: {"_token": "{{ csrf_token() }}",
                        "types_ouvrage_id": $(this).val()},
                    success: function(data){
                        console.log(data);
                        $("#listTitre").empty().trigger('change');
                        $("#listTitre").select2({
                            placeholder: "Select a state",
                            allowClear: true,
                            data:data
                        });
                    }
                })

            });
            $("#listTitre").on('select2:select',function (evt)
            {

                $.ajax({
                    method:"POST",
                    url: "{{url('selectTypeExempl')}}",
                    data: {"_token": "{{ csrf_token() }}",
                        "ouvrage_id": $(this).val()},
                    success: function(data){
                        console.log(data);
                        $("#listExempl").empty().trigger('change');
                        $("#listExempl").select2({
                            placeholder: "Select a state",
                            allowClear: true,
                            data:data
                        });
                    }
                })

            });
            $('#btnsub').click(function ()
            {
//                $(this).closest('form').submit();


            alert('');
            });








        });
    </script>
    <!-- /Select2 -->


    @endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Les Thèses  <small>different form elements</small></h2>
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
                    <div class="clearfix">


                    </div>
                    @include('alerts.errors')
                    @include('alerts.success')
                </div>
                <div class="x_content">

                    <br>





                    {!! Form::open(['url' => 'emprunt','class'=>'form-horizontal form-label-left']) !!}


                    <div class="form-group">
                        {!!  Form::label('type ', 'type de document ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('type', ['0'=>'', '1'=>'livre', '2'=>'these', '3' =>'carte', '4' =>'Journal', '5' =>'Publication'], 'fr', ['id'=>'selectType','placeholder' => 'Pick a size...','on'=>'this.form.submit()']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Titre</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select id="listTitre" name="idOuvrage" class="select2_single form-control" tabindex="-1" >
                                <option></option>
                                @foreach($table as $tab)
                                    <option>{{$tab->titre_propre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">exmplaire</label>
                            <div class="col-md-6 col-sm-9 col-xs-12">
                                <select id="listExempl" name="idexempl" class="form-control" tabindex="-1">
                                    <option></option>

                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Enseigne</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select id="Enseigne" name="idprof" class=" form-control" tabindex="-1" >
                                <option></option>
                                @foreach($profs as $prof)
                                    <option value="{{$prof->id}}">{{$prof->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        {!!  Form::label('delai', 'Délai', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::number('delai', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            {!! Form::submit('Enregistrer',['class'=>'btn btn-success']) !!}
                            <a type="" id="btnsub" class="btn btn-primary">Annuler</a>

                        </div>
                    </div>

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>


@endsection
