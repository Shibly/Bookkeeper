{{--D:\xampp\htdocs\BookKeeper\app/views/categories/edit.blade.php--}}

@extends('layouts.admin')
@section('content')
    <div class="col-md-6">
        {{ Form::model($category,array('method'=>'post','route'=>array('updateCategory',$category->id))) }}
        @if($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('',$errors->all('<li class="error">:message</li>')) }}
            </div>
        @endif
        <div class="control-group">
            {{ Form::label('name','Name of your account:') }}
            {{Form::text('name',Input::old('name'),array('class'=>'form-control','placeholder'=>'category name'))}}
        </div>
        <br>
        {{ Form::submit('Update Category',array('class'=>'btn btn-success')) }}
        {{ Form::close() }}
    </div>
@stop