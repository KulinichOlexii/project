@extends('panel.index')
@section('content')

    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Изменить город</strong></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('panel.city.update', $city->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name_ru') ? ' has-error' : '' }}">
                                <label for="name_ru" class="col-md-4 control-label">Город_ru</label>
                                <div class="col-md-6">
                                    <input id="name_ru" type="text" class="form-control" name="name_ru"
                                           value="{{ $city->name_ru }}">
                                    @if ($errors->has('name_ru'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name_ru') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name_ua') ? ' has-error' : '' }}">
                                <label for="name_ua" class="col-md-4 control-label">Город_ua</label>

                                <div class="col-md-6">
                                    <input id="name_ua" type="text" class="form-control" name="name_ua"
                                           value="{{ $city->name_ru }}">

                                    @if ($errors->has('name_ua'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name_ua') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a class="btn btn-primary" href='/panel/city/create' role="button">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        Назад
                                    </a>
                                    <span style="float: right">
                                        <button type="submit" class="btn btn-success">
                                            <span class="glyphicon glyphicon-ok"></span> Изменить
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection