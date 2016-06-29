@extends('app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление факультета</div>
                    @if (Session::has('message'))

                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>{{Session::get('message')}}</strong>
                        </div>

                    @endif
                    <div class="panel-body">


                        <form id="demo-form2"  action="/facultets/create" method="POST" class="form-horizontal form-label-left">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_fakultet">Наименование факультета
                                    <span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name_fakultet" required="required"
                                           class="form-control col-md-7 col-xs-12" name="name_fakultet">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/facultets" type="submit" class="btn btn-primary"> Отмена</a>
                                    <button type="submit" class="btn btn-success">Добавить</button>
                                </div>
                            </div>

                        </form>


                </div>
                </div>
            </div>
        </div>
    </div>



@stop