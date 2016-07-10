@extends('app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Факультеты</div>

                    <div class="panel-body">
                        <a href="/users/store" class="btn btn-primary">Добавить пользователя</a>
                    </div>
                    <div class="panel-body">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Id пользователя</th>
                                <th>Имя пользователя</th>
                                <th>Элетронная почта</th>
                                <th>Группа пользователя</th>
                                <th>Редактировать</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $u)
                                <tr>
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    @if($u->role==1)
                                        <td>Администратор</td>
                                    @else
                                        <td>Пользователь</td>
                                    @endif
                                    <td><a href="/users/edit/{{$u->id}}">Редактировать данные</a></td>
                                    <td><a href="/users/delete/{{$u->id}}">Удалить пользователя</a></td>

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