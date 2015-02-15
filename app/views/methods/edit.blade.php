{{--D:\xampp\htdocs\BookKeeper\app/views/methods/edit.blade.php--}}

@extends('layouts.admin')
@section('title')
    Edit Payment Method
@stop
@section('content')
    <div class="col-md-6">
        {{ Form::model($method,array('method'=>'PATCH','route'=>array('methods.update',$method->id))) }}
        @if($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('',$errors->all('<li class="error">:message</li>')) }}
            </div>
        @endif
        <div class="control-group">
            {{ Form::label('name','Payment method name:') }}
            {{Form::text('name',Input::old('name'),array('class'=>'form-control','placeholder'=>'method name'))}}
        </div>
        <br>
        {{ Form::submit('Update',array('class'=>'btn btn-success')) }}
        {{ Form::close() }}
    </div>
@stop