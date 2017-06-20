@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Invoice Design <small>Sample user invoice design</small></h2>
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

                    <section class="content invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12 invoice-header">
                                <h1>
                                    <i class="fa fa-book"></i> {{$these->titre_propre}}
                                    <small class="pull-right">Date: {{$these->created_at}}</small>
                                </h1>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">

                                <address>
                                    <b>Description</b>
                                    <br>
                                    <br>
                                    <b>Titre :</b> {{$these->titre_propre}}
                                    <br>
                                    <b>Date de soutenance:</b> {{$these->date_soutenue}}
                                    <br>
                                    <b>Type thèse :</b> {{$these->these_genre}}
                                    <br>
                                    <b>Langue:</b> {{$these->langue}}
                                    <br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b><i class="fa fa-user"></i> Auteurs</b>
                                <address>

                                    @if (count($these->Auteurs->all())>0)

                                        @foreach($these->Auteurs->all() as  $key => $value)
                                            <h5>{{$value->nom}}</h5>

                                        @endforeach
                                    @endif

                                </address>
                            </div>

                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <!-- accepted payments column -->

                            <!-- /.col -->
                            <div class="col-xs-6">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th style="width:50%">Mot clé:</th>
                                            <td>{{$these->mot_cle}}</td>
                                        </tr>
                                        <tr>
                                            <th>Resume :</th>
                                            <td>{{$these->resume}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- Table row -->
                        <div class="row">
                            <h3>Nombre de copy</h3>
                            <div class="col-xs-12 table">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>N° D'ORDRE </th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if (count($these->exemplaires->all())>0)

                                        @foreach($these->exemplaires->all() as  $key => $value)
                                            <tr>
                                                <td>
                                                    {{$value->id}}
                                                </td>
                                                <td>
                                                    {{$value->n_ordre}}
                                                </td>

                                                <td>
                                                    <a href="{{route('these.editCopy',$value->id)}}" class="btn  btn-info"><li class="glyphicon glyphicon-pencil"></li> </a>
                                                    <button idexempl="{{$value->id}}"  type="button" class="btn btn-danger deleteEn" data-toggle="modal" data-target=".bs-example-modal-lg"><li class="glyphicon glyphicon-remove"></li></button>
                                                </td>
                                            </tr>

                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->


                        <!-- /.row -->

                        <!-- this row will not appear when printing -->

                        <div class="row no-print">
                            <div class="col-xs-12">
                                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                </div>

                {!! Form::open(['url' => 'these/exemplaire/','method'=>'DELETE' ,'id'=>'deletForm','class'=>'form-horizontal form-label-left']) !!}
                <div class="modal-body">
                    <h1>vous voulez vraiment supprimer? </h1>
                    <input type="hidden" name="idThese" value="{{$these->id}}" id="inputidLivre">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">non</button>
                    <button type="submit" class="btn btn-primary">oui</button>
                </div>
                {!! Form::close() !!}

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@section('js')

    <script>
        $(document).ready(function() {

            var url =$('#deletForm').attr('action');


            $('.deleteEn').click(function(){

                $('#deletForm').attr('action',url+'/'+$(this).attr('idexempl'));



            });


        });
    </script>
@endsection
