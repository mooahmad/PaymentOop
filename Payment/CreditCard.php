<?php
namespace App;
use App\Interfaces\PaymentLoad;
use App\Interfaces\PaymentProcess;
use App\Payments as Pay;

class CreditCard extends Pay implements PaymentLoad , PaymentProcess
{
    /**
     * @return array|string[]
     */
    public function process()
    {
        return $this->pay();
    }

    /**
     * @return array|string[]
     */
    public function pay()
    {
        $this->paymentLog();
        return  $this->bindPayment();
    }

}

