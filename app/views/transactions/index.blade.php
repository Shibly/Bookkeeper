{{--D:\xampp\htdocs\BookKeeper\app/views/transactions/index.blade.php--}}

@extends('layouts.admin')
@section('title')
    Transactions History
@stop
@section('content')

    <div class="col-md-12">
        {{ link_to_route('accounts.create','Create a new account',null,array('class'=>'btn btn-primary')) }}
    </div>

    <div class="col-md-12" style="margin-top: 20px;">
        <p class="bg-success" style="padding: 15px;"><strong>Transactions history</strong></p>
    </div>
    @if($transactions->count())

        <br/>
        <div class="col-md-12">

            <table class="table table-bordered table-striped">
                <thead>
                <tr class="center-text">
                    <th style="width: 9%;">Date</th>
                    <th>Account</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Payer</th>
                    <th>Payee</th>
                    <th>Method</th>
                    <th>Ref</th>
                    <th>Description</th>
                    <th>Dr.</th>
                    <th>Cr.</th>
                    <th>Balance</th>
                </tr>
                </thead>
                <tbody class="center-text">
                @foreach($transactions as $transaction )
                    <tr>

                        <td>{{ $transaction->date }}</td>
                        <td>{{ $transaction->account  }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->category }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->payer }}</td>
                        <td>{{ $transaction->payee }}</td>
                        <td>{{ $transaction->method }}</td>
                        <td>{{ $transaction->ref }}</td>
                        <td>{{ $transaction->description }}</td>
                        <td>{{ $transaction->dr }}</td>
                        <td>{{ $transaction->cr }}</td>
                        <td>{{ $transaction->bal }}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info col-md-4" style="margin-top: 15px;">
            No transactions are found.
        </div>
    @endif

@stop