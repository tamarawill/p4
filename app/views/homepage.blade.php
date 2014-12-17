@extends('_master')

@section('title')
    Home
@stop

@section('content')

	<h1>SharedStuff Home</h1>

    @if( Auth::check())

        <h2>Your Checkouts:</h2>

        <table class="table">
            <tr>
                <th>
                    Item
                </th>
                <th>
                    Checked out at
                </th>
                <th>
                    Will return at
                </th>
                <th>
                    Checkout Details
                </th>
            </tr>

        @foreach($mycheckouts as $checkout)
            <tr>
                <td>
                    <a href="/item/{{ $checkout->item_id }}">{{ $checkout->getItemName() }}</a>
                </td>
                <td>
                    {{ Checkout::shortDate( $checkout->start_time) }}
                </td>
                <td>
                    {{ Checkout::shortDate( $checkout->end_time) }}
                </td>
                <td>
                    <a href="/checkout/{{ $checkout->id }}">View Details</a>
                </td>
            </tr>
        @endforeach
        </table>


    @else

        <p>To view the awesome stuff herein, you must <a href="/login">log in</a>.</p>

    @endif

@stop