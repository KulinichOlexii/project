@extends('panel.index')
@section('content')
    <div class="container">
        <div class="row">
            <div >
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Топливо: {{ $fuel->name_ru }}</strong></div>
                    <div class="panel-body">

                            <dl>
                                <dt> Имя топлива_ru: </dt>
                                <dd> {{ $fuel->name_ru }} </dd>

                                <dt> Имя топлива_ua: </dt>
                                <dd> {{ $fuel->name_ua }} </dd>

                                <dt> Короткое описание_ru: </dt>
                                <dd> {{ $fuel->title_ru }} </dd>

                                <dt> Короткое описание_ua: </dt>
                                <dd> {{ $fuel->title_ua }} </dd>

                                <dt> Полное описание_ru: </dt>
                                <dd> {{ $fuel->text_ru }} </dd>

                                <dt> Полное описание_ua: </dt>
                                <dd> {{ $fuel->text_ua }} </dd>

                                <dt> Цена: </dt>
                                <dd> {{ $fuel->price }} грн/л </dd>

                                <dt> Активность: </dt>
                                <dd> {{ $fuel->active == '1' ? 'Активен' : 'Не активен'  }} </dd>

                                <dt> Фото: </dt>
                                <dd> <img src="{{ asset('img/'.$fuel->image) }}" style="max-width:400px;max-height:400px;margin-top: 10px" /> </dd>
                            </dl>
                    </div>
                </div>
                <a class='btn btn-primary' href='/panel/fuel'><i class="glyphicon glyphicon-remove"></i> Назад</a>
            </div>
        </div>
    </div>
@endsection