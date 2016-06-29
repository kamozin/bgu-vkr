@extends('app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Факультеты</div>

                    <div class="panel-body">
                        <a href="/facultets/store" class="btn btn-primary">Добавить факультет</a>
                        </div>
                    <div class="panel-body">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>№ п/п</th>
                                <th>Наименование факультета</th>
                                <th>Дата создания</th>
                                <th>Редактировать</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($facultets as $f)
                                <tr>
                                    <td>{{$f->id}}</td>
                                    <td>{{$f->name_fakultet}}</td>
                                    <td>{{$f->dt}}</td>
                                    <td><a href="/facultets/edit/{{$f->id}}">Редактировать</a></td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
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