{{--D:\xampp\htdocs\BookKeeper\app/views/payees/edit.blade.php--}}


@extends('layouts.admin')
@section('title')
    Edit Payee
@stop
@section('content')
    <div class="col-md-6">
        {{ Form::model($payee,array('method'=>'PATCH','route'=>array('payees.update',$payee->id))) }}
        @if($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('',$errors->all('<li class="error">:message</li>')) }}
            </div>
        @endif
        <div class="control-group">
            {{ Form::label('name','Payee name:') }}
            {{Form::text('name',Input::old('name'),array('class'=>'form-control','placeholder'=>'payee name'))}}
        </div>
        <br>
        {{ Form::submit('Update',array('class'=>'btn btn-success')) }}
        {{ Form::close() }}
    </div>
@stop