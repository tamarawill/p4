@extends('_master')

@section('title')
    Checkout List
@stop

@section('content')

    <h1>Items Currently Checked Out</h1>

    <p><a href="/checkout/create" class="btn btn-primary">Check Out an Item</a></p>

        <div class="table-responsive">

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
                        User
                    </th>
                    <th>
                        Checkout Details
                    </th>
                </tr>

            @foreach($checkouts as $checkout)
                <tr>
                    <td>
                        <a href="/item/{{ $checkout->item_id }}">{{ $checkout->getItemName() }}</a>
                    </td>
                    <td>
                        {{ Checkout::shortDate( $checkout->start_time ) }}
                    </td>
                    <td>
                        {{ Checkout::shortDate( $checkout->end_time ) }}
                    </td>
                    <td>
                        <a href="/user/{{ $checkout->user_id }}">{{ $checkout->getUserName() }}</a>
                    </td>
                    <td>
                        <a href="/checkout/{{ $checkout->id }}" class="btn btn-default btn-sm">View Details</a>
                    </td>
                </tr>
            @endforeach
            </table>
        </div> <!--table-responsive-->


@stop

