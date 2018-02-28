@extends('layout.app')

@section('main-content')
@section('htmlheader_title')
    Edit Reservation
@endsection

<!--Back button-->
<div class="row">
    <div class="col-md-12">
        <a href="{{Request::root()}}/reservation">Back</a>
    </div>
</div>
<!--End Back button-->
<br/>
<br/>
<br/>
<br/>

<!--Main Heading of Page-->
    @section('contentheader_title')
    Edit Reservation for CMAST
    <br/>
    @stop
<!--Description of Page-->
    @section('contentheader_description')

    @stop
<!--End Description of Page-->
<!--Breadcrumb-->
@section('breadCrumb')
    <li class="active">Here</li>
@stop

    <br/>
    <br/>

    <div class="row">
        <div class="col-md-12">
           &nbsp;
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>


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
    <br/>
    <br/>
    <br/>
    <div class="row">
        <div class="col-md-12">

            {!! Form::model($reservations, array('route' => array('reservation.update', $reservations->id),'method'=>'PUT')) !!}

            <table class="table table-condensed">
            <tr>
                    <td width="25%">
                        ID <br/>
                        <span style="font-size:xx-small;">Not editable</span>
                    </td>
                    <td width="75%">
                        {{$reservations->id}}
                    </td>
            </tr>
            <tr>
                    <td colspan="2">
                        <h4>Guest Information</h4>
                    </td>
            </tr>
            <tr>
                    <td>
                        Guest First Name
                    </td>
                    <td>
                        {!! Form::text('f_name',$reservations->f_name,array()) !!}
                    </td>
            </tr>
            <tr>
                    <td>
                        Guest Last Name
                    </td>
                    <td>
                        {!! Form::text('l_name',$reservations->l_name,array()) !!}
                    </td>
            </tr>
            <tr>
                    <td>
                        Guest E-Mail
                    </td>
                    <td>
                        {!! Form::text('guest_email_address',$reservations->guest_email_address,array()) !!}
                    </td>
            </tr>
            <tr>
                    <td colspan="2">
                        <h4>Billing Information</h4>
                    </td>
            </tr>
            <tr>

                    <td>
                        Billing First Name
                    </td>
                    <td>
                        {!! Form::text('billing_first_name',$reservations->billing_first_name,array()) !!}
                    </td>
            <tr/>
            <tr>

                    <td>
                        Billing Last Name
                    </td>
                    <td>
                        {!! Form::text('billing_last_name',$reservations->billing_last_name,array()) !!}
                    </td>
            </tr>
            <tr>
                    <td>
                        Billing Address 1
                    </td>
                    <td>
                        {!! Form::text('billing_line_address_001',$reservations->billing_line_address_001,array()) !!}
                    </td>
            </tr>
            <tr>
                    <td>
                        Billing Address 2
                    </td>
                    <td>
                        {!! Form::text('billing_line_address_002',$reservations->billing_line_address_002,array()) !!}
                    </td>
            </tr>
            <tr>
                <td>
                    Billing City
                </td>
                <td>
                    {!! Form::text('billing_city',$reservations->billing_city,array()) !!}
                </td>
            </tr>
            <tr>
                <td>
                    Billing State
                </td>
                <td>
                    {!! Form::text('billing_state',$reservations->billing_state,array()) !!}
                </td>
            </tr>
            <tr>
                <td>
                    Billing Zip Code
                </td>
                <td>
                    {!! Form::text('billing_zip_code',$reservations->billing_zip_code,array()) !!}
                </td>
            </tr>
            <tr>
                <td>
                    Billing E-Mail
                </td>
                <td>
                    {!! Form::text('billing_email_address',$reservations->billing_email_address,array()) !!}
                </td>
            </tr>
            <tr>
                <td>
                    Phone Number
                </td>
                <td>
                {!! Form::text('phone_number',$reservations->phone_number,array()) !!}
                </td>
            </tr>
                <tr>
                    <td colspan="2">
                        <h4>Arrival Information</h4>
                    </td>
                </tr>
            <tr>
                <td>
                    Arrival Date <br/>
                    <span style="font-size:xx-small;">YYYY-MM-DD</span>
                </td>
                <td>
                    {!! Form::text('arrival_date',$reservations->arrival_date,array()) !!}
                </td>
            </tr>
            <tr>
                <td>
                    Departure Date <br/>
                    <span style="font-size:xx-small;">YYYY-MM-DD</span>
                </td>
                <td>
                    {!! Form::text('departure_date',$reservations->departure_date,array()) !!}
                </td>
            </tr>
            <tr>
                <td>
                    # of Guests
                </td>
                <td>
                    {!! Form::selectRange('number_of_guests',0,20,$reservations->number_of_guests,array()) !!}
                </td>
            </tr>
            <tr>
                <td>
                   Additional Information about Reservation
                </td>
                <td>
                    {!! Form::textarea('additional_information_about_reservation',$reservations->additional_information_about_reservation,array('rows'=>'2')) !!}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Payment Information
                </td>
            </tr>
            <tr>
                <td>
                    Who Pays
                </td>
                <td>
                    {!! Form::text('who_pays',$reservations->who_pays,array()) !!}
                </td>
            </tr>
            <tr>
                <td>
                    OUC
                </td>
                <td>
                    {!! Form::text('ouc',$reservations->ouc,array()) !!}
                </td>
            </tr>
            <tr>
                <td>
                    Project Grant #
                </td>
                <td>
                    {!! Form::text('projgrant',$reservations->projgrant) !!}
                </td>
            </tr>
            <tr>
                <td>
                    Bookkeeper Information
                </td>
                <td>
                    {!! Form::text('bookkeeper',$reservations->bookkeeper) !!}
                </td>
            </tr>
            <tr>
                <td>
                    Agree To Terms? <br/>
                    <span style="font-size:xx-small;">Not editable</span>
                </td>
                <td>
                    {!! $reservations->terms !!}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    {!! Form::submit('Update & Save') !!}
                </td>
            </tr>
            {!! Form::close()!!}
            </table>
        </div>
    </div>
@stop


@stop