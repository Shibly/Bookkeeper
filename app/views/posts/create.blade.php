@extends('layouts.admin')

@section('content')

    <div class="col-md-12">
        {{ Form::open(array('route'=>'posts.store')) }}
        @if($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('',$errors->all('<li class="error">:message</li>')) }}
            </div>

        @endif


        <div class="control-group">
            {{ Form::label('title','Title') }}
            {{Form::text('title','',array('class'=>'form-control','placeholder'=>'Please insert your title here'))}}
        </div>
        <br>

        <div class="control-group">
            {{ Form::label('body','this is the main body of your post') }}
            {{Form::textarea('body','',array('class'=>'ckeditor',))}}
        </div>
        <hr>
        <strong>Custom SEO Properties </strong><em>(These Items Are Optional)</em><br><br>

        <div class="control-group">
            {{ Form::label('m_desc','This is the description of your posts') }}
            {{Form::text('m_desc','',array('class'=>'form-control','placeholder'=>'Optional Post Description'))}}
        </div>
        <br>

        <div class="control-group">
            {{ Form::label('m_keyw','Please Insert your key words separated by comma.') }}
            {{Form::text('m_keyw','',array('class'=>'form-control','placeholder'=>'Please Insert your key words separated by comma.'))}}
        </div>
        <br/>
        {{ Form::submit('Create Post',array('class'=>'btn btn-success')) }}
        {{ link_to_route('posts.index','Cancel',null,array('class'=>'btn btn-warning')) }}
        {{ Form::close() }}
        <br>

    </div>

@stop