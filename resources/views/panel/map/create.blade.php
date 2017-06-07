@extends('panel.index')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Добавить АЗС</strong>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <form class="form-horizontal" role="form" method="POST" action="/panel/map">
                                <div class="col-md-5">
                                    <div class="menu-create">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                                            <label for="city_id" class="col-md-4 control-label">Город</label>
                                            <div class="col-md-6">
                                                <select id="city_id" class="form-control" name="city_id"
                                                        value="{{ old('city_id') }}">
                                                    <option selected disabled>Выберите город</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name_ru }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('city_id'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('address_ru') ? ' has-error' : '' }}">
                                            <label for="address_ru" class="col-md-4 control-label">Адрес_ru</label>
                                            <div class="col-md-6">
                                                <input id="address_ru" type="text" class="form-control"
                                                       name="address_ru"
                                                       value="{{ old('address_ru') }}">
                                                @if ($errors->has('address_ru'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_ru') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('address_ua') ? ' has-error' : '' }}">
                                            <label for="address_ua" class="col-md-4 control-label">Адрес_ua</label>
                                            <div class="col-md-6">
                                                <input id="address_ua" type="text" class="form-control"
                                                       name="address_ua"
                                                       value="{{ old('address_ua') }}">
                                                @if ($errors->has('address_ua'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_ua') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('content_ru') ? ' has-error' : '' }}">
                                            <label for="content_ru" class="col-md-4 control-label">Описание_ru</label>
                                            <div class="col-md-6">
                                    <textarea id="content_ru" class="form-control" rows="3" name="content_ru"
                                              value="">{{ old('content_ru') }}</textarea>
                                                @if ($errors->has('content_ru'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('content_ru') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('content_ua') ? ' has-error' : '' }}">
                                            <label for="content_ua" class="col-md-4 control-label">Описание_ua</label>
                                            <div class="col-md-6">
                                    <textarea id="content_ua" class="form-control" rows="3" name="content_ua"
                                              value="">{{ old('content_ua') }}</textarea>
                                                @if ($errors->has('content_ua'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('content_ua') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}" hidden>
                                            <label for="lat" class="col-md-4 control-label">Широта</label>

                                            <div class="col-md-6">
                                                <input id="lat" type="text" class="form-control" name="lat"
                                                       value="{{ old('lat') }}">
                                                @if ($errors->has('lat'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('lat') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}" hidden>
                                            <label for="lng" class="col-md-4 control-label">Долгота</label>
                                            <div class="col-md-6">
                                                <input id="lng" type="text" class="form-control" name="lng"
                                                       value="{{ old('lng') }}">
                                                @if ($errors->has('lng'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('lng') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="fuels" class="col-md-4 control-label">Топливо</label>
                                            <div class="col-md-6">
                                                @foreach ($fuels as $fuel)
                                                    <div class="checkbox">
                                                        <label for="fuel" class="control-label">
                                                            <input class="fuels_create" type="checkbox" name="fuels[]"
                                                                   value="{{ $fuel->id }}">
                                                            {{ $fuel->name_ru }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                <label for="fuels" class="col-md-4 control-label">Активация</label>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label for="active" class="control-label">
                                                            <input id="active" type="checkbox" name="active"
                                                                   value="{{ 'checked' ? '1' : '0' }}" checked>
                                                            Активировать
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
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
                            </form>
                            <div class="col-md-7">
                                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                <div id="map">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>












    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDS5GrcmGPc-li4YQ0vwsICG7sefGdV9rw&libraries=places&callback=initAutocomplete"
            async defer></script>


    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDS5GrcmGPc-li4YQ0vwsICG7sefGdV9rw&libraries=places"--}}
    {{--async defer></script>--}}

    <script src="{{asset('js/createMap.js')}}"></script>



@endsection
