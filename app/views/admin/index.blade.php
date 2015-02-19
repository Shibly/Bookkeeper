@extends('layouts.admin')

@section('Admin Area')
@stop
@section('content')
    <div class="row alert alert-info">
        <div class="col-lg-12">
            <h2 class="text-center">Welcome {{ ucwords(Auth::user()->username) }}</h2>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-lg-3">
            <div class="expense" style="background-color: #337ab7;">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-plus fa-3x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Income Today </span>
                        <h4 class="font-bold text-white"> 0.00</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="expense" style="background-color: #5cb85c;">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-minus fa-3x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Expense Today </span>
                        <h4 class="font-bold text-white"> 0.00</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="expense" style="background-color: #5bc0de;">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-plus fa-3x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Income This Month </span>
                        <h4 class="font-bold text-white"> 27,000.00</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="expense" style="background-color: #d9534f;">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-minus fa-3x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Expense This Month </span>
                        <h4 class="font-bold text-white"> 2,000.00</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row top-buffer">

        <div class="widget-1 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Financial Balances</h3>

                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Account</th>
                            <th class="text-right">Balance</th>
                        </tr>
                        <tr>
                            <td>Savings account</td>
                            <td class="text-right"><span> 16,000.00</span></td>
                        </tr>
                        <tr>
                            <td>Petty Cash</td>
                            <td class="text-right"><span> 9,000.00</span></td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Widget-1 end-->

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Income Vs Expense (February 2015)</h3>
                </div>
                <div class="panel-body">
                    <div id="income-vs-expense">
                        <div id="canvas-holder">
                            <canvas id="chart-area"/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Widget-2 end-->
    </div>


@stop