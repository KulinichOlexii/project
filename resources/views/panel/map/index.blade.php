@extends('panel.index')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Сеть АЗС Colibri</strong>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="menu">
                                    @foreach($stations as $station)
                                        <dl>
                                            <dt> {{ $station->city->name_ru }} </dt>
                                            <dd> {{ $station->address_ru }}</dd>
                                            <dd>
                                                <form method="post"
                                                      action="{{ route('panel.map.destroy', $station->id) }} ">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <a class='btn btn-primary'
                                                       href='/panel/map/{{ $station->id }}/edit'>
                                                        <i class='glyphicon glyphicon-wrench'></i> Изменить</a>
                                                    <button type="submit" class="btn btn-primary"
                                                            onclick="return confirm('Удалить станцию?');">
                                                        <span class="glyphicon glyphicon-trash"></span> Удалить
                                                    </button>
                                                </form>
                                            </dd>
                                        </dl>
                                    @endforeach
                                </div>
                                <div style="margin-top: 15px;" align="center"> {{ $stations->links() }} </div>
                            </div>
                            <div class="col-md-7">
                                <div id="map">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-success" href='/panel/map/create' role="button">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    Добавить станцию
                                </a>
                                <a class="btn btn-warning" href='/panel/city/create' role="button">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    Добавить город
                                </a>
                                <a class="btn btn-warning" role="button" id="location">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    Найти поблизости
                                </a>
                                <input id="startWay" placeholder="От">
                                <input id="endWay" placeholder="До">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var infoMarkers = {!! $infoMarkers !!};
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&sensor=false&key=AIzaSyDS5GrcmGPc-li4YQ0vwsICG7sefGdV9rw&signed_in=true&callback=initMap"
            async defer>
    </script>
    <script src="{{asset('js/script.js')}}"></script>
@endsection
