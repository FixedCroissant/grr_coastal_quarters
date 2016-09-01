<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coastal_quarters_guest_reservations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'f_name', 'l_name','guest_email_address','billing_first_name','billing_last_name','billing_line_address_001','billing_line_address_002','billing_city','billing_state','billing_zip_code','billing_country','billing_email_address','out_of_country_indicator','phone_number','arrival_date','departure_date','number_of_guests','host_first_name','host_last_name','host_title','host_department_org','host_address_001','host_address_002','host_city','host_state','host_zip_code','host_phone_number','host_email_address','additional_information_about_reservation','who_pays','ouc','projgrant'];


}
