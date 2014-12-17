@extends('_master')

@section('title')
    Home
@stop

@section('content')

	<h1>SharedStuff Home</h1>

    @if( Auth::check())

        <h2>Your Checkouts:</h2>

        <p><a href="/checkout/create" class="btn btn-primary">Check Out an Item</a></p>

        <table class="table table-striped">
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
                <th>
                    Check In
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
                        <a href="/checkout/{{ $checkout->id }}" class="btn btn-default btn-sm">View Details</a>

                </td>
                <td>
                        {{ Form::open(['method' => 'DELETE', 'action' => ['CheckoutController@destroy', $checkout->id]]) }}
                        <input type="submit" class="btn btn-default btn-sm" value="Check Item In">

                </td>
            </tr>
        @endforeach
        </table>


    @else

        <p>To view the awesome stuff herein, you must <a href="/login">log in</a>.</p>

    @endif

@stop