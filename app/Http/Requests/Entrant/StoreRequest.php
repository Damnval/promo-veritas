<?php

namespace App\Http\Requests\Entrant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreRequest extends Controller
{
    /**
     * validates the incoming data from user client
     *
     * @param Request $request data that are sent from user client
     */
    public function __construct(Request $request)
    {
        $this->validate($request, [
            'marketing_strategy' => 'required',
            'estimated_cost' => 'required',
            'estimated_roi' => 'required',
            'title' => 'required',
            'email' => ' required|email|unique:users,email',
            'user_id' => 'required|exists:users,id',
            'participant_name' => 'required',
            'contact_no' => 'required',
            'address' => 'required'
        ]);
        
        parent::__construct($request);
    }
    
}
