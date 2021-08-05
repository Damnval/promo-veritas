<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrant extends Model 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'marketing_strategy',
        'estimated_cost',
        'estimated_roi',
        'title',
        'user_id',
        'email',
        'participant_name',
        'contact_no',
        'address',
        'is_winner',
        'mechanic',
    ];

}
