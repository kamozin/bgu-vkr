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

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vkr as $v)


                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->family}}</td>
                                    <td>{{$v->name}}</td>
                                    <td>{{$v->otchestvo}}</td>
                                    <td>
                                        @foreach($facultet as $f)

                                            @if($v->id_fakultet==$f['id'])

                                                {{$f['name_fakultet']}}

                                                @endif

                                            @endforeach
                                    </td>
                                    <td>{{$v->napravlenie_podgotovki}}</td>
                                    <td>{{$v->profile}}</td>
                                    <td>{{$v->tema}}</td>
                                    <td>{{$v->dt}}</td>
                                    <td>
                                        @foreach($facultet as $f)

                                            @if($v->id_fakultet==$f['id'])


                                                <a class="btn btn-primary btn-xs" href="/vkr/{{$f['url_fakultet']}}/{{$v->name_file}}">Посмотреть ВКР</a>
                                            @endif

                                        @endforeach
                                        </td>


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

        $('#datatable-responsive').DataTable();
    </script>
@stop