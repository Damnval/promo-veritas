<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Models\Entrant;
use Carbon\Carbon;

class EntrantService
{
    /**
     * Performs the logic when saving entrant with mechanic Winning Moment
     *
     * @param Object $request
     * @return Array $entrant. data to be saved in database
     */
    public function storeEntrantWinning($request)
    {
        //.e.g hour 18 (6pm in 12 hr format) 
        $specified_time = 18; 

        $entrant = $request->getParams()->all();
        $is_winner = 0;
        $entrant['mechanic'] = 'moment';
        $date = Carbon::now();

        $hourNow = Carbon::now()->format('Y-m-d ' . $specified_time . ':00:00');
        //checks if there are records saved in 6 pm, if no will make that entrant a winner
        $entrants = Entrant::where('created_at', '>', $hourNow)->get();

        // This will make the entrant a winner if he/she is the first to enter 
        // when the time hits 6 pm as specified
        if($entrants->count() == 0){
            $is_winner = 1;
        };
        
        $entrant['is_winner'] = $is_winner;

        return $entrant;
    }

    /**
     * Performs the logic when saving entrant with mechanic Winning Moment
     *
     * @param Object $request
     * @return Array $entrant. data to be saved in database
     */
    public function storeEntrantChance($request)
    {
        $entrant = $request->getParams()->all();
        $is_winner = 0;
        $entrant['mechanic'] = 'chance';

        $where = [
            'user_id' => $entrant['user_id']
        ];

        $entrants = Entrant::where($where)->get();

        // every 5th entrant is a winner
        // so if client has 4 existing entrant records, the next record will be winner
        if($entrants->count() == 4){
            $is_winner = 1;
        };
        
        $entrant['is_winner'] = $is_winner;

        return $entrant;
    }

    /**
     * Sends an email to winners
     *
     * @param Object $entrant newly saved entrant
     * @return void
     */
    public function sendEmailToWinners($entrant) {

        // check if entrant is a winner or not
        if ($entrant->is_winner == 1) {
            $data = [
                'name' => $entrant->participant_name
            ];

            // sends an email
            Mail::send('sendWinnerEmail', $data, function($message) use ($entrant) {
                $message->to($entrant->email, $entrant->participant_name)
                        ->subject('Congratulations for winning PromoVeritas');
                $message->from('val@PromoVeritas.com', 'Val');
            });
        }
    }

}
