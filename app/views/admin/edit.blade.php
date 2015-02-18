{{--D:\xampp\htdocs\BookKeeper\app/views/admin/edit.blade.php--}}


@extends('layouts.admin')

@section('title')
    Edit User
@stop
@section('content')

    <div class="col-md-6">
        {{ Form::model($user,array('method'=>'POST','url'=>array('updateUser',$user->id))) }}
        @if($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('',$errors->all('<li class="error">:message</li>')) }}
            </div>
        @endif
        <div class="control-group">
            {{ Form::label('name','User Name:') }}
            {{Form::text('username',Input::old('username'),array('class'=>'form-control','placeholder'=>'user name'))}}
        </div>
        <br>

        <div class="control-group">
            {{ Form::label('fullname','User Full Name:') }}
            {{Form::text('fullname',Input::old('fullname'),array('class'=>'form-control','placeholder'=>'full name'))}}
        </div>
        <br>

        <div class="control-group">
            {{ Form::label('phonenumber','User Phone:') }}
            {{Form::text('phonenumber',Input::old('phonenumber'),array('class'=>'form-control','placeholder'=>'phone number'))}}
        </div>
        <br>

        <div class="control-group">
            {{ Form::label('email','User Email:') }}
            {{Form::email('email',Input::old('email'),array('class'=>'form-control','placeholder'=>'email'))}}
        </div>
        <br>

        <div class="control-group">
            {{ Form::label('password','User Password:') }}
            {{Form::password('password',null,array('class'=>'form-control','placeholder'=>'password'))}}
        </div>
        <br>
        {{ Form::submit('Update Information',array('class'=>'btn btn-success')) }}
        {{ Form::close() }}
    </div>
@stop