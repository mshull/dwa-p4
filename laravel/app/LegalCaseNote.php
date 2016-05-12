<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalCaseNote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'heading', 'value', 'contact_id', 'legal_case_id'
    ];

    /**
     * Get the Case Id
     */
    public function legal_case()
    {
        return $this->hasOne('App\LegalCase');
    }
}
