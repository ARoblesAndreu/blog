@extends('admin.layouts.layout')

@section('header')
    <h1>
        POSTS
        <small>Crear publicación</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
        <li class="active">Crear</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <form action="{{ route('admin.posts.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group {{ $errors->Has("title") ? 'has-error' : "" }}">
                            <label for="">Título de la publicación</label>
                            <input type="text" name="title" class="form-control" value="{{ old("title") }}"
                                   placeholder="Escribe el título de la publicación">
                            {!! $errors->first("title","<span class=\"help-block\">:message</span>") !!}
                        </div>
                        <div class="form-group {{ $errors->Has("body") ? 'has-error' : "" }}">
                            <label for="">Contenido de la publicación</label>
                            <textarea name="body" id="editor" rows="10"
                                      class="form-control"
                                      placeholder="Escribe el contenido de la publicación">{{ old("body") }}</textarea>
                            {!! $errors->first("body","<span class=\"help-block\">:message</span>") !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Fecha de publicación:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="published_at" type="text" class="form-control pull-right" id="datepicker" value="{{old("published_at")}}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->Has("category_id") ? 'has-error' : "" }}">
                            <label for="">Categorías</label>
                            <select name="category_id" class="form-control">
                                <option value="">Selecciona una categoría</option>
                                @foreach($categories as $category)
                                    <option {{ old("category_id") == $category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first("category_id","<span class=\"help-block\">:message</span>") !!}
                        </div>
                        <div class="form-group {{ $errors->Has("tags") ? 'has-error' : "" }}">
                            <label>Etiquetas</label>
                            <select name ="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona una o mas etiquetas"
                                    style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option {{collect(old("tags"))->contains($tag->id) ? "selected" : ""}} value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first("tags","<span class=\"help-block\">:message</span>") !!}
                        </div>
                        <div class="form-group {{ $errors->Has("excerpt") ? 'has-error' : "" }}">
                            <label for="">Extracto de la publicación</label>
                            <textarea name="excerpt" class="form-control">{{ old("excerpt") }}</textarea>
                            {!! $errors->first("excerpt","<span class=\"help-block\">:message</span>") !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
    <script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
    <script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
        $('#datepicker').datepicker({
            autoclose: true
        })
        CKEDITOR.replace('editor')
        $('.select2').select2()
    </script>
@endpush