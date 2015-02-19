<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <!-- The google font -->
    {{--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>--}}
    {{--<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>--}}
    <!-- Bootstrap core CSS -->
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/font-awesome.css')}}

    <!-- Add custom CSS here -->
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/BeatPicker.min.css') }}


</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ HTML::link('admin', 'Book-Keeper', array('class' => 'navbar-brand')) }}
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Accounts
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>{{ link_to_route('accounts.index','Manage accounts') }}</li>
                        <li>{{ link_to_route('balance','Account balance') }}</li>
                        <li>{{ link_to_route('accounts.create','Add an account') }}</li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Transactions
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>{{ link_to_route('transactions.create','Add Deposit') }}</li>
                        <li>{{ link_to_route('expenses','Add Expense') }}</li>
                        <li><a href="#">Transfer</a></li>
                        <li>{{ link_to_route('transactions.index','View Transactions') }}</li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reports
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Account Statement</a></li>
                        <li><a href="#">Reports By Date</a></li>
                        <li><a href="#">Income Reports</a></li>
                        <li><a href="#">Expense Reports</a></li>
                        <li><a href="#">Income Vs Expense</a></li>
                        <li><a href="#">Reports By Categories</a></li>
                        <li><a href="#">Reports By Payees</a></li>
                        <li><a href="#">Reports By Payers</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Settings
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>{{ link_to_route('expense','Expense Categories') }}</li>
                        <li>{{ link_to_route('income','Income Categories') }}</li>
                        <li>{{ link_to_route('payees.index','Payees') }}</li>
                        <li>{{ link_to_route('payers.index','Payers') }}</li>
                        <li>{{ link_to_route('methods.index','Payment Methods') }}</li>
                        <li><a href="#">Users</a></li>
                        <li><a href="#">Application Settings</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false"> Welcome {{ Auth::user()->username }} !
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>{{ link_to('editUser','Edit Profile') }}</li>
                        <li>{{ HTML::link('logout', 'Logout') }}</li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                @yield('content')
            </div>
        </div>


    </div>
</div>
@include('partials.footer')

<!-- /.container -->

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Make sure to add jQuery - download the most recent version at http://jquery.com/ -->
{{ HTML::script('/js/jquery-2.1.3.min.js')}}
{{ HTML::script('/js/BeatPicker.min.js')}}
{{ HTML::script('/js/Chart.min.js') }}
{{ HTML::script('/js/scripts.js')}}
{{ HTML::script('/js/bootstrap.min.js')}}
{{ HTML::script('/ckeditor/ckeditor.js')}}
</body>
</html>