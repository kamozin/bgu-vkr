@extends('app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">ВКР</div>

                    <div class="panel-body">

                    </div>
                    <div class="panel-body">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>№ п/п</th>
                                <th>Фамилия</th>
                                <th>Имя</th>
                                <th>Отчество</th>
                                <th>Факультет</th>
                                <th>Направление подготовки</th>
                                <th>Профиль</th>
                                <th>Тема</th>
                                <th>Год сдачи</th>
                                <th>Просмотреть файл</th>
                                @if(Auth::user()->role==1)
                                    <th>Редактировать</th>
                                    @endif

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vkr as $v)


                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->family}}</td>
                                    <td>{{$v->name}}</td>
                                    <td>{{$v->otchestvo}}</td>
                                    <td>{{$facultet[0]['name_fakultet']}}</td>
                                    <td>{{$v->napravlenie_podgotovki}}</td>
                                    <td>{{$v->profile}}</td>
                                    <td>{{$v->tema}}</td>
                                    <td>{{$v->dt}}</td>
                                    <td><a class="btn btn-primary btn-xs" href="/vkr/{{$facultet[0]['url_fakultet']}}/{{$v->name_file}}">Посмотреть ВКР</a></td>
                                    @if(Auth::user()->role==1)
                                        <th><a class="btn btn-primary btn-xs" href="/vkr/edit/{{$v->id}}">Редактировать ВКР</a></th>
                                    @endif

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