{{--D:\xampp\htdocs\SimpleBlog\app/views/accounts/create.blade.php--}}

@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        {{ Form::open(array('route'=>'accounts.store')) }}
        @if($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('',$errors->all('<li class="error">:message</li>')) }}
            </div>

        @endif


        <div class="control-group">
            {{ Form::label('account_name','Name of your account:') }}
            {{Form::text('account_name','',array('class'=>'form-control','placeholder'=>'account name'))}}
        </div>
        <br>

        <div class="control-group">
            {{ Form::label('description','Give a description of your account:') }}
            {{Form::textarea('description','',array('class'=>'ckeditor',))}}
        </div>
        <br/>
        <div class="control-group">
            {{ Form::label('balance','Enter the initial account balance') }}
            {{Form::text('balance','',array('class'=>'form-control','placeholder'=>'initial balance'))}}
        </div>
        <br>

        <hr>
        <br/>
        {{ Form::submit('Create Account',array('class'=>'btn btn-success')) }}
        {{ link_to_route('accounts.index','Cancel',null,array('class'=>'btn btn-warning')) }}
        {{ Form::close() }}
        <br>

    </div>
@stop