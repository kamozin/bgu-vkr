@extends('app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if(Auth::user()->role==0)

                    @include('deny')

                @else
                    <a class="btn btn-primary" href="/year">Просмотреть все года</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">Добавить год</div>

                        <div class="panel-body">

                            @if (Session::has('message'))

                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{Session::get('message')}}</strong>
                                </div>

                            @endif
                            <form id="demo-form2" method="POST" action="/year/create"
                                  class="form-horizontal form-label-left">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Год <span
                                                class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="name" required="required" name="year"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="/year" class="btn btn-primary">Отмена</a>
                                        <button type="submit" class="btn btn-success">Добавить год</button>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>



@stop