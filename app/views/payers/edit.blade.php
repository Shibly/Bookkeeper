{{--D:\xampp\htdocs\BookKeeper\app/views/payers/edit.blade.php--}}


@extends('layouts.admin')
@section('title')
    Edit Payer
@stop
@section('content')
    <div class="col-md-6">
        {{ Form::model($payer,array('method'=>'PATCH','route'=>array('payers.update',$payer->id))) }}
        @if($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('',$errors->all('<li class="error">:message</li>')) }}
            </div>
        @endif
        <div class="control-group">
            {{ Form::label('name','Payer name:') }}
            {{Form::text('name',Input::old('name'),array('class'=>'form-control','placeholder'=>'payer name'))}}
        </div>
        <br>
        {{ Form::submit('Update',array('class'=>'btn btn-success')) }}
        {{ Form::close() }}
    </div>
@stop