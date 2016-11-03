<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

//Get Models
use App\Reservation;
//Get Mail Class;
use Mail;
//Get Input for updating reservation records
use Input;

class ReservationController extends Controller {

    /**
     * Create a new controller instance.
     * Apply authentication middleware
     * to the following requests:
     * index, update the record, and delete.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'index','update','delete','edit']);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Go to index view, see all new reservations -- must be protected by middleware
        //as a auth route.
        $reservations = Reservation::all();

        Return view('reservations.index')->with('reservations',$reservations);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Go to create view
        Return view('reservations.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

        $validator = Validator::make($request->all(), [
            'firstNAME' => 'required',
            'lastNAME'=>'required',
            'guestEMail'=>'required |email',
            'guestPhone'=>'required | integer',
            'billingFirst_NAME' =>'required',
            'billingLast_NAME'=>'required',
            'billingAddressLine001'=>'required',
            'billingAddressLine002'=>'required',
            'billingCity'=>'required',
            'billingState'=>'required',
            'billingZipCode'=>'required',
            'billingCountry'=>'required',
            'guestarrivalDate'=>'required',
            'guestdepartureDate'=>'required',
            'hostfirstNAME'=>'required',
            'hostlastNAME'=>'required',
            'hostTITLE'=>'required',
            'hostDEPARTMENT'=>'required',
            'hostADDRESSLINE001'=>'required',
            'hostADDRESSLINE002'=>'required',
            'hostCITY'=>'required',
            'hostSTATE'=>'required',
            'hostZIP_CODE'=>'required',
            'hostPHONE_NUMBER'=>'required',
            'hostPURPOSE_FOR_STAYING'=>'required',
            'hostEMAIL_ADDRESS'=>'required',
            'billCharge'=>'required',
            'agree'=>'required'

        ]);

        //Check validation of the input.
        if ($validator->fails())
        {
            //Go back to the prior page, but take along any input taht was submitted that was correct.
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        //Everything is okay, go ahead and continue making a reservation.
        else{
            //Create new reservation
            $reservation = new Reservation();
            //Status
            $reservation->status = "New";
            //Guest First Name
            $reservation->f_name = $request->input('firstNAME');
            //Guest Last Name
            $reservation->l_name = $request->input('lastNAME');
            //Guest E-Mail Address
            $reservation->guest_email_address = $request->input('guestEMail');
            //Guest Phone Number
            $reservation ->phone_number = $request->input('guestPhone');
            //Guest Arrival Date
            $reservation->arrival_date = $request->input('guestarrivalDate');
            //Guest Departure Date
            $reservation->departure_date = $request->input('guestdepartureDate');
            //Guest Number of Guests Indicated
            $reservation->number_of_guests=$request->input('totalGUESTS_INDICATED');
            //Billing Information
            //Billing First Name
            $reservation->billing_first_name = $request->input('billingFirst_NAME');
            //Billing Last Name
            $reservation->billing_last_name = $request->input('billingLast_NAME');
            //Billing Address 001
            $reservation->billing_line_address_001 = $request->input('billingAddressLine001');
            //Billing Address 002
            $reservation->billing_line_address_002 = $request->input('billingAddressLine002');
            //Billing City
            $reservation->billing_city = $request->input('billingCity');
            //Billing State
            $reservation->billing_state = $request->input('billingState');
            //Billing Zip Code
            $reservation->billing_zip_code = $request->input('billingZipCode');
            //Billing Country
            $reservation->billing_country = $request->input('billingCountry');
            //Billing E-Mail Address
            $reservation->billing_email_address = $request->input('billingEMail');
            //Billing Out of Country Indicator
            $reservation->out_of_country_indicator = 'N';
            //HOST INFORMATION
            //HOST FIRST NAME
            $reservation->host_first_name = $request->input('hostfirstNAME');
            //HOST LAST NAME
            $reservation->host_last_name = $request->input('hostlastNAME');
            //HOST TITLE (IF ANY)
            $reservation->host_title = $request->input('hostTITLE');
            //HOST DEPARTMENT
            $reservation->host_department_org = $request->input('hostDEPARTMENT');
            //HOST ADDRESS LINE 001
            $reservation->host_address_001 = $request->input('hostADDRESSLINE001');
            //HOST ADDRESS LINE 002
            $reservation->host_address_002 = $request->input('hostADDRESSLINE002');
            //HOST CITY
            $reservation->host_city = $request->input('hostCITY');
            //HOST STATE
            $reservation->host_state = $request->input('hostSTATE');
            //HOST ZIP_CODE
            $reservation->host_zip_code = $request->input('hostZIP_CODE');
            //HOST PHONE NUMBER
            $reservation->host_phone_number = $request->input('hostPHONE_NUMBER');
            //HOST EMAIL ADDRESS
            $reservation->host_email_address = $request->input('hostEMAIL_ADDRESS');
            //ADDITIONAL INFORMATION ABOUT THE RESERVATION POSTED HERE
            $reservation->additional_information_about_reservation=$request->input('additionalGuestInformation');
            //HOST REASON FOR STAY
            $reservation->reason_for_staying = $request->input('hostPURPOSE_FOR_STAYING');
            //WHO PAYS??
            $reservation->who_pays = $request->input('billCharge');
            //OUC NUMBER
            $reservation->ouc = $request->input('OUC_Number');
            //PROJECT GRANT
            $reservation->projgrant = $request->input('ProjectGrantNumber');
            //BookKeepr information (if any)
            $reservation->bookkeeper = $request->input('DepartmentalBookkeeper');
            //Terms and Conditions Agreed?
            $reservation->terms = $request->input('agree');

            //Fields: room days, roomcharge, add_guest_charge, total_charge, pay_status
            // //will be filled in automatically based on calculation.

            //Set Room_days, roomcharge,addguestdays,add_guest_charge and total_charge all to 0.
            //Set # of Room Days (Handled within the Admin panel)
            $reservation->room_days=0;
            //Charge is calculated based on the amount of Room Days, but is handled within the Admin Panel.
            //See UpdateChargesPOST() method below.
            $reservation->roomcharge=0;
            //Total Number of Additional Guest Days for Another Room (If needed).
            $reservation->addguestdays=0;
            //Total Charge by having additional guests in the room.
            //Both of these values and the total value below is all set through the UpdateChargesPOST() method.
            $reservation->add_guest_charge=0;
            //Set total charge to 0 as it will be set in the admin panel later.
            $reservation->total_charge=0;


            //Save Reservation Information
            $reservation->save();

            //Information to Pass to my E-Mail Message as a Confirmation
            $data = array(
                'guestfirstName'=>$request->input('firstNAME'),
                'guestlastName'=>$request->input('lastNAME'),
                'guestEmailAddress'=>$request->input('guestEMail'),
                'guestPhoneNumber'=>$request->input('guestPhone'),
                'guestArrivalDate'=>$request->input('guestarrivalDate'),
                'guestDepartureDate'=>$request->input('guestdepartureDate'),
                'guestTotalNumberOfGuests'=>$request->input('totalGUESTS_INDICATED'),
                'billingFirstName'=>$request->input('billingFirst_NAME'),
                'billingLastName'=>$request->input('billingLast_NAME'),
                'billingAddressLine001'=>$request->input('billingAddressLine001'),
                'billingAddressLine002'=>$request->input('billingAddressLine002'),
                'billingCity'=>$request->input('billingCity'),
                'billingState'=>$request->input('billingState'),
                'billingZipCode'=>$request->input('billingZipCode'),
                'billingCountry'=>$request->input('billingCountry'),
                'billingEMailAddress'=>$request->input('billingEMail'),
                'billCharge'=>$request->input('billCharge'),
                'OUCNumber'=>$request->input('OUC_Number'),
                'ProjectGrantNumber'=>$request->input('ProjectGrantNumber'),
                'BookKeeper'=>$request->input('DepartmentalBookkeeper')
            );

            //Get Information on where to send the e-mail message.
            $GUEST_TO_INFORMATION = array(
                'to'=>$request->input('guestEMail'),
                'lname'=>$request->input('firstNAME'),
                'fname'=>$request->input('lastNAME')
            );


            //Send e-mail message to the user.
           /* Mail::send('emails.notification_messages.confirmationMessage', $data, function($message) use ($GUEST_TO_INFORMATION)
            {
                $message->to($GUEST_TO_INFORMATION['to'],$GUEST_TO_INFORMATION['fname'].','.$GUEST_TO_INFORMATION['lname']);
                $message->subject('NCSU - CMAST Reservation Notice');
                $message->from('test@example.com', 'NCSU Guest Services');

            });*/

            //Notify the person that it successfully went through.
            //Go To View
            return \View::make('reservations.confirm_message')->with('guestReservationDetails',$reservation);

        }



	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	    //Get the specific reservation
        $selectedReservation = Reservation::find($id);

		//Go to the edit page.
        Return view('reservations.edit')->with('reservations',$selectedReservation);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//Update the reservation as needed.
        $foundReservation = Reservation::findOrFail($id);
        $foundReservation->fill(Input::all())->save();

        return Redirect::back()->with('message','Reservation Saved!');



	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//Find the reservation we want to remove.
        $reservationToRemove = Reservation::findOrFail($id);

        //Delete the reservation
        $reservationToRemove->delete();

        //Go Back to the associated view.
        return Redirect::back()->with('message','Reservation Deleted!');
	}

	/**Allow for the update of charges and cost information**/
	public function updateChargespre($id){
        //Get Reservation information
        //Update the reservation as needed.
        $reservation = Reservation::findOrFail($id);

	    //Go to the view to update charges for the specified id.
	    return view('reservations.updateStatusChargespre')->with('reservations',$reservation);
    }
    /**Allow for the update of charges and cost information**/
    public function updateChargesPOST($id){
        //Get the reservation id to update.
        $reservationToCharge = Reservation::findOrFail($id);
        //How many guests in the system.
        $guestsIndicated = $reservationToCharge->number_of_guests;
        //Get Days
        //needed for calculating room charges.
        $daysNeeded = Input::get('days');
        //Get additoinal rooms -- days needed
        $daysNeeededForAdditionalRooms = Input::get('additionalRoomsDaysNeeded');

        //Start Calc
        //Rate of Rooms per day.
        $rate = 35.00;

        //Total Room Charge
        //Total Room Charge is the rate ($35) per person/per night.
        $roomCharge = ($daysNeeded*$guestsIndicated*$rate);
        //Total Additional Beds
        $additionalGuestCharge = ($daysNeeededForAdditionalRooms*$rate);
        //TOTAL CHARGE
        $totalCharge = ($roomCharge + $additionalGuestCharge);
        //END TOTAL CHARGE
        //End Calc

        //Update charges
        //Update Days needed
        $reservationToCharge->room_days = $daysNeeded;
        //Update Room Charges
        $reservationToCharge ->roomcharge=$roomCharge;

        //Update the Days Needed for Additional Rooms
        $reservationToCharge->addguestdays = $daysNeeededForAdditionalRooms;
        //Update Guest Charge.
        $reservationToCharge->add_guest_charge= $additionalGuestCharge;
        //Update Total Charge
        $reservationToCharge->total_charge = $totalCharge;
        //Save Record
        $reservationToCharge->save();

        //Return back to the view.
        return Redirect::back()->with('message','Room Charges Saved! Please Change Status');
    }

    /**
     * Allow for the reservations status to be changed via the administrative section.
     * Changing certain statuses will generate a e-mail to be processed to the reservation's guest e-mail.
     * @param $id
     */
    public function updateStatusPOST($id){
        //Get the reservation id to update
        $reservationToChange = Reservation::findOrFail($id);

        //Get the status condition to apply.
        $newSTATUS = Input::get('status');

        //Change the Status of the reservation.
        $reservationToChange->status = $newSTATUS;

        //Save the new status to table.
        $reservationToChange->save();

        //Gather e-mail information
        //Get Information on where to send the e-mail message.
        //Send information to the billing contact

        //Find information on the Current Reservation
        $reservationInformation = Reservation::findOrFail($id);

        //Information to Pass to my E-Mail Message BODY
        $data = array(
            'reservationID'=>$reservationInformation->id,
            'arrivalDate'=>$reservationInformation->arrival_date,
            'departureDate'=>$reservationInformation->departure_date,
            'roomCharge'=>$reservationInformation->roomcharge,
            'roomDays'=>$reservationInformation->room_days,
            'additionalDaysIndicated'=>$reservationInformation->addguestdays,
            'additionalGuestCharge'=>$reservationInformation->add_guest_charge,
            'totalCharge'=>$reservationInformation->total_charge,
            'billingFirstName'=>$reservationInformation->billing_first_name,
            'guestFirstName'=>$reservationInformation->f_name,
            'guestLastName'=>$reservationInformation->l_name,
        );

        //Save Information to be used in the email message sent below.
        //THIS HANDLES THE TO ADDRESS AND THE FIRST NAME & LAST NAME THAT IS SHOWN ON THE E_MAIL
        $GUEST_TO_INFORMATION = array(
            'to'=>$reservationInformation->billing_email_address,
            'lname'=>$reservationInformation->billing_last_name,
            'fname'=>$reservationInformation->billing_first_name
        );
        //End E-Mail Information

        //Based on status change, generate a e-mail to the guest.
        switch($newSTATUS){
                    case "PendingPmt":
                            //E-Mail message to retrieve payment.
                        //Send e-mail message to the user.
                            Mail::send('emails.notification_messages.reservationStatusChangePendingPayment', $data, function($message) use ($GUEST_TO_INFORMATION)
                            {
                                $message->to($GUEST_TO_INFORMATION['to'],$GUEST_TO_INFORMATION['fname'].','.$GUEST_TO_INFORMATION['lname']);
                                $message->subject('NCSU - CMAST Reservation Notice');
                                $message->from('guestservices@ncsu.edu', 'NCSU Guest Services');
                            });
                    break;

                    //Rooms are full, there is no additional availability, send message.
                    case "Denied":
                            //E-Mail message -- Denied, no rooms.
                        //Send e-mail message to the user.
                        Mail::send('emails.notification_messages.reservationStatusChangeDenied', $data, function($message) use ($GUEST_TO_INFORMATION)
                        {
                            $message->to($GUEST_TO_INFORMATION['to'],$GUEST_TO_INFORMATION['fname'].','.$GUEST_TO_INFORMATION['lname']);
                            $message->subject('NCSU - CMAST Reservation Notice');
                            $message->from('guestservices@ncsu.edu', 'NCSU Guest Services');
                        });
                    break;


                    default:
                            //send no message by default.

        }/*close switch statement*/


    //Go back to the prior view with a message.
    //Return back to the view.
    return Redirect::back()->with('message','Reservation Status updated and E-Mail Sent to Billing E-Mail.');

    }



}
