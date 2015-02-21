{{--D:\xampp\htdocs\BookKeeper\app/views/accounts/edit.blade.php--}}


@extends('layouts.admin')
@section('title')
    Edit Account
@stop
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Edit Account</h3>
                </div>
                <div class="box-body">
                    {{ Form::model($account,array('method'=>'PATCH','route'=>array('accounts.update',$account->id))) }}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            {{ implode('',$errors->all('<li class="error">:message</li>')) }}
                        </div>

                    @endif


                    <div class="control-group">
                        {{ Form::label('account_name','Name of your account:') }}
                        {{Form::text('account_name',Input::old('account_name'),array('class'=>'form-control','placeholder'=>'account name'))}}
                    </div>
                    <br>

                    <div class="control-group">
                        {{ Form::label('description','Give a description of your account:') }}
                        {{Form::textarea('description',Input::old('description'),array('class'=>'ckeditor',))}}
                    </div>
                    <div class="control-group">
                        {{ Form::label('balance','Enter the initial account balance') }}
                        {{Form::text('balance',Input::old('balance'),array('class'=>'form-control','placeholder'=>'initial balance'))}}
                    </div>

                    <br>

                    <hr>
                    <br/>
                    {{ Form::submit('Update Account',array('class'=>'btn btn-success')) }}
                    {{ link_to_route('accounts.index','Cancel',null,array('class'=>'btn btn-warning')) }}
                    {{ Form::close() }}
                    <br>
                </div>
            </div>
        </div>
    </div>
@stop