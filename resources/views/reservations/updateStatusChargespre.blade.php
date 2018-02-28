@extends('layout.app')

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
    .custom-rate{
        border:1px solid black;
        background-color: yellow;
    }
    .none{
        display:none;
    }
</style>

<!--Runs at the bottom of the page-->
@section('custom-scripts')
<script>
    $(document).ready(function(){
        //Rate Set
        var rate = null;

        //START
        $('.rate_options').change(function (){
            //Handle different radio buttons selected.
            //working
            //alert('you changed the rate format.');

            //Get Total Number of Rooms Indicated By The User on the front page.
            var indicatedNumberOfRooms = $('#totalNumberOfRoomsIndicated').text().valueOf();
            var indicatedNumberOfGuests = $('#totalGuestsIndicated').text().valueOf();

            //Check radio button.
            //Workings
            //Less Than or Equal Four Nights
            if($('#under_or_at_four_nights').is(":checked")){
                //alert('You selected under or at four nights.');
                rate = 125*indicatedNumberOfRooms;
                //Set The Rate on the Front.
                $('#rateShownOnPage').text('$125/night per unit/room');
                //Hide Custom Rate Info box.
                $('#custom-rate-infobox').hide();
            }
            //Greater Than Four Nights
            else if($('#greater_than_four_nights').is(":checked")){
                rate = 35*indicatedNumberOfGuests;
                //Set The Rate on the Front.
                $('#rateShownOnPage').text('$35/night per person');
                //Hide Custom Rate Info box.
                $('#custom-rate-infobox').hide();

            }
            //Set Custom Rate
            else{
                //alert('you want to be able to achieve a custom rate, dont you?');
                //Show the current custom rate now.
                $('#custom-rate-infobox').show();
                rate = $('#custom-rate-amount').text().valueOf();

            }



            //rateShownOnPage
            // $('#rateShownOnPage').text('newRate here');
        });
        //END


        //Room Charge Total
        var roomChargeTotal = $('#roomChargeTotal');
        //Total Nights Provided by the User
        var totalNightsIndicated = $('#totalNightsIndicated');
        //Total Guests Indicated
        var totalGuestsIndicated = $('#totalGuestsIndicated').val();
        //Standard Rate per night $35.00
        //var rate = 35;
        //The Value that is saved night to GRAND TOTAL
        var grandTotal_INPUT_VALUE = $('#grandTOTALTODISPLAY');


        //When the Input Changes automatically calculate the value.
        $(totalNightsIndicated).on('input', function() {

            //Check if radio button is selected for a rate.
            //if($('#under_or_at_four_nights').not(":checked")||$('#greater_than_four_nights').not(":checked")||$('#custom_rate').not(":checked")){
                    //alert('Please select a rate amount before you start, it appears none are selected.');
            //}
            //End

            // do something
            //Get value of total nights indicated
            var totalNightsIndicatedVALUE = totalNightsIndicated.val();
            //Calculate total
            //var totalCharge = totalNightsIndicatedVALUE*totalGuestsIndicated*rate;

            var totalCharge = totalNightsIndicatedVALUE*rate;

            //Assign the new value in the equal block.
            roomChargeTotal.val(totalCharge);
            //Update the value shown next to the "GRAND TOTAL" block.
            //TWO DECIMAL PLACES
            grandTotal_INPUT_VALUE.val(totalCharge+'.00');

        });
    });
</script>
@endsection


<!--Main Heading of Page-->
    @section('contentheader_title')
    Status Change & Payment Information for Coastal Quarters Reservations
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
            Please use this screen to generate a e-mail notifying the guest of availability.
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
                <!--Room Charges-->
                <!--ROom Status Change-->
            {!! Form::open(array('route'=>array('reservation.updateStatusPOST',$reservations->id))) !!}
            <!--Room Charges-->
                <!--Note to user-->
                <tr>
                    <td>
                       &nbsp;
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        Total Guests Indicated:
                    </td>
                    <td>
                        {{$reservations->number_of_guests}}
                        {!!Form::hidden('number_of_guests',$reservations->number_of_guests,array('id'=>'totalGuestsIndicated'))  !!}
                    </td>
                </tr>
                <tr>
                    <td>
                        Arrival Date:
                    </td>
                    <td>
                        {{$reservations->arrival_date}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Departure Date:
                    </td>
                    <td>
                        {{$reservations->departure_date}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Total Days
                    </td>
                    <td>
                        <?php
                        $arrival = new Carbon($reservations->arrival_date);
                        $departure = new Carbon($reservations->departure_date);
                        $difference = ($arrival->diff($departure)->days < 1)
                            //IF NO DIFFERENCE
                                ? 'No difference in days'
                                : $arrival->diffInDays($departure);
                        ?>
                        {{$difference}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Total Units/Rooms
                    </td>
                    <td>
                        <span id="totalNumberOfRoomsIndicated">{{$reservations->number_of_rooms}}</span>
                    </td>
                </tr>
                <tr class="rate-important">
                    <td>
                        On this cost calculation, what charge would you like to use?
                    </td>
                    <td>
                        {!! Form::radio('rate_option','under_or_at_four_nights',null,array('id'=>'under_or_at_four_nights','class'=>'rate_options')) !!}  Under or at 4 nights ($125/night <strong>per</strong> unit.)
                        <br/>
                        {!! Form::radio('rate_option','greater_than_four_nights',null,array('id'=>'greater_than_four_nights','class'=>'rate_options')) !!}  Greater than 4 nights ($35/night <strong>per</strong> person.)
                        <br/>
                        {!! Form::radio('rate_option','custom_rate',null, array('id'=>'custom_rate','class'=>'rate_options')) !!}  <strong>Custom</strong> Rate Charge, (must be set in the sidebar).
                        <br/>
                        <span id='custom-rate-infobox' class="custom-rate none">Current Custom Active Rate: <span id="custom-rate-amount">{{$customRate->rate_amount}}</span> </span>
                        <br/>
                        {!! link_to_route('customRate.index','Change Custom Rate') !!}
                        <br/>
                    </td>
                </tr>
                <tr>
                    <td>
                       &nbsp;
                    </td>
                    <td>
                        Please note that the room charges below are based on the total amount of guests indicated above.
                    </td>
                </tr>
                <tr>
                    <td>
                        Room Charges
                    </td>
                    <td>
                        {!! Form::number('days',$reservations->room_days,array('class'=>'','id'=>'totalNightsIndicated')) !!} nights @ <span style="font-weight:bold;" id="rateShownOnPage">35.00/night</span> = {!! Form::number('totalRoomCharges',$reservations->roomcharge,array('placeholder'=>'Save to See Charge','id'=>'roomChargeTotal')) !!}
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

                        ${!!Form::text('grand_total',number_format($reservations->total_charge,2),array('id'=>'grandTOTALTODISPLAY'))  !!}

                    </td>
                </tr>
                <tr>
                    <td colspan="2">


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
                        <br/>
                        <p>
                            If there is <STRONG>NO</STRONG> room available, ignore Step #1 and set status to "Denied" and they will be notified via e-mail that no room is available.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Current Reservation Status
                    </td>
                    <td>
                        <?php
                        $statusValues = array(
                                'New'=>'New',
                                'PendingPmt'=>'Pending Payment',
                                'PaymentReceived'=>'PaymentReceived',
                                'Denied'=>'Denied',
                                'IDT'=>'IDT',
                                'Cancelled'=>'Cancelled',
                                'Refunded'=>'Refunded'
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