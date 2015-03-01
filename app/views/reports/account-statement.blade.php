{{--D:\xampp\htdocs\BookKeeper\app/views/reports/accountstatement.blade.php--}}

@extends('layouts.admin')
@section('title')
    Account Statement
@stop
@section('content')
    <div class="col-md-6">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">View Statements</h3>
                </div>
                <div class="box-body">
                    {{ Form::open(array('route'=>'postStatement')) }}
                    <div class="control-group">
                        {{ Form::label('name','Account') }}
                        {{Form::select('account_name',array('default' => 'Please Select') + $accounts, 'default')}}
                    </div>
                    <br/>

                    <div class="control-group">
                        {{ Form::label('from','From Date:') }}
                        {{Form::text('from','',array('class'=>'form-control','placeholder'=>'Date','data-beatpicker'=>'true',' data-beatpicker-position'=>'['*','*']','data-beatpicker-format'=>"['YYYY','MM','DD'],separator:'/'",'data-beatpicker-module'=>"gotoDate"))}}
                    </div>
                    <br/>

                    <div class="control-group">
                        {{ Form::label('to','To Date:') }}
                        {{Form::text('to','',array('class'=>'form-control','placeholder'=>'Date','data-beatpicker'=>'true',' data-beatpicker-position'=>'['*','*']','data-beatpicker-format'=>"['YYYY','MM','DD'],separator:'/'",'data-beatpicker-module'=>"gotoDate"))}}
                    </div>
                    <br/>

                    <div class="control-group">
                        {{ Form::label('type','Type') }}
                        {{Form::select('account-type',array('all-transactions'=>'All Transactions', 'debit' => 'Debit','credit'=>'Credit') , 'all-transactions')}}
                    </div>
                    <br/>
                    {{ Form::submit('View Statement',array('class'=>'btn btn-success')) }}
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
@stop