@extends('_master')

@section('title')
Edit Checkout
@stop

@section('content')

    <h1>Change Checkout End Date:</h1>

        @foreach($errors->all() as $message)
            <div class='error'>{{ $message }}</div>
        @endforeach

    <div class="container-fluid">
    <div class="row">
    <div class="col-md-6">


    @if( Auth::user()->is_admin || Auth::user()->id == $checkout->user_id )

    {{ Form::model($checkout, ['method' => 'put', 'action' => ['CheckoutController@update', $checkout->id]]) }}

    <div class="form-group">
        <div class='input-group date' id='datetimepicker1'>
            <input type='text' class="form-control"
                data-date-format="YYYY-MM-DD HH:mm:ss"
                value="{{ $checkout->end_time }}" name="end_time" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>

    <br>

    {{ Form::submit('Change End Date') }}
    {{ Form::close() }}

    {{ Form::open(['method' => 'DELETE', 'action' => ['CheckoutController@destroy', $checkout->id]]) }}

        {{ Form::submit('Check Item In') }}

    {{ Form::close() }}

    </div><!--end col-md-6-->
    </div><!--end row-->
    </div> <!--end container-fluid-->

    @else

    <p>You are not authorized to edit this checkout.</p>

    <p><a href="/checkout">Back to Checkouts List</a></p>

    @endif

@stop

@section('footer')
    <p>This page uses
        <a href="http://momentjs.com/" target="_blank">Moment.js</a> and
        <a href="https://github.com/Eonasdan/bootstrap-datetimepicker"
        target="_blank">Eonasdan's Bootstrap Date/Time Picker</a></p>
@stop

@section('scripts')

    <!-- Date-time picker Javascript -->
    <script src="/js/bootstrap-datetimepicker.min.js"></script>

	<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                	useSeconds: false,
                	minuteStepping: 15,
                	defaultTime: moment("{{ $checkout->end_time }}")
                });
            });
    </script>

@stop
