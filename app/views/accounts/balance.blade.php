{{--D:\xampp\htdocs\BookKeeper\app/views/accounts/balance.blade.php--}}

@extends('layouts.admin')
@section('content')
    @if($balance->count())

        <br/>
        <div class="col-md-12">

            <table class="table table-bordered table-striped">

                <tbody>
                <tr>
                    <th>Account</th>
                    <th class="text-right">Balance</th>
                </tr>
                @foreach($balance as $b )
                    <tr>

                        <td class="left">{{ $b->account_name }}</td>
                        <td class="text-right">{{ $b->balance }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td><strong>Total:</strong></td>
                    <td class="text-right"><strong><span>{{ $sum .'.00'}}</span></strong></td>
                </tr>
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info col-md-4" style="margin-top: 15px;">
            No accounts found. Please create one.
        </div>
    @endif
@stop