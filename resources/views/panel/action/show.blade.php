@extends('panel.index')
@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Акция: {{ $action->title_ru }}</strong></div>
                    <div class="panel-body">

                        <dl>
                            <dt> Заголовок_ru:</dt>
                            <dd> {{ $action->title_ru }} </dd>

                            <dt> Заголовок_ua:</dt>
                            <dd> {{ $action->title_ua }} </dd>

                            <dt> Полный текст_ru:</dt>
                            <dd> {{ $action->content_ru }} </dd>

                            <dt> Полный текст_ua:</dt>
                            <dd> {{ $action->content_ua }} </dd>

                            <dt> Статус:</dt>
                            <dd>
                                @if( $action->status == "0" )
                                    Новость
                                @elseif($action->status == "1")
                                    Акция
                                @else
                                    Новая АЗС
                                @endif
                            </dd>
                            <dt> Дата начала:</dt>
                            <dd> {{ $action->created_at }} </dd>
                            <dt> Дата окончания:</dt>
                            <dd> {{ $action->endData }} </dd>
                            <dt> Активность:</dt>
                            <dd> {{ $action->active == '1' ? 'Активен' : 'Не активен'  }} </dd>
                            <dt> Фото:</dt>
                            @if( $action->image != "" )
                                <dd><img src="{{ asset('img/'.$action->image) }}"
                                         style="max-width:400px;max-height:400px;margin-top: 10px"/></dd>
                            @endif
                        </dl>
                    </div>
                </div>
                <a class='btn btn-primary' href='/panel/action'><i class="glyphicon glyphicon-remove"></i> Назад</a>
            </div>
        </div>
    </div>
@endsection