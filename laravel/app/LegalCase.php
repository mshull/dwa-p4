<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'external_id', 
        'defendant', 
        'calls', 
        'next_deadline',
        'contact_id',
        'case_type_id',
        'case_status_id',
    ];

    /**
     * Get the Contact
     */
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    /**
     * Get the Case Type
     */
    public function legal_case_type()
    {
        return $this->belongsTo('App\LegalCaseType');
    }

    /**
     * Get the Case Status
     */
    public function legal_case_status()
    {
        return $this->belongsTo('App\LegalCaseStatus');
    }

    /**
     * Get the Case Fields
     */
    public function legal_case_fields()
    {
        return $this->hasMany('App\LegalCaseField');
    }

    /**
     * Get the Case Actions
     */
    public function legal_case_actions()
    {
        return $this->hasMany('App\LegalCaseAction');
    }

    /**
     * Get the Case Notes
     */
    public function legal_case_notes()
    {
        return $this->hasMany('App\LegalCaseNote');
    }

    /**
     * Get the Case Files
     */
    public function legal_case_files()
    {
        return $this->hasMany('App\LegalCaseFile');
    }

    /**
     * Get the Case Logs
     */
    public function legal_case_logs()
    {
        return $this->hasMany('App\LegalCaseLog');
    }

    /**
     * Status ID to Color Label
     */
    public function statusToColorLabel($id)
    {
        if ($id == 1) {
            $label = 'label-danger';
        } else if ($id == 2) {
            $label = 'label-warning';
        } else {
            $label = 'label-success';
        }
        return $label;
    }
}