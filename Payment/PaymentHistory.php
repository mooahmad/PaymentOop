<?php


namespace App;



use App\Interfaces\UserHistory;

class PaymentHistory extends History implements UserHistory
{
    
    public function getHistory()
    {
        return $this->getUserHistory();
    }
}