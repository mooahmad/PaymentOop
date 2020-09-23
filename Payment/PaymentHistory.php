<?php


namespace App;



class PaymentHistory extends History implements UserHistory
{



    public function getHistory()
    {
        return $this->getUserHistory();
    }
}