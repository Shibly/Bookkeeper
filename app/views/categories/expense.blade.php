{{--D:\xampp\htdocs\BookKeeper\app/views/categories/expense.blade.php--}}

@extends('layouts.admin')
@section('content')
    <div class="col-md-6">
        <p class="bg-success" style="padding: 15px;">Create a new expense category</p>
        {{ Form::open(array('route'=>'postCategory')) }}
        @if($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('',$errors->all('<li class="error">:message</li>')) }}
            </div>
        @endif

        <div class="control-group">
            {{ Form::label('name','Expense category name:') }}
            {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Expense Name'))}}
            {{ Form::hidden('type','Expense') }}
        </div>
        <br/>
        {{ Form::submit('Create expense category',array('class'=>'btn btn-success')) }}
        {{ Form::close() }}
    </div>


    <div class="col-md-6">
        <p class="bg-success" style="padding: 15px;">List of expenses</p>
        @if($expenses->count())
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
                @foreach($expenses as $exp )
                    <tr>

                        <td>{{ $exp->name }}</td>
                        <td>{{ link_to_route('editCategory','Edit',array($exp->id),array('class'=>'btn btn-warning')) }}</td>
                        <td>
                            {{ Form::open(array('method'=>'get','route'=>array('deleteCategory',$exp->id))) }}
                            {{ Form::submit('Delete',array('class'=>'btn btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        @else
            <div class="alert alert-info col-md-4" style="margin-top: 15px;">
                No expense found. Please create one.
            </div>
        @endif
    </div>
@stop
