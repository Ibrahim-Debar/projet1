@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Les Professeurs <small>different form elements</small></h2>
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



                @if(count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        @foreach($errors->all() as $err)
                            <li>{{$err}}</li>
                        @endforeach
                    </div>

                @endif

                @if(session('message'))

                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        <p>{{session('message')}}</p>
                    </div>
                @endif

                <div class="x_content">
                    <br>



                    {!! Form::open(['url' => 'enseignant/'.$enseignant->id,'method' => 'PUT','class'=>'form-horizontal form-label-left']) !!}

                    <div class="form-group">
                        {!!  Form::label('nom', 'Nom *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('nom',$enseignant->nom,['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('prenom', 'Prenom *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('prenom',$enseignant->prenom,['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('email', 'Email', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('email', $enseignant->email,['class' => 'form-control col-md-7 col-xs-12']) !!}
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
