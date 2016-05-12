<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name', 
        'home_phone', 
        'work_phone', 
        'mobile_phone', 
        'emergency_phone', 
        'address', 
        'address_more', 
        'city', 
        'state', 
        'postal_code', 
        'email', 
        'birth_year', 
        'contact_type_id',
    ];

    /**
     * Get the Contact Type
     */
    public function contact_type()
    {
        return $this->hasOne('App\ContactType');
    }
}