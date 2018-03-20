@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Coastal Quarters Room Request</h1>
            <br/>
            <br/>
            <p>
                Your information has been sent successfully. <strong>Please remember that this is only a request for a guest room.</strong>
                <br/>
                There is no guarantee that a room will be available on the date(s) you requested. If space is available for that time, an e-mail will be sent to you
                with a link to pay online. <br/>
                Due to the great demand for guest housing, online reservation requests are processed on a first-come, first-served basis.
                <br/>
                <br/>
                Only after payment is confirmed will your reservation be secured. If you fail to make payment within the allotted time frame, we reserve the right to release your room to another guest.
                If space is not available, you will receive an email indicating so.
                <br/>
                <br/>
                You can expect a response within two (2) to four (4) business days after we receive your request.<br/>
                <br/>
                Please call us at (919) 515-4398 or <a href="mailto:conferenceservices@lists.ncsu.edu">send us an email</a> with any questions you may have. Thank you.</p>
                <br/>
                <br/>
                <br/>
                <h4>You submitted the following information for approval:</h4>
                <br/>


            <table class="col-md-12">
            <tr style="border-bottom:1px solid black;">
                <td colspan="2">
                    <h4>Guest Information</h4>
                </td>
            </tr>
            <tr>
                <td>
                    Guest Name:
                </td>
                <td class="small">
                    {{$guestReservationDetails->f_name}} {{$guestReservationDetails->l_name}}
                </td>
            </tr>
            <tr>
                <td>
                    E-Mail:
                </td>
                <td class="small">
                    {{$guestReservationDetails->guest_email_address}}
                </td>

            </tr>
            <tr>
                <td>
                    Phone
                </td>
                <td class="small">
                    {{$guestReservationDetails->phone_number}}
                </td>
            </tr>
            <tr>
                <td>
                    Indicated Arrival Date
                </td>
                <td class="small">
                    {{$guestReservationDetails->arrival_date}}
                </td>
            </tr>
            <tr>
                <td>
                    Indicated Departure Date
                </td>
                <td class="small">
                    {{$guestReservationDetails->departure_date}}
                </td>
            </tr>
            <tr>
                <td>
                    Indicated Number of Guests: <br/>
                    (Including yourself)
                </td>
                <td class="small">
                    {{$guestReservationDetails->number_of_guests}}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    &nbsp;
                </td>
            </tr>
            <tr style="border-bottom:1px solid black;">
                <td colspan="2">
                    <h4>Billing Information</h4>
                </td>
            </tr>
            <tr>
                <td>
                    Billing Name:
                </td>
                <td class="small">
                    {{$guestReservationDetails->billing_first_name}}  {{$guestReservationDetails->billing_last_name}}
                </td>
            </tr>
            <tr>
                <td>
                    Billing EMail:
                </td>
                <td class="small">
                    {{$guestReservationDetails->billing_email_address}}
                </td>
            </tr>
            <tr>
                <td>
                    Billing Address
                </td>
                <td class="small">
                    {{$guestReservationDetails->billing_line_address_001}}<br/>
                    @if(!empty($guestReservationDetails->billing_line_address002))
                         {{$guestReservationDetails->billing_line_address002}} <br/>
                    @endif
                    {{$guestReservationDetails->billing_city}} <br/>
                    {{$guestReservationDetails->billing_state}} <br/>
                    {{$guestReservationDetails->billing_zip_code}} <br/>
                    {{$guestReservationDetails->billing_country}}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    &nbsp;
                </td>
            </tr>
            <tr style="border-bottom:1px solid black;" >
                <td colspan="2">
                    <h4>Host Information</h4>
                </td>
            </tr>
            <tr>
                <td>
                    Host Name
                </td>
                <td class="small">
                    {{$guestReservationDetails->host_first_name}}  {{$guestReservationDetails->host_last_name}}
                </td>
            </tr>
            <tr>
                <td>
                    Host Title
                </td>
                <td class="small">
                    {{$guestReservationDetails->host_title}}
                </td>
            </tr>
            <tr>
                <td>
                    Host Department
                </td>
                <td class="small">
                    {{$guestReservationDetails->host_department_org}}
                </td>
            </tr>
            <tr>
                <td>
                    Host Address
                </td>
                <td class="small">
                    {{$guestReservationDetails->host_address_001}} <br/>
                    {{$guestReservationDetails->host_address_002}} <br/>
                    {{$guestReservationDetails->host_city}} <br/>
                    {{$guestReservationDetails->host_state}} <br/>
                    {{$guestReservationDetails->host_zip_code}} <br/>
                    {{$guestReservationDetails->host_phone}} <br/>
                </td>
            </tr>
            <tr style="border-bottom:1px solid black;" >
                <td colspan="2">
                    <h4>Billing Information</h4>
                </td>
            </tr>
            <tr>
                <td>
                   Who is responsible for billing:
                </td>
                <td class="small">
                    {{$guestReservationDetails->who_pays}}
                </td>
            </tr>
            <tr>
                <td>
                    OUC Number:
                    <br/>
                    <span style="font-size: xx-small">(If Applicable)</span>
                </td>
                <td class="small">
                    {{$guestReservationDetails->ouc}}
                </td>
            </tr>
            <tr>
                <td>
                    Project/Grant Number:
                    <br/>
                    <span style="font-size: xx-small">(If Applicable)</span>
                </td>
                <td class="small">
                    {{$guestReservationDetails->projgrant}}
                </td>
            </tr>
            <tr>
                <td>
                    Bookkeeper Information:
                    <br/>
                    <span style="font-size: xx-small">(If Applicable)</span>
                </td>
                <td class="small">
                    {{$guestReservationDetails->bookkeeper}}
                </td>
            </tr>
            <tr>
                <td>
                    Agree to Terms:
                </td>
                <td class="small">
                        {{$guestReservationDetails->terms}}
                </td>
            </tr>
            </table>
            </p>
        </div>
    </div>
@endsection


