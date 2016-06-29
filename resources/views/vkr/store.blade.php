@extends('app')


@section('content')

    <div class="container">
       @if(Auth::user()->role==1)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Добавить ВКР</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if (Session::has('error'))

                            <div class="alert alert-error alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>{{Session::get('error')}}</strong>
                            </div>

                        @endif

                            @if (Session::has('message'))

                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{Session::get('message')}}</strong>
                                </div>

                            @endif
                        <form id="demo-form2" enctype="multipart/form-data"  method="POST" action="/vkr/create" class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="family">Фамилия <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="family" required="required" name="family" value="{{Input::old('family')}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Имя <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name="name" required="required"  value="{{Input::old('name')}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="otchestvo" class="control-label col-md-3 col-sm-3 col-xs-12">Отчество</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="otchestvo" class="form-control col-md-7 col-xs-12" value="{{Input::old('otchestvo')}}" type="text" name="otchestvo">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_fakultet" class="control-label col-md-3  col-sm-3 col-xs-12">Факультет<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="id_fakultet" id="id_fakultet" class="form-control">

                                        @foreach($facultets as $f)

                                            <option value="{{$f->id}}" @if(Input::old('id_fakultet')==$f->id) selected @endif>{{$f->name_fakultet}}</option>
                                            @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="napravlenie_podgotovki" class="control-label col-md-3 col-sm-3 col-xs-12">Направление подготовки</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="napravlenie_podgotovki" class="form-control col-md-7 col-xs-12" value="{{Input::old('napravlenie_podgotovki')}}" type="text" name="napravlenie_podgotovki">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="profile" class="control-label col-md-3 col-sm-3 col-xs-12">Профиль</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="profile" class="form-control col-md-7 col-xs-12" value="{{Input::old('profile')}}" type="text" name="profile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tema" class="control-label col-md-3 col-sm-3 col-xs-12">Тема</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="tema" class="form-control col-md-7 col-xs-12" value="{{Input::old('tema')}}" type="text" name="tema">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="year" class="control-label col-md-3 col-sm-3 col-xs-12">Год защиты</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="year" class="form-control col-md-7 col-xs-12" type="text" value="{{Input::old('year')}}" name="year">
                                </div>
                            </div>


                    <div class="form-group">
                        <label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">Файл ВКР</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="tema" class="form-control col-md-7 col-xs-12" type="file" name="file">
                        </div>
                    </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/users" class="btn btn-primary">Отмена</a>
                                    <button type="submit" class="btn btn-success">Добавить работу</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Поиск ВКР</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if (Session::has('error'))

                            <div class="alert alert-error alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>{{Session::get('error')}}</strong>
                            </div>

                        @endif

                        @if (Session::has('message'))

                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>{{Session::get('message')}}</strong>
                            </div>

                        @endif
                        <form id="demo-form2" enctype="multipart/form-data"  method="POST" action="/vkr/search/poll" class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="family">Фамилия <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="family" required="required" name="family" value="{{Input::old('family')}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Имя <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name="name" required="required"  value="{{Input::old('name')}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="otchestvo" class="control-label col-md-3 col-sm-3 col-xs-12">Отчество</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="otchestvo" class="form-control col-md-7 col-xs-12" value="{{Input::old('otchestvo')}}" type="text" name="otchestvo">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_fakultet" class="control-label col-md-3  col-sm-3 col-xs-12">Факультет<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="id_fakultet" id="id_fakultet" class="form-control">
                                            <option value="0" selected >Выберите факультет</option>
                                        @foreach($facultets as $f)

                                            <option value="{{$f->id}}" @if(Input::old('id_fakultet')==$f->id)  @endif>{{$f->name_fakultet}}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="napravlenie_podgotovki" class="control-label col-md-3 col-sm-3 col-xs-12">Направление подготовки</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="napravlenie_podgotovki" class="form-control col-md-7 col-xs-12" value="{{Input::old('napravlenie_podgotovki')}}" type="text" name="napravlenie_podgotovki">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="profile" class="control-label col-md-3 col-sm-3 col-xs-12">Профиль</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="profile" class="form-control col-md-7 col-xs-12" value="{{Input::old('profile')}}" type="text" name="profile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tema" class="control-label col-md-3 col-sm-3 col-xs-12">Тема</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="tema" class="form-control col-md-7 col-xs-12" value="{{Input::old('tema')}}" type="text" name="tema">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="year" class="control-label col-md-3 col-sm-3 col-xs-12">Год защиты</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="year" class="form-control col-md-7 col-xs-12" type="text" value="{{Input::old('year')}}" name="year">
                                </div>
                            </div>

                            <div class="form-group">


                                </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div style="text-align:right" class="checkbox">
                                        <label for="conformity">
                                            <input type="checkbox" name="conformity" id="conformity" value="1" class="flat" checked="checked"> Искать по полному соответствию полей
                                        </label>
                                    </div>

                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-5">

                                    <button type="submit" class="btn btn-success">Найти</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>



@stop