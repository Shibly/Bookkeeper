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
                {{--<li><a href="#">Transfer</a></li>--}}
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