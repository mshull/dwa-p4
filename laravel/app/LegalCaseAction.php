<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalCaseAction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'status', 'heading', 'value', 'deadline', 'notification_days', 'user_id', 'contact_id', 'legal_case_id'
    ];

    /**
     * Get the Case Id
     */
    public function legal_case()
    {
        return $this->hasOne('App\LegalCase');
    }
}
