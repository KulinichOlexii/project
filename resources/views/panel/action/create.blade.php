@extends('panel.index')
@section('content')

    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Добавить акцию</strong></div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="/panel/action"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                                <label for="title_ru" class="col-md-4 control-label">Заголовок_ru</label>
                                <div class="col-md-6">
                                    <input id="title_ru" type="text" class="form-control" name="title_ru"
                                           value="{{ old('title_ru') }}">
                                    @if ($errors->has('title_ru'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title_ru') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('title_ua') ? ' has-error' : '' }}">
                                <label for="title_ua" class="col-md-4 control-label">Заголовок_ua</label>
                                <div class="col-md-6">
                                    <input id="title_ua" type="text" class="form-control" name="title_ua"
                                           value="{{ old('title_ua') }}">
                                    @if ($errors->has('title_ua'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title_ua') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('content_ru') ? ' has-error' : '' }}">
                                <label for="content_ru" class="col-md-4 control-label">Полный текст_ru</label>
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
                                <label for="content_ua" class="col-md-4 control-label">Полный текст_ua</label>
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

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="content_ua" class="col-md-4 control-label">Статус</label>
                                <div class="col-md-2">
                                    <select id="status" class="form-control" name="status"
                                            value="{{ old('status') }}">
                                        <option selected disabled>Выберите статус</option>
                                        <option value="0">Новость</option>
                                        <option value="1">Акция</option>
                                        <option value="2">Новая АЗС</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('endData') ? ' has-error' : '' }}">
                                <label for="endData" class="col-md-4 control-label">Дата окончания</label>
                                <div class="col-md-2">
                                    <input id="endData" type="date" class="form-control" name="endData"
                                           value="{{ old('endData') }}">
                                    @if ($errors->has('endData'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('endData') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image" class="col-md-4 control-label">Фото</label>
                                <div class="col-md-4">
                                    <input id="image" type="file" class="form-control" name="image"
                                           value="{{ old('image') }}">
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <img src="http://placehold.it/100x100" id="showImage"
                                         style="max-width:200px;max-height:200px;float: left;"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label for="active" class="col-md-4 control-label">
                                            <input id="active" type="checkbox" name="active"
                                                   value="{{ 'checked' ? '1' : '0' }}" checked> Активировать
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a class="btn btn-primary" href='/panel/action' role="button">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#image').change(function () {
            readURL(this);
        });
    </script>
@endsection