{{--D:\xampp\htdocs\BookKeeper\app/views/payees/index.blade.php--}}


@extends('layouts.admin')
@section('title')
    Payment Methods
@stop
@section('content')
    <div class="col-md-6">
        <p class="bg-success" style="padding: 15px;">Add payee</p>
        {{ Form::open(array('route'=>'payees.store')) }}
        @if($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('',$errors->all('<li class="error">:message</li>')) }}
            </div>
        @endif

        <div class="control-group">
            {{ Form::label('name','Payee name:') }}
            {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Name'))}}
        </div>
        <br/>
        {{ Form::submit('Create',array('class'=>'btn btn-success')) }}
        {{ Form::close() }}
    </div>


    <div class="col-md-6">
        <p class="bg-success" style="padding: 15px;">Manage payees</p>
        @if($payees->count())
            <br/>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payees as $method )
                    <tr>

                        <td>{{ $method->name }}</td>
                        <td>{{ link_to_route('payees.edit','Edit',array($method->id),array('class'=>'btn btn-warning')) }}</td>
                        <td>
                            {{ Form::open(array('method'=>'DELETE','route'=>array('payees.destroy',$method->id))) }}
                            {{ Form::submit('Delete',array('class'=>'btn btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        @else
            <div class="alert alert-info col-md-4" style="margin-top: 15px;">
                No payees right now
            </div>
        @endif
    </div>
@stop