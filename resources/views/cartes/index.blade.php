@extends('layouts.admin')

@section('css')

    <!-- Datatables -->
    <link href="{{asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Les cartes </h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Echelle</th>
                            <th>Catégorie</th>
                            <th>Nature</th>
                            <th>Feuille</th>
                            <th>Année d'édition</th>
                            <th>Nombre</th>
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($cartes as $carte)
                            <tr>
                                <td>{{$carte->titre_propre}}</td>
                                <td>{{$carte->echelle}}</td>
                                <td>{{$carte->tyope_carte}}</td>
                                <td>{{$carte->nature}}</td>
                                <td>{{$carte->feuille}}</td>
                                <td>{{$carte->annee_edition}}</td>
                                <td>{{count( $carte->exemplaires->all() )}}</td>
                                <td>
                                    <a href="{{route('carte.edit',$carte->id)}}" class="btn  btn-info"><li class="glyphicon glyphicon-pencil"></li> </a>
                                    <a href="{{url('carte/exemplaire/create/'.$carte->id)}}" class="btn  btn-info"><li class="fa fa-files-o"></li> </a>
                                    <a href="{{url('carte/'.$carte->id)}}" class="btn  btn-info"><li class="glyphicon glyphicon-eye-open"></li> </a>
                                    <button idcart="{{$carte->id}}" type="button" class="btn btn-danger deleteCart" data-toggle="modal" data-target=".bs-example-modal-lg"><li class="glyphicon glyphicon-remove"></li></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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

                {!! Form::open(['url' => 'carte/','method'=>'DELETE' ,'id'=>'deletForm','class'=>'form-horizontal form-label-left']) !!}
                <div class="modal-body">
                    <h1>vous voulez vraiment supprimer ? </h1>
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

    <!-- Datatables -->
    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>

    <script>

        $(document).ready(function() {

            var url =$('#deletForm').attr('action');

            var handleDataTableButtons = function() {
                if ($("#datatable-buttons").length) {
                    $("#datatable-buttons").DataTable({
                        columnDefs: [ {
                            targets: 0,
                            render: function ( data, type, row ) {
                                return  data.length > 50 ?
                                data.substr( 0, 50 ) +'....' :
                                        data;
                            }
                        } ],
                        dom: "Bfrtip",
                        buttons: [
                            {
                                extend: "copy",
                                className: "btn-sm"
                            },
                            {
                                extend: "csv",
                                className: "btn-sm"
                            },
                            {
                                extend: "excel",
                                className: "btn-sm"
                            },
                            {
                                extend: "pdfHtml5",
                                className: "btn-sm"
                            },
                            {
                                extend: "print",
                                className: "btn-sm"
                            },
                        ],
                        responsive: true
                    });
                }
            };
            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                        handleDataTableButtons();
                    }
                };
            }();
            TableManageButtons.init();

            console.log(url);
            $('.deleteCart').click(function(){
                alert()
                console.log($(this).attr('idcart'));

                $('#deletForm').attr('action',url+'/'+$(this).attr('idcart'));

            });



        });
    </script>
@endsection
