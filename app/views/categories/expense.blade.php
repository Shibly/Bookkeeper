{{--D:\xampp\htdocs\BookKeeper\app/views/categories/expense.blade.php--}}

@extends('layouts.admin')
@section('title')
    Expense
@stop
@section('content')
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Add New Expense Category</h3>
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
                    {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Expense Name'))}}
                    {{ Form::hidden('type','Expense') }}
                </div>
                <br/>
                {{ Form::submit('Create expense category',array('class'=>'btn btn-success')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">List Of Expenses</h3>
            </div>
            @if($expenses->count())
                <div class="box-body">
                    <table class="table table-bordered">
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
                                <td>
                                    {{ link_to_route('editCategory','Edit',array($exp->id),array('class'=>'btn btn-warning fa fa-edit')) }}
                                </td>
                                <td>
                                    {{ Form::open(array('method'=>'get','route'=>array('deleteCategory',$exp->id))) }}
                                    {{ Form::submit('Delete',array('class'=>'btn btn-danger fa fa-minus')) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>

            @else
                <div class="alert alert-info col-md-4" style="margin-top: 15px;">
                    No expense found. Please create one.
                </div>
            @endif
        </div>
    </div>
@stop
