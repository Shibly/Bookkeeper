{{--D:\xampp\htdocs\BookKeeper\app/views/transactions/create.blade.php--}}


@extends('layouts.admin')
@section('title')
    Add Deposit
@stop
@section('content')
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Add Deposit</h3>
            </div>
            <div class="box-body">
                {{ Form::open(array('route'=>'transactions.store')) }}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ implode('',$errors->all('<li class="error">:message</li>')) }}
                    </div>
                @endif

                <div class="control-group">
                    {{ Form::label('account','Account:') }}
                    {{Form::select('account',array('default' => 'Please Select') + $accounts, 'default')}}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('date','Date:') }}
                    {{Form::text('date','',array('class'=>'form-control','placeholder'=>'Date','data-beatpicker'=>'true',' data-beatpicker-position'=>'['*','*']','data-beatpicker-format'=>"['YYYY','MM','DD'],separator:'/'",'data-beatpicker-module'=>"gotoDate"))}}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('amount','Amount') }}
                    {{ Form::text('amount','',array('class'=>'form-control','placeholder'=>'amount')) }}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('payee','Payee:') }}
                    {{Form::select('Payee',array('default' => 'Please Select') + $payers, 'default')}}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('category','Category') }}
                    {{ Form::select('category', array('default' => 'Please Select') + $incomes, 'default') }}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('method','Method') }}
                    {{ Form::select('method', array('default' => 'Please Select') + $methods, 'default') }}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('reference','Ref #') }}
                    {{ Form::text('ref','',array('class'=>'form-control','placeholder'=>'ref')) }}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('description','Description') }}
                    {{ Form::text('description','',array('class'=>'form-control','placeholder'=>'description')) }}
                </div>
                <br/>
                {{ Form::submit('Add Deposit',array('class'=>'btn btn-success')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop