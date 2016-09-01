@extends('layout.master')

@section('content')
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
                  <label class="control-label col-sm-2">
                      First Name:
                  </label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" id="first_name" name="firstNAME"/>
                  </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
                  <label class="control-label col-sm-2">
                      Last Name:
                  </label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" id="last_name" name="lastNAME"/>
                  </div>
            </div>
          <div class="row">
              &nbsp;
          </div>

          <!--Billing Name-->
          <div class="row">
              <label class="control-label col-sm-2">
                  Billing Name:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="billingNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  Address Line 1:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  Address Line 2:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  City:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  State:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  Zip Code:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                 Country (If Not US):
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  Phone Number:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  E-Mail Address:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  Arrival Date:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  Departure Date:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  Total Guests:
              </label>
              <div class="col-sm-5">
                  <select name="totalGUESTS" class="form-control">
                      <option value="">Select ...</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                  </select>


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
              <label class="control-label col-sm-2">
                  Host First Name:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  Host Last Name:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  Host Title:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  Host Department or Organization:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  Host Address Line 1:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  Host Address Line 2:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  City:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
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
              <label class="control-label col-sm-2">
                  Zip Code:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  Phone Number:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
              </div>
          </div>
          <div class="row">
              &nbsp;
          </div>
          <div class="row">
              <label class="control-label col-sm-2">
                  EMail Address:
              </label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="first_name" name="firstNAME"/>
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