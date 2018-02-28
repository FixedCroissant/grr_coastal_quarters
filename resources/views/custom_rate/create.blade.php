@extends('layout.app')
@section('main-content')
@section('htmlheader_title')
   Create New Rate
@endsection

<!--Main Heading of Page-->
    @section('contentheader_title')
    Current Custom Rate for CMAST System
    <br/>
    @stop
<!--Description of Page-->
    @section('contentheader_description')
    -
    @stop
<!--End Description of Page-->
<!--Messages Page-->
    <div class="row">
        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
    </div>
<!--Errors Page-->
    <div class="row">
        @if($errors->has())
            <div class="col-md-12 alert-danger">
                <h4><STRONG>Whoops!</STRONG> There appears to be problems with your reservation.</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            <div>{{ $error }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            Create a New Custom Rate for use at Coastal Quarters:
            <br/>
            Please note that only 1 rate can be active at a time.

                {!! Form::open(array('route' => 'customRate.store')) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('Rate Name:') !!}
                            {!! Form::text('custom_rate_name',null) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Amount:') !!}
                            {!! Form::number('amount',null) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    &nbsp;<div class="form-group">
                        {!! Form::label('Is This Per Person or Per Unit:') !!}
                        Per Person:
                        {!! Form::radio('rate_room_person', 'person', true) !!}
                        <br/>
                        Per Room:
                        {!! Form::radio('rate_room_person', 'unit') !!}
                        <br/>

                    </div>
                </div>
                <div class ="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('Active:') !!}
                            {!! Form::text('active',null) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::submit('Create Rate') !!}
                    </div>
                </div>
                {!! Form::close() !!}
        </div>
    </div>
    <!--Blank row-->
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
@stop


@stop