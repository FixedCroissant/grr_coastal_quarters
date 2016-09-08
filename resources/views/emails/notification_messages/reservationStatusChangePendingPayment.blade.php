Dear {{$billingFirstName}},
<br/>
<br/>
Thank you for wanting to stay with us at Coastal Quarters.
<br/>
<br/>
Availability of your reservation has been confirmed and we now need payment in order to finalize your reservation with us.
<br/>
<br/>
Your reservation charges are outlined below:
<br/>
<br/>
<table style="border:1px solid black;" width="700px">
    <tr>
        <td width="40%">
            Arrival Date
        </td>
        <td width="60%">
            {{$arrivalDate}}
        </td>
    </tr>

    <tr>
        <td>
            Departure Date
        </td>
        <td>
            {{$departureDate}}
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <!--Room Days Indicated-->
    <tr>
        <td>
            Room Days
        </td>
        <td>
            {{$roomDays}}
        </td>
    </tr>
    <!--Room Charges-->
    <tr>
        <td>
            Room Charges @ 32.50/Day
        </td>
        <td>
            {{$roomCharge}}
        </td>
    </tr>
    <!--Blank Row-->
    <tr>
        <td colspan="2">
            &nbsp;
        </td>
    </tr>
    <!--Additional Room Charges If App-->
    <tr>
        <td>
            Additional Rooms: (if any)
        </td>
        <td>
            {{$additionalDaysIndicated}}
        </td>
    </tr>
    <tr>
        <td>
            Additional Room Charge @ 32.50/Day
        </td>
        <td>
            {{$additionalGuestCharge}}
        </td>
    </tr>
    <!--One Blank Rows-->
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td>
            Total Reservation Charge:
        </td>
        <td>
            {{number_format($totalCharge,2)}}
        </td>
    </tr>
    <!--One Blank Row-->
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
</table>
<br/>
<br/>

<p>
    To complete your reservation, please follow the secure link below to make payment. We accept MasterCard and Visa. Your card will be charged at this time. You will need the following information to process payment.
</p>
<br/>
<hr>
<table width="700px">
    <tr>
        <td colspan='2'>
            &nbsp;
            </td>
        </tr>
    <tr>
        <td colspan='2'>
        &nbsp;
        </td>
        </tr>
        <tr>
        <td colspan='2' style='width: 200px; font-size: 110%; font-weight:bold;'>
        Guest Housing
        </td>
        </tr>
    <tr>
        <td colspan='2' style='width: 200px;'>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td colspan='2' style='width: 200px;'>
            Price:
        </td>
    </tr>
    <tr>
        <td colspan='2' style='width: 200px;'>
            &nbsp;
            </td>
    </tr>
    <tr>
        <td colspan='2' style='width: 200px;'>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td style='width: 200px;'>
            <span style='color:red'>*</span> Amount:
        </td>
        <td style='border: 1px solid black; width: 500px;'>
            $ {{number_format($totalCharge,2)}}
        </td>
        </tr>
    <tr>
        <td style='width: 200px;'>
            <span style='color:red'>*</span> Reservation ID:
            </td>
        <td style='border: 1px solid black; width: 500px;'>
            CoastalQuarters_{{$reservationID}}
            </td>
    </tr>
    <tr>
        <td style='width: 200px;'>
            <span style='color:red'>*</span> Guest Location:
            </td>
        <td style='border: 1px solid black; width: 500px;'>
            CMAST
        </td>
        </tr>
    <tr>
        <td style='width: 200px;'>
            <span style='color:red'>*</span> Guest Name:
        </td>
        <td style='border: 1px solid black; width: 500px;'>
            {{$guestFirstName}}  {{$guestLastName}}
        </td>
        </tr>
    </table>
<br>
<br>
<strong>Payment Link:</strong>&nbsp;&nbsp;
<a href='https://commerce.cashnet.com/NCSUCL1?itemcode=CL-GUESTRS'><strong>Click here</strong></a>
<hr>
<br>
<br>
Payment must be made prior to check-in, otherwise, we reserve the right to release your room to another guest. Upon receipt of payment, your room reservation is confirmed.
<br>
<br/>
<br/>
<br/>
Sincerely,
<br/>
Coastal Quarters/CMAST Reservations
<br/>
NC State University
<br/>
(919) 515-4398
<br/>
guestservices@ncsu.edu