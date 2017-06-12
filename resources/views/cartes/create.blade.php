@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Les Cartes <small>different form elements</small></h2>
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

               @include('alerts.errors');

               @include('alerts.success');


                <div class="x_content">
                    <br>

                    {!! Form::open(['url' => 'carte/','class'=>'form-horizontal form-label-left']) !!}
                    <div class="form-group">
                        {!!  Form::label('echelle', 'Echelle', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('echelle', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('nom', 'Nom *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('nom', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('type', 'Catégorie *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('type', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('pays', 'Pays *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('pays', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('nature', 'Nature *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('nature', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('feuille', 'Feuille *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('feuille', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('annee', 'Année d\'édition *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('annee', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('subdivision', 'Subdivision *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('subdivision', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('lieuConservation', 'Lieu de conservation *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('lieuConservation', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
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
