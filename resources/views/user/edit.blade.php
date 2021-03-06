@extends('app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить пользователя</div>

                    <div class="panel-body">

                        @if (Session::has('message'))

                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>{{Session::get('message')}}</strong>
                            </div>

                        @endif
                        <form id="demo-form2"  method="POST" action="/users/update" class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Имя пользователя <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" required="required" value="{{ $user->name }}" name="name" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="email" name="email" required="required" value="{{ $user->email }}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Пароль</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="middle-name" class="form-control col-md-7 col-xs-12" value="" type="text" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="facultet_id" class="control-label col-md-3  col-sm-3 col-xs-12">Факультет пользователя<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="facultet_id" id="facultet_id" class="form-control">
                                        <option value="">Выберите факультет</option>
                                        @foreach($facultet as $f)

                                                @if(Auth::user()->facultet_id==0)
                                                <option value="{{$f->id}}" @if($user->facultet_id==$f->id) selected @endif>{{$f->name_fakultet}}</option>
                                            @elseif(Auth::user()->facultet_id>0)
                                                    @if(Auth::user()->facultet_id==$f->id)
                                                    <option value="{{$f->id}}" @if($user->facultet_id==$f->id) selected @endif>{{$f->name_fakultet}}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role" class="control-label col-md-3  col-sm-3 col-xs-12">Группа пользователя<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="role" id="role" class="form-control">
                                        <option value="0" @if($user->role==0) selected @endif>Пользователи</option>
                                        <option value="1" @if($user->role==1) selected @endif>Администраторы</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/users" class="btn btn-primary">Отмена</a>
                                    <button type="submit" class="btn btn-success">Обновить данные пользователя</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>



@stop