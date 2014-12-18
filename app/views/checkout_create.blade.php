@extends('_master')

@section('title')
Check out an item
@stop

@section('content')

    <h1>Check Out an Item:</h1>

    @foreach($errors->all() as $message)
        <div class='error'>{{ $message }}</div>
    @endforeach

    <div class="container-fluid">
    <div class="row">
    <div class="col-md-6">

    {{ Form::open(array('action' => 'CheckoutController@store')) }}

     <div class='form-group'>
        {{ Form::label('item_id','Item') }}
        {{ Form::select('item_id', $items) }}
     </div>

    <div class="form-group">
        <div class='input-group date' id='datetimepicker1'>
            <input type='text' class="form-control"
                data-date-format="YYYY-MM-DD HH:mm:ss" name="end_time" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>


    <br>

    {{ Form::hidden('userid', $userid) }}

    {{ Form::submit('Check It Out!') }}
    {{ Form::close() }}

    </div><!--end col-md-6-->
    </div><!--end row-->
    </div> <!--end container-fluid-->
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
                	useCurrent: true
                });
            });
    </script>

@stop