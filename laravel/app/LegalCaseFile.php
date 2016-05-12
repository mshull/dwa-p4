<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalCaseFile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'legal_case_id', 'user_id'
    ];

    /**
     * Get the Case Id
     */
    public function legal_case()
    {
        return $this->hasOne('App\LegalCase');
    }
}
