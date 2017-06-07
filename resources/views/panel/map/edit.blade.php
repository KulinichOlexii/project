@extends('panel.index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Изменить АЗС</strong>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post"
                              action="{{ route('panel.map.update', $station->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="menu">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                                            <label for="city_id" class="col-md-4 control-label">Город</label>
                                            <div class="col-md-6">
                                                <select id="city_id" class="form-control" name="city_id"
                                                        value="{{ $station->city_id }}">
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}"
                                                                {{ $station->city_id == $city->id ? 'selected':'' }} >{{ $city->name_ru }}</option>
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
                                                       value="{{ $station->address_ru }}">
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
                                                       value="{{ $station->address_ua }}">
                                                @if ($errors->has('adress_ua'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('adress_ua') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('content_ru') ? ' has-error' : '' }}">
                                            <label for="content_ru" class="col-md-4 control-label">Описание_ru</label>
                                            <div class="col-md-6">
                                    <textarea id="content_ru" class="form-control" rows="3" name="content_ru"
                                              value="">{{ $station->content_ru }}</textarea>
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
                                              value="">{{ $station->content_ua }}</textarea>
                                                @if ($errors->has('content_ua'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('content_ua') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                                            <label for="lat" class="col-md-4 control-label">Широта</label>
                                            <div class="col-md-6">
                                                <input id="lat" type="text" class="form-control" name="lat"
                                                       value="{{ $station->lat }}">
                                                @if ($errors->has('lat'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('lat') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
                                            <label for="lng" class="col-md-4 control-label">Долгота</label>
                                            <div class="col-md-6">
                                                <input id="lng" type="text" class="form-control" name="lng"
                                                       value="{{ $station->lng }}">
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
                                                                   value="{{ $fuel->id }}"
                                                            @foreach ($station->fuels as $fuelId)
                                                                {{ $fuelId->id == $fuel->id ? 'checked':'' }}
                                                                    @endforeach>
                                                            {{ $fuel->name_ru }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                <label for="fuels" class="col-md-4 control-label">Активация</label>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label for="active" class="col-md-4 control-label">
                                                            <input id="active" type="checkbox" name="active"
                                                                   value="{{ 'checked' ? '1' : '0' }}" checked>
                                                            Активировать
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                    <div id="map">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <a class="btn btn-primary" href='/panel/map' role="button">
                                            <span class="glyphicon glyphicon-remove"></span>
                                            Назад
                                        </a>
                                        <span style="float: right">
                                        <button type="submit" class="btn btn-success">
                                            <span class="glyphicon glyphicon-ok"></span> Сохранить
                                        </button>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        lat = {{ $station->lat }};
        lng = {{ $station->lng }};
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDS5GrcmGPc-li4YQ0vwsICG7sefGdV9rw&libraries=places&callback=initAutocomplete"
            async defer></script>
    <script src="{{asset('js/createMap.js')}}"></script>

@endsection
