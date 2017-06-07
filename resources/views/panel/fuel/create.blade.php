@extends('panel.index')
@section('content')

    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Добавить топливо</strong></div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="/panel/fuel"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name_ru') ? ' has-error' : '' }}">
                                <label for="name_ru" class="col-md-4 control-label">Имя топлива_ru</label>
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
                                <label for="name_ua" class="col-md-4 control-label">Имя топлива_ua</label>
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

                            <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                                <label for="title_ru" class="col-md-4 control-label">Короткое описание_ru</label>
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
                                <label for="title_ua" class="col-md-4 control-label">Короткое описание_ua</label>
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

                            <div class="form-group{{ $errors->has('text_ru') ? ' has-error' : '' }}">
                                <label for="text_ru" class="col-md-4 control-label">Полное описание_ru</label>
                                <div class="col-md-6">
                                    <textarea id="text_ru" class="form-control" rows="3" name="text_ru"
                                              value="">{{ old('text_ru') }}</textarea>
                                    @if ($errors->has('text_ru'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('text_ru') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('text_ua') ? ' has-error' : '' }}">
                                <label for="text_ua" class="col-md-4 control-label">Полное описание_ua</label>
                                <div class="col-md-6">
                                    <textarea id="text_ua" class="form-control" rows="3" name="text_ua"
                                              value="">{{ old('text_ua') }}</textarea>
                                    @if ($errors->has('text_ua'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('text_ua') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">Цена</label>
                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control" name="price"
                                           value="{{ old('price') }}">
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
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
                                    <a class="btn btn-primary" href='/panel/fuel' role="button">
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