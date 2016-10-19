<style>
    .apply-font{
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        font-size: 12px;
        font-style: normal;
        font-variant: normal;
        line-height: 20px;
    }

    p{
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        font-size: 12px;
        font-style: normal;
        font-variant: normal;
        line-height: 20px;
    }
</style>

<p>
Dear {{$guestfirstName}},
<br/>
<br/>
Thank you for wanting to stay with us at Coastal Quarters.
<br/>
<br/>
Below are details of your request:
<br/>
<br/>
</p>
<table class="apply-font" style="border:1px solid black;">
    <tr>
        <td style="width:60%;" colspan="2">
            <h4>Guest Information</h4>
        </td>
    </tr>
    <tr>
        <td>
            Guest First Name
        </td>
        <td>
            {{$guestfirstName}}
        </td>
    </tr>
    <tr>
        <td>
            Guest Last Name
        </td>
        <td>
            {{$guestlastName}}
        </td>
    </tr>
    <tr>
        <td>
            Guest E-Mail
        </td>
        <td>
            {{$guestEmailAddress}}
        </td>
    </tr>
    <tr>
        <td>
            Guest Phone
        </td>
        <td>
            {{$guestPhoneNumber}}
        </td>
    </tr>
    <tr>
        <td>
            Guest Arrival Date
        </td>
        <td>
            {{$guestArrivalDate}}
        </td>
    </tr>
    <tr>
        <td>
            Guest Departure Date
        </td>
        <td>
            {{$guestDepartureDate}}
        </td>
    </tr>
    <tr>
        <td>
            Total Number of Guests
        </td>
        <td>
            {{$guestTotalNumberOfGuests}}
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
            {{$billingFirstName}}
        </td>
    </tr>
    <tr>
        <td>
            Billing Last Name
        </td>
        <td>
            {{$billingLastName}}
        </td>
    </tr>
    <tr>
        <td>
            Billing Address
        </td>
        <td>
            {{$billingAddressLine001}}
            <br/>
            {{$billingAddressLine002}}
            <br/>
            {{$billingCity}}
            <br/>
            {{$billingState}} {{$billingZipCode}}
            <br/>
            {{$billingCountry}}
        </td>
    </tr>
    <tr>
        <td>
            Billing E-Mail
        </td>
        <td>
            {{$billingEMailAddress}}
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <h4>Billing Information</h4>
        </td>
    </tr>
    <tr>
        <td>
            Responsible for Billing:
        </td>
        <td>
            {{$billCharge}}
        </td>
    </tr>
    <tr>
        <td>
            OUC Number :
            <br/>
            <span style='font-size:xx-small'>If applies.</span>
        </td>
        <td>
            {{$OUCNumber}}
        </td>
    </tr>
    <tr>
        <td>
            Project Grant Number :
            <br/>
            <span style='font-size:xx-small'>If applies.</span>
        </td>
        <td>
            {{$ProjectGrantNumber}}
        </td>
    </tr>
    <tr>
        <td>
            Bookkeeper :
            <br/>
            <span style='font-size:xx-small'>If applies.</span>
        </td>
        <td>
            {{$BookKeeper}}
        </td>
    </tr>

</table>

<br/>
<br/>
<p>
    Thank you for your submission. If there is availability, you will be sent a e-mail with payment information.
    <br/>
    <br/>
    Sincerely,
    <br/>
    Coastal Quarters
    <br/>
    NC State University
    <br/>
    (919) 515-4398
    <br/>
    guestservices@ncsu.edu
</p>