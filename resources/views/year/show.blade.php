@extends('app')


@section('content')

    <div class="container">
        <div class="row">
       @if(Auth::user()->role==0)

           @include('deny')

           @else
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Года</div>

                    <div class="panel-body">
                        <a href="/year/store" class="btn btn-primary">Добавить год</a>
                    </div>
                    @if (Session::has('error'))

                        <div class="alert alert-error alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                            </button>
                            <strong>{{Session::get('error')}}</strong>
                        </div>

                    @endif
                    <div class="panel-body">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Год</th>
                                <th>Редактировать</th>
                                <th>Удалить</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($year as $y)
                                <tr>
                                    <td>{{$y->id}}</td>
                                    <td>{{$y->year}}</td>
                                    <td><a href="/year/edit/{{$y->id}}">Редактировать</a></td>
                                    <td><a href="/year/delete/{{$y->id}}">Удалить</a></td>


                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
       @endif

        </div>
    </div>
@stop

@section('header')

    <link href="/includes/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

@stop
@section('footer')
    <script src="/includes/js/datatables/jquery.dataTables.min.js"></script>
    <script>

        $('#datatable-responsive').DataTable({

            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Russian.json"
            }
        });
    </script>
@stop