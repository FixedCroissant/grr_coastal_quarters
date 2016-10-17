@extends('app')

@section('main-content')
@section('htmlheader_title')
    Status Change & Payment Info
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
<style>
    .light_red{
        background-color:#ff6666;
    }
</style>


<!--Main Heading of Page-->
    @section('contentheader_title')
    Status Change & Payment Information for CMAST Reservations
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
           &nbsp;<p>
            Please use this screen to generate a e-mail notifiying the guest of availability.
            <br/>
            When the status is changed from "New" to "Pending Payment", they will be sent a e-mail in order to process payment.

            </p>
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

            <table class="table table-condensed">
                <tr class="light_red">
                    <td colspan="2">
                        <h4>Cost Information</h4>
                    </td>
                </tr>
            {!! Form::open(array('route'=>array('reservation.updateChargesPOST',$reservations->id))) !!}
            <!--Room Charges-->
                <!--Note to user-->
                <tr>
                    <td>
                        <h5>Step 1: Set Room Charges</h5>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        Room Charges
                    </td>
                    <td>
                        {!! Form::number('days',$reservations->room_days) !!} days @ 40.00/day = {!! Form::number('totalRoomCharges',$reservations->roomcharge,array('placeholder'=>'Save to See Charge')) !!}
                    </td>
                </tr>
                <!--Additional Rooms-->
                <tr>
                    <td>
                        Additional Rooms(s)
                    </td>
                    <td>
                        {!! Form::number('additionalRoomsDaysNeeded',$reservations->addguestdays) !!} days @ 40.00/day = {!! Form::number('totalAdditionalRoomCharges',$reservations->add_guest_charge,array('placeholder'=>'Save to See Charge')) !!}
                    </td>
                </tr>
                <!--End additional rooms-->
                <!--Grand Total-->
                <tr>
                    <td>
                        <STRONG>GRAND TOTAL:</STRONG>
                    </td>
                    <td>
                        <!--Show grand total number format with two-decimal places-->
                        $ {!! number_format($reservations->total_charge,2) !!}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <!--Add save button-->
                        {!! Form::submit('Save Room Charges',array('class'=>'btn btn-primary')) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            <!--End Cost Information-->
                <!--Start Change Status Information-->
                <tr>
                    <td colspan="2" class="light_red">
                        <h4> Change Status</h4>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h5>Step 2: Change Status to Pending Payment</h5>
                        <br/>
                        <p>
                            If there is <STRONG>NO</STRONG> room available, ignore Step #1 and set status to "Denied" and they will be notified via e-mail that no room is available.
                        </p>
                    </td>
                </tr>
                <!--Room Charges-->
                {!! Form::open(array('route'=>array('reservation.updateStatusPOST',$reservations->id))) !!}
                <tr>
                    <td>
                        Current Reservation Status
                    </td>
                    <td>
                        <?php
                        $statusValues = array(
                                'New'=>'New',
                                'PendingPmt'=>'Pending Payment',
                                'Denied'=>'Denied'
                        );
                        ?>

                        {!! Form::select('status',$statusValues,$reservations->status) !!}

                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        {!! Form::submit('Save Status',array('class'=>'btn btn-primary')) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        &nbsp;
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                    <h3>Reservation Details:</h3>
                    </td>
                </tr>

                <!--Additional Details on the Reservation-->
            <tr>
                    <td width="25%">
                        ID
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
                        {!! $reservations->f_name !!}
                    </td>
            </tr>
            <tr>
                    <td>
                        Guest Last Name
                    </td>
                    <td>
                        {!! $reservations->l_name !!}
                    </td>
            </tr>
            <tr>
                    <td>
                        Guest E-Mail
                    </td>
                    <td>
                        {!! $reservations->guest_email_address !!}
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
                        {!! $reservations->billing_first_name !!}
                    </td>
            <tr/>
            <tr>

                    <td>
                        Billing Last Name
                    </td>
                    <td>
                        {!! $reservations->billing_last_name !!}
                    </td>
            </tr>
            <tr>
                    <td>
                        Billing Address 1
                    </td>
                    <td>
                        {!! $reservations->billing_line_address_001 !!}
                    </td>
            </tr>
            <tr>
                    <td>
                        Billing Address 2
                    </td>
                    <td>
                        {!! $reservations->billing_line_address_002 !!}
                    </td>
            </tr>
            <tr>
                <td>
                    Billing City
                </td>
                <td>
                    {!! $reservations->billing_city !!}
                </td>
            </tr>
            <tr>
                <td>
                    Billing State
                </td>
                <td>
                    {!! $reservations->billing_state !!}
                </td>
            </tr>
            <tr>
                <td>
                    Billing Zip Code
                </td>
                <td>
                    {!! $reservations->billing_zip_code !!}
                </td>
            </tr>
            <tr>
                <td>
                    Billing E-Mail
                </td>
                <td>
                    {!! $reservations->billing_email_address !!}
                </td>
            </tr>
            <tr>
                <td>
                    Phone Number
                </td>
                <td>
                {!! $reservations->phone_number !!}
                </td>
            </tr>
                <tr>
                    <td colspan="2">
                        <h4 style="font-weight:bold;">Arrival Information</h4>
                    </td>
                </tr>
            <tr>
                <td>
                    Arrival Date <br/>
                    <span style="font-size:xx-small;">YYYY-MM-DD</span>
                </td>
                <td>
                    {!! $reservations->arrival_date !!}
                </td>
            </tr>
            <tr>
                <td>
                    Departure Date <br/>
                    <span style="font-size:xx-small;">YYYY-MM-DD</span>
                </td>
                <td>
                    {!! $reservations->departure_date !!}
                </td>
            </tr>
            <tr>
                <td>
                    # of Guests
                </td>
                <td>
                    {!! $reservations->number_of_guests !!}
                </td>
            </tr>
            <tr>
                <td>
                   Additional Information about Reservation
                </td>
                <td>
                    {!! $reservations->additional_information_about_reservation !!}
                </td>
            </tr>
            <!--Host Information-->
            <tr>
                <td colspan="2">
                    <h4 style="font-weight:bold;">Host Information</h4>
                </td>
            </tr>
            <tr>
                <td>
                    Host Name:
                </td>
                <td>
                    {!! $reservations->host_last_name !!}, {!! $reservations->host_first_name !!}
                </td>
            </tr>
            <tr>
                <td>
                    Host Title:<br/>
                </td>
                <td>
                    {!! $reservations->host_title !!}
                </td>
            </tr>
            <tr>
                <td>
                    Host Department
                </td>
                <td>
                    {!! $reservations->host_department_org !!}
                </td>
            </tr>
            <tr>
                <td>
                    Host Address
                </td>
                <td>
                    {!! $reservations->host_address_001 !!} <br/>
                    {!! $reservations->host_address_002 !!} <br/>
                    {!! $reservations->host_city !!} <br/>
                    {!! $reservations->host_state !!} <br/>
                </td>
            </tr>
            <tr>
                <td>
                    Host Phone Number:
                </td>
                <td>
                    {!! $reservations->host_phone_number !!}
                </td>
            </tr>
            <tr>
                <td>
                    Host E-Mail
                </td>
                <td>
                    {!! $reservations->host_email_address !!}
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <h4 style="font-weight:bold;">Payment Information</h4>
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
                    Agree To Terms?
                </td>
                <td>
                    {!! $reservations->terms !!}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    &nbsp;
                </td>
            </tr>
            </table>
        </div>
    </div>
@stop


@stop