{{--D:\xampp\htdocs\BookKeeper\app/views/categories/income.blade.php--}}


@extends('layouts.admin')
@section('title')
    Income
@stop
@section('content')
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Create a New Income Category</h3>
            </div>
            <div class="box-body">
                {{ Form::open(array('route'=>'postCategory')) }}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ implode('',$errors->all('<li class="error">:message</li>')) }}
                    </div>
                @endif

                <div class="control-group">
                    {{ Form::label('name','Expense category name:') }}
                    {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Income Name'))}}
                    {{ Form::hidden('type','Income') }}
                </div>
                <br/>
                {{ Form::submit('Create income category',array('class'=>'btn btn-success')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">List Of Incomes</h3>
            </div>
            @if($incomes->count())
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
                        @foreach($incomes as $inc )
                            <tr>

                                <td>{{ $inc->name }}</td>
                                <td>{{ link_to_route('editCategory','Edit',array($inc->id),array('class'=>'btn btn-warning')) }}</td>
                                <td>
                                    {{ Form::open(array('method'=>'get','route'=>array('deleteCategory',$inc->id))) }}
                                    {{ Form::submit('Delete',array('class'=>'btn btn-danger')) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>

            @else
                <div class="alert alert-info col-md-10" style="margin-top: 15px;">
                    No income category found. Please create one.
                </div>
            @endif
        </div>
    </div>
@stop