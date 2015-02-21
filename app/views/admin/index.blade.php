@extends('layouts.admin')

@section('title')
    Admin Area
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h2 class="box-title">Welcome {{ ucwords(Auth::user()->username) }}</h2>
                </div>
                <div class="box-body"></div>
            </div>
        </div>
    </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        {{ $income_today }} BDT
                    </h3>

                    <p>
                        Income Today
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        {{ $expense_today }} BDT
                    </h3>

                    <p>
                        Expense Today
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        {{ $monthly_income }} BDT
                    </h3>

                    <p>
                        Income This Month
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        {{ $monthly_expense }} BDT
                    </h3>

                    <p>
                        Expense This Month
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row top-buffer">

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Financial Accounts And Balances</h3>


                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Account</th>
                            <th class="text-right">Balance</th>
                        </tr>
                        @foreach($accounts as $account)
                            <tr>
                                <td>{{ $account->account_name }}</td>
                                <td class="text-right"><span> {{ $account->balance }}</span></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Widget-1 end-->

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Income Vs Expense (February 2015)</h3>
                </div>
                <div class="box-body">
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
    <script>
        var doughnutData = [
            {
                value: {{json_encode($monthly_expense)}},
                color: "#c91b26",
                highlight: "#FF5A5E",
                label: "Expense"
            },
            {
                value: {{json_encode($monthly_income)}},
                color: "#5bc0de",
                highlight: "#FFC870",
                label: "Income"
            },
        ];

        window.onload = function () {
            var ctx = document.getElementById("chart-area").getContext("2d");
            window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive: true});
        };
    </script>
@stop