<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalCaseField extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
    ];

    /**
     * Get the Case Id
     */
    public function legal_case()
    {
        return $this->hasOne('App\LegalCase');
    }

    /**
     * Get the Case Field Name
     */
    public function legal_case_field_name()
    {
        return $this->belongsTo('App\LegalCaseFieldName');
    }
}
