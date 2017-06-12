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
                  <div class="x_content">
                    <br>



                      {!! Form::open(['url' => 'livre/','class'=>'form-horizontal form-label-left']) !!}

                      <div class="form-group">
                          {!!  Form::label('isbn', 'ISBN ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::text('isbn', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!!  Form::label('titre', 'Titre Propre *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::text('titre', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!!  Form::label('auteur', 'Auteur(s) *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::text('auteur', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!!  Form::label('editeur', 'Editeur', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::text('editeur', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
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
                              {!! Form::text('annee', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!!  Form::label('prix', 'Prix', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::text('prix', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
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
                              {!! Form::text('typeAchat', '',['class' => 'form-control col-md-7 col-xs-12']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!!  Form::label('resumme', 'Resumme  ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::textarea('resumme', '',['class' => 'form-control col-md-7 col-xs-12','size' => '30x3']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!!  Form::label('motCles', 'Mot-cles  ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::textarea('motCles', '',['class' => 'form-control col-md-7 col-xs-12','size' => '30x3']) !!}
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
