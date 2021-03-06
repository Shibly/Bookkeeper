{{--D:\xampp\htdocs\BookKeeper\app/views/payers/index.blade.php--}}


@extends('layouts.admin')
@section('title')
    Payer Name
@stop
@section('content')
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Add Payers</h3>
            </div>
            <div class="box-body">
                {{ Form::open(array('route'=>'payers.store')) }}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ implode('',$errors->all('<li class="error">:message</li>')) }}
                    </div>
                @endif

                <div class="control-group">
                    {{ Form::label('name','Payer Name:') }}
                    {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Name'))}}
                </div>
                <br/>
                {{ Form::submit('Add Payer',array('class'=>'btn btn-success')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Manage Payers</h3>
            </div>
            @if($payers->count())
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payers as $method )
                            <tr>

                                <td>{{ $method->name }}</td>
                                <td>{{ link_to_route('payers.edit','Edit',array($method->id),array('class'=>'btn btn-warning')) }}</td>
                                <td>
                                    {{ Form::open(array('method'=>'DELETE','route'=>array('payers.destroy',$method->id))) }}
                                    {{ Form::submit('Delete',array('class'=>'btn btn-danger')) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>

            @else
                <div class="alert alert-info col-md-4" style="margin-top: 15px;">
                    No payees right now
                </div>
            @endif
        </div>
    </div>
@stop