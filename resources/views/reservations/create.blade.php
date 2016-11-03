@extends('layout.master')

@section('content')
    <!--Needed for Date Picker for the Arrival and Departure Dates-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        //Arrival Date
        $(function() {

            $("#datepickerCalendarArrival").click(function () {
                alert('datePickerArrivalClicked!');
                $( "#datepickerArrival" ).datepicker('show');

            })

        //Arrival Date
            $( function() {
                $( "#datepickerArrival" ).datepicker({
                    showOn: "button",
                    buttonImage: "{{URL::asset('img/calendarPick.png')}}",
                    buttonImageOnly: true,
                    buttonText: "Select arrival date",
                    dateFormat: "yy-mm-dd"
                });
            } );

        });
        //Departure Date
        $(function() {

            $( "#datepickerDeparture" ).datepicker({
                showOn: "button",
                buttonImage: "{{URL::asset('img/calendarPick.png')}}",
                buttonImageOnly: true,
                buttonText: "Select departure date",
                dateFormat:"yy-mm-dd"
            });

        });

        //Handle Billing Information if it's the same as guest information
        $(document).ready(function(){

            $('input[name="billingSameAsGuest"]').click(function(){
                //guest inputs
                var guestFirstName     =  $('input[name="firstNAME"]').val();
                var guestLastName      =$('input[name="lastNAME"]').val();
                var guestEmailAddress  =$('input[name="guestEMail"]').val();



                if($(this).prop("checked") == true){
                    //Stick Guest First Name as Billing First Name
                    $('input[name="billingFirst_NAME"]').val(guestFirstName);
                    //Stick Guest Last Name as Billing Last Name
                    $('input[name="billingLast_NAME"]').val(guestLastName);
                    //Stick guest e-mail address as billing e-mail address
                    $('input[name="billingEMail"]').val(guestEmailAddress);

                }

                else if($(this).prop("checked") == false){
                    //Remove all text elements from billing.
                    //Stick Guest First Name as Billing First Name
                    $('input[name="billingFirst_NAME"]').val("");
                    //Stick Guest Last Name as Billing Last Name
                    $('input[name="billingLast_NAME"]').val("");
                    //Stick guest e-mail address as billing e-mail address
                    $('input[name="billingEMail"]').val("");

                }

            });

        });


        //Handle if the person selects guest -- pre-fill the ouc/project-grant/and bookkeeper fields as needed
        $(document).ready(function(){

            //Handle the subsequent 3 fields if the user selects that the guest is responsible.
            $("#guestResponsible").click(function(){
                if($(this).prop("checked")){
                    //Set OUC Number to N/A
                    $('input[name="OUC_Number"]').val("N/A");
                    //Set ProjectGrant Number to N/A
                    $('input[name="ProjectGrantNumber"]').val("N/A");
                    //Set Departmental Bookkeeper to N/A
                    $('input[name="DepartmentalBookkeeper"]').val("N/A");
                }
            });

            //Handle the subsequent 3 fields if the user selects that the department is responsible.
            $("#departmentResponsible").click(function(){
                if($(this).prop("checked")){
                    //Remove all text elements from billing.
                    //Stick OUC Number to Blank
                    $('input[name="OUC_Number"]').val("Please provide value.");
                    //Stick Project Grant to Blank
                    $('input[name="ProjectGrantNumber"]').val("Please provide value.");
                    //Stick Departmental Bookkeeper to Blank
                    $('input[name="DepartmentalBookkeeper"]').val("");
                }
            });

        });



    </script>
    <!--End Need for the Arrival and Departure Dates-->
    <div class="row">
        &nbsp;
    </div>
    <div class="row">
        &nbsp;
    </div>
    <div class="row">
            <div class="col-md-12">

                <h4>Coastal Quarters Guest Room Request</h4>
            </div>
    </div>
    <div class="row">
        &nbsp;
    </div>
    <div class="row">
        &nbsp;
    </div>
    <div class="row">
        <div class="col-md-12">

            <p>
                This is a request for a guest room. There is no guarantee that a room will be available on the date(s) you desire. <br/>
                If space is available for that time, you will be sent an email with a link to pay online. <br/>
                <br/>
                Only after payment will your reservation be secured.
                <br/>
                <br/>
                Required fields are marked with an asterisk (*) and must be filled out before the form can be submitted.
            </p>
        </div>
    </div>
    <!--Two Blank Rows-->
    <div class="row">
        &nbsp;
    </div>
    <div class="row">
        &nbsp;
    </div>
    <!--Start Guest Information-->
    <div class="row">
        <div class="col-md-12 border_bottom_header">
            <h2>Guest Information</h2>
        </div>
    </div>
    <!--Blank Row-->
    <div class="row">
        &nbsp;
    </div>
    {!! Form::open(array('route' => 'reservation.store')) !!}


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
    <!--Blank Row-->
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <!--End the Errors page-->
    <!--Start Guest Information-->
    <div class="row">
      <form class="form-group">
          <div class="row">
                  <label class="control-label col-sm-2 required">
                      First Name:
                  </label>
                  <div class="col-sm-5">
                      {!! Form::text('firstNAME',Input::old('firstNAME'),array('class'=>'form-control')) !!}
                  </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
                  <label class="control-label col-sm-2 required">
                      Last Name:
                  </label>
                  <div class="col-sm-5">
                      {!! Form::text('lastNAME',Input::old('lastNAME'),array('class'=>'form-control')) !!}
                  </div>
          </div>

          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                Guest  E-Mail Address:
              </label>
              <div class="col-sm-5">
                  {!! Form::text('guestEMail',Input::old('guestEMail'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Phone Number:
              </label>
              <div class="col-sm-5">
                  {!! Form::text('guestPhone',Input::old('guestPhone'),array('class'=>'form-control','maxlength'=>'12')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>

          <div class="row">
              <label class="control-label col-sm-2 required">
                  Arrival Date:
              </label>
              <div class="col-sm-2">
                  {!!  Form::text('guestarrivalDate',Input::old('guestarrivalDate'),array('id'=>'datepickerArrival','class'=>'form-control')) !!}

              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Departure Date:
              </label>
              <div class="col-sm-2">
                  {!!  Form::text('guestdepartureDate',Input::old('guestdepartureDate'),array('id'=>'datepickerDeparture','class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Total Guests:<br/>
                  <span style="font-size:xx-small;">Please include yourself</span>
              </label>
              <div class="col-sm-5">

                    {!! Form::selectRange('totalGUESTS_INDICATED',1,20,array('class'=>'form-control')) !!}

              </div>
          </div>




          <div class="row border_bottom_header">
              <h2>Billing Information</h2>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <!--Billing F. Name-->
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Billing First Name:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('billingFirst_NAME',Input::old('billingFirst_NAME'),array('class'=>'form-control')) !!}
              </div>
              <div class="col-sm-4" style="border:1px solid lightgrey;">
                   {!!  Form::checkbox('billingSameAsGuest',null)  !!}
                  Billing Information is the same as <br/>
                  Guest Information Above.
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <!--Billing L. Name-->
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Billing Last Name:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('billingLast_NAME',Input::old('billingLast_NAME'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  E-Mail Address:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('billingEMail',Input::old('billingEMail'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Address Line 1:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('billingAddressLine001',Input::old('billingAddressLine001'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Address Line 2:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('billingAddressLine002',Input::old('billingAddressLine002'),array('class'=>'form-control','placeholder'=>'Put N/A if does not apply.')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  City:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('billingCity',Input::old('billingCity'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  State:
              </label>
              <div class="col-sm-5">
                 <select class="form-control" id="billingState" name="billingState">
                      <option value="">Select ...</option>
                      <option value="AL">Alabama</option>
                      <option value="AK">Alaska</option>
                      <option value="AZ">Arizona</option>
                      <option value="AR">Arkansas</option>
                      <option value="CA">California</option>
                      <option value="CO">Colorado</option>
                      <option value="CT">Connecticut</option>
                      <option value="DE">Delaware</option>
                      <option value="FL">Florida</option>
                      <option value="GA">Georgia</option>
                      <option value="HI">Hawaii</option>
                      <option value="ID">Idaho</option>
                      <option value="IL">Illinois</option>
                      <option value="IN">Indiana</option>
                      <option value="IA">Iowa</option>
                      <option value="KS">Kansas</option>
                      <option value="KY">Kentucky</option>
                      <option value="LA">Louisiana</option>
                      <option value="ME">Maine</option>
                      <option value="MD">Maryland</option>
                      <option value="MA">Massachusetts</option>
                      <option value="MI">Michigan</option>
                      <option value="MN">Minnesota</option>
                      <option value="MS">Mississippi</option>
                      <option value="MO">Missouri</option>
                      <option value="MT">Montana</option>
                      <option value="NE">Nebraska</option>
                      <option value="NV">Nevada</option>
                      <option value="NH">New Hampshire</option>
                      <option value="NJ">New Jersey</option>
                      <option value="NM">New Mexico</option>
                      <option value="NY">New York</option>
                      <option value="NC" selected>North Carolina</option>
                      <option value="ND">North Dakota</option>
                      <option value="OH">Ohio</option>
                      <option value="OK">Oklahoma</option>
                      <option value="OR">Oregon</option>
                      <option value="PA">Pennsylvania</option>
                      <option value="RI">Rhode Island</option>
                      <option value="SD">South Dakota</option>
                      <option value="TN">Tennessee</option>
                      <option value="TX">Texas</option>
                      <option value="UT">Utah</option>
                      <option value="VT">Vermont</option>
                      <option value="VA">Virginia</option>
                      <option value="WA">Washington</option>
                      <option value="WV">West Virginia</option>
                      <option value="WI">Wisconsin</option>
                      <option value="WY">Wyoming</option>
                  </select>

              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Zip Code:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('billingZipCode',Input::old('billingZipCode'),array('class'=>'form-control','maxlength'=>'9')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                 Country (If Not US):
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('billingCountry',Input::old('billingCountry'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <!--Three Blank Rows-->
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row border_bottom_header">
              <h2>NC State Affiliation</h2>
          </div>
          <div class="row">
              <div class="col-md-12">
                  &nbsp;
              </div>
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Host First Name:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('hostfirstNAME',Input::old('hostfirstNAME'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Host Last Name:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('hostlastNAME',Input::old('hostlastNAME'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Host Title:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('hostTITLE',Input::old('hostTITLE'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Host Department or Organization:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('hostDEPARTMENT',Input::old('hostDEPARTMENT'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Host Address Line 1:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('hostADDRESSLINE001',Input::old('hostADDRESSLINE001'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Host Address Line 2:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('hostADDRESSLINE002',Input::old('hostADDRESSLINE002'),array('class'=>'form-control','placeholder'=>'Put N/A if does not apply.')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  City:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('hostCITY',Input::old('hostCITY'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  State:
              </label>
              <div class="col-sm-5">
                  <select class="form-control" id="hostSTATE" name="hostSTATE">
                      <option value="">Select ...</option>
                      <option value="AL">Alabama</option>
                      <option value="AK">Alaska</option>
                      <option value="AZ">Arizona</option>
                      <option value="AR">Arkansas</option>
                      <option value="CA">California</option>
                      <option value="CO">Colorado</option>
                      <option value="CT">Connecticut</option>
                      <option value="DE">Delaware</option>
                      <option value="FL">Florida</option>
                      <option value="GA">Georgia</option>
                      <option value="HI">Hawaii</option>
                      <option value="ID">Idaho</option>
                      <option value="IL">Illinois</option>
                      <option value="IN">Indiana</option>
                      <option value="IA">Iowa</option>
                      <option value="KS">Kansas</option>
                      <option value="KY">Kentucky</option>
                      <option value="LA">Louisiana</option>
                      <option value="ME">Maine</option>
                      <option value="MD">Maryland</option>
                      <option value="MA">Massachusetts</option>
                      <option value="MI">Michigan</option>
                      <option value="MN">Minnesota</option>
                      <option value="MS">Mississippi</option>
                      <option value="MO">Missouri</option>
                      <option value="MT">Montana</option>
                      <option value="NE">Nebraska</option>
                      <option value="NV">Nevada</option>
                      <option value="NH">New Hampshire</option>
                      <option value="NJ">New Jersey</option>
                      <option value="NM">New Mexico</option>
                      <option value="NY">New York</option>
                      <option value="NC" selected>North Carolina</option>
                      <option value="ND">North Dakota</option>
                      <option value="OH">Ohio</option>
                      <option value="OK">Oklahoma</option>
                      <option value="OR">Oregon</option>
                      <option value="PA">Pennsylvania</option>
                      <option value="RI">Rhode Island</option>
                      <option value="SD">South Dakota</option>
                      <option value="TN">Tennessee</option>
                      <option value="TX">Texas</option>
                      <option value="UT">Utah</option>
                      <option value="VT">Vermont</option>
                      <option value="VA">Virginia</option>
                      <option value="WA">Washington</option>
                      <option value="WV">West Virginia</option>
                      <option value="WI">Wisconsin</option>
                      <option value="WY">Wyoming</option>
                  </select>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Zip Code:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('hostZIP_CODE',Input::old('hostZIP_CODE'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Phone Number:
              </label>
              <div class="col-sm-5">
                  {!!  Form::text('hostPHONE_NUMBER',Input::old('hostPHONE_NUMBER'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  EMail Address:
              </label>
              <div class="col-sm-5">
                 {!!  Form::text('hostEMAIL_ADDRESS',Input::old('hostEMAIL_ADDRESS'),array('class'=>'form-control','placeholder'=>'hostAffiliation@ncsu.edu')) !!}
              </div>
          </div>
          <div class="row">
              &nbsp;&nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Purpose of Your Stay:
              </label>
              <div class="col-sm-5">
                  {!!  Form::textarea('hostPURPOSE_FOR_STAYING',Input::old('hostREASON_FOR_STAYING'),array('class'=>'form-control','maxlength'=>'200','Placeholder'=>'Please no more than 200 charaters')) !!}
              </div>
          </div>

          <div class="row">
              <div class="col-md-12">
                  &nbsp;
              </div>
          </div>
          <div class="row border_bottom_header">
              <h2>Payment Information</h2>
          </div>
          <div class="row">
              <div class="col-md-12">
                  &nbsp;
              </div>
          </div>
          <!--Start Billing Information-->
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2 required">
                  Who will be responsible for billing:
              </label>
              <div class="col-sm-4">

                  {!! Form::radio('billCharge','Guest',false,array('class'=>'#','id'=>'guestResponsible')) !!}
                  {!! Form::label('billCharge', 'Guest') !!}
                  <br/>

                  {!! Form::radio('billCharge','Department',false,array('class'=>'#','id'=>'departmentResponsible')) !!}
                  {!! Form::label('billCharge', 'Department via IDT (Interdepartmental Transfer)') !!}
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <!--OUC Number-->
          <div class="row">
              <label class="control-label col-sm-2">
                  If you choose Department, please fill out these fields:
              </label>
              <div class="col-sm-5">
                  {!! Form::label('OUC_Number', 'OUC Number#:', array('class' => '#'))  !!}
                  {!! Form::text('OUC_Number',Input::old('OUC_Number'),array('class'=>'form-control','maxlength'=>'10')) !!}
              </div>
          </div>
          <!--Project Grant Number-->
          <div class="row">
              <div class="col-sm-2">
                  &nbsp;
              </div>
              <div class="col-sm-5">
                  {!! Form::label('ProjectGrantNumber', 'Project/Grant#:', array('class' => '#'))  !!}
                  {!! Form::text('ProjectGrantNumber',Input::old('ProjectGrantNumber'),array('class'=>'form-control','maxlength'=>'10')) !!}
              </div>
          </div>
          <div class="row">
              <div class="col-sm-2">
                  &nbsp;
              </div>
              <div class="col-sm-5">
                  {!! Form::label('DepartmentalBookkeeper', 'Departmental Bookkeeper:', array('class' => '#'))  !!}
                  {!! Form::text('DepartmentalBookkeeper',Input::old('DepartmentalBookkeeper'),array('class'=>'form-control','maxlength'=>'150')) !!}
              </div>
          </div>




          <!--Additional Information Here-->
          <hr>

          <div class="row">
              <label class="control-label col-sm-2">
                  Please provide additional information about reservation here:
              </label>
              <div class="col-sm-5">
                  {!!  Form::textarea('additionalGuestInformation',Input::old('additionalGuestInformation'),array('class'=>'form-control')) !!}
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  &nbsp;
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6 ">
                  Do you agree to the following terms?:
                  <br/>
                  <a href="{{URL::asset('pdfs/coastal_quarters_terms_and_agreement.pdf')}}">Terms and Agreement</a>

              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  &nbsp;
              </div>
          </div>
          <div class="row">
              <label class="control-label col-sm-2   required">
                  I agree to the terms.
              </label>
              <div class="col-sm-5">
                  <input type="checkbox" name="agree" value="yes">
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  &nbsp;
              </div>
          </div>





          <div class="row">
              <div class="col-md-12">
                  {!!  Form::submit('Submit Reservation',array('class'=>'btn btn-sm btn-default')) !!}
                  {!!  Form::reset('Clear Information',array('class'=>'btn btn-sm btn-danger')) !!}
              </div>
          </div>

          {!! Form::close() !!}
      </form>
    </div>
@stop


@stop