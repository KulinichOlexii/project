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
                    <div class="panel-heading"><strong>Список топлива</strong></div>
                    <div class="panel-body">
                        <table class='table table-hover table-bordered table-condensed'>
                            <tr class='tHead'>
                                <th>Наименование топлива</th>
                                <th>Цена</th>
                                <th>Активность</th>
                                <th>Действие</th>
                            </tr>
                            <tbody>
                            @foreach($fuels as $fuel)
                                <tr class='fuel_row'>
                                    <td> {{ $fuel->name_ru }} </td>
                                    <td> {{ $fuel->price }} грн/л</td>
                                    <td>
                                        {{ $fuel->active == '1' ? 'Активен' : ''  }} </td>
                                    <td>
                                        <form method="post"
                                              action="{{ route('panel.fuel.destroy', $fuel->id) }} ">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a class='btn btn-primary' href='/panel/fuel/{{ $fuel->id }}'>
                                                <i class='glyphicon glyphicon-eye-open'></i> Обзор</a>
                                            <a class='btn btn-primary'
                                               href='/panel/fuel/{{ $fuel->id }}/edit'>
                                                <i class='glyphicon glyphicon-wrench'></i> Изменить</a>
                                            <button type="submit" class="btn btn-primary"
                                                    onclick="return confirm('Удалить топливо?');">
                                                <span class="glyphicon glyphicon-trash"></span> Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a class="btn btn-success" href='/panel/fuel/create' role="button">
                            <span class="glyphicon glyphicon-ok"></span>
                            Добавить
                        </a>
                        <div align="center"> {{ $fuels->links() }} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection