@extends('panel.index')
@section('content')
    <div class="container">
        <div class="row">
            <div>
                @if(Session::has('massage'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Список акций</strong></div>
                    <div class="panel-body">
                        <table class='table table-hover table-bordered table-condensed'>
                            <tr class='tHead'>
                                <th>Название акции</th>
                                <th>Статус</th>
                                <th>Активность</th>
                                <th>Дата начала</th>
                                <th>Дата окончания</th>
                                <th>Действие</th>
                            </tr>
                            <tbody>
                            @foreach($actions as $action)
                                <tr class='fuel_row'>
                                    <td> {{ $action->title_ru }} </td>
                                    <td>
                                        @if( $action->status == "0" )
                                            Новость
                                        @elseif($action->status == "1")
                                            Акция
                                        @else
                                            Новая АЗС
                                        @endif
                                    </td>
                                    <td> {{ $action->active == '1' ? 'Активен' : ''  }} </td>
                                    <td> {{ $action->created_at }} </td>
                                    <td> {{ $action->endData }} </td>
                                    <td>
                                        <form method="post"
                                              action="{{ route('panel.action.destroy', $action->id) }} ">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a class='btn btn-primary' href='/panel/action/{{ $action->id }}'>
                                                <i class='glyphicon glyphicon-eye-open'></i> Обзор</a>
                                            <a class='btn btn-primary'
                                               href='/panel/action/{{ $action->id }}/edit'>
                                                <i class='glyphicon glyphicon-wrench'></i> Изменить</a>
                                            <button type="submit" class="btn btn-primary"
                                                    onclick="return confirm('Удалить акцию?');">
                                                <span class="glyphicon glyphicon-trash"></span> Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a class="btn btn-success" href='/panel/action/create' role="button">
                            <span class="glyphicon glyphicon-ok"></span>
                            Добавить
                        </a>
                        <div align="center"> {{ $actions->links() }} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection