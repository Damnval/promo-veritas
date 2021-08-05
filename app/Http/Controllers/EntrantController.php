<?php

namespace App\Http\Controllers;

use App\Http\Requests\Entrant\StoreRequest;
use App\Models\Entrant;
use App\Services\EntrantService;

class EntrantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EntrantService $entrantService)
    {
        // will create a service of entrant so that will have single responsibility principle
        $this->entrant_service = $entrantService;
    }

    /**
     * Store a newly created resource in storage using winning moment mechanic.
     * Validation is created in a separate file to make this class have single responsibility principle
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeWinningMoment(StoreRequest $request)
    {       
        // logic of saving the entrant
        $entrant_data = $this->entrant_service->storeEntrantWinning($request);
       
        $entrant = Entrant::create($entrant_data);
        // if saves successfully check if entrant is a winner
        // and sends an email
        if ($entrant) {
            $this->entrant_service->sendEmailToWinners($entrant);
        }

        return response()->json($entrant, 201);
    }

    /**
     * Store a newly created resource in storage using chance mechanic.
     * Validation is created in a separate file to make this class have single responsibility principle
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storechance(StoreRequest $request)
    {
        // logic of saving the entrant
        $entrant_data = $this->entrant_service->storeEntrantChance($request);

        $entrant = Entrant::create($entrant_data);
        // if saves successfully check if entrant is a winner
        // and sends an email
        if ($entrant) {
            $this->entrant_service->sendEmailToWinners($entrant);
        }

        return response()->json($entrant, 201);
    }
}
