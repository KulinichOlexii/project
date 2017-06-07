@extends('panel.index')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Добавить город</strong>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form class="form-horizontal" role="form" method="POST" action="/panel/city">
                                <div class="col-md-5">
                                    <div class="menu-create">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('name_ru') ? ' has-error' : '' }}">
                                            <label for="name_ru" class="col-md-4 control-label">Город_ru</label>
                                            <div class="col-md-6">
                                                <input id="name_ru" type="text" class="form-control" name="name_ru"
                                                       value="{{ old('name_ru') }}">
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
                                                       value="{{ old('name_ua') }}">
                                                @if ($errors->has('name_ua'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('name_ua') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <a class="btn btn-primary pull-left" href='/panel/map' role="button">
                                                <span class="glyphicon glyphicon-remove"></span>
                                                Назад
                                            </a>
                                            <button type="submit" class="btn btn-success pull-right">
                                                <span class="glyphicon glyphicon-ok"></span> Сохранить
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="col-md-7">
                                <table class='table table-hover table-bordered table-condensed'>
                                    <tr class='tHead'>
                                        <th>Наименование города_ru</th>
                                        <th>Наименование города_ua</th>
                                        <th>Действие</th>
                                    </tr>
                                    <tbody>
                                    @foreach($cities as $city)
                                        <tr class='fuel_row'>
                                            <td> {{ $city->name_ru }} </td>
                                            <td> {{ $city->name_ua }} </td>
                                            <td>
                                                <form method="post"
                                                      action="{{ route('panel.city.destroy', $city->id) }} ">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <a class='btn btn-primary'
                                                       href='/panel/city/{{ $city->id }}/edit'>
                                                        <i class='glyphicon glyphicon-wrench'></i> Изменить</a>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div align="center"> {{ $cities->links() }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
