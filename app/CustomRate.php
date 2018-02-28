<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomRate extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'custom_rates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rate_active','rate_name','rate_amount'];


}
