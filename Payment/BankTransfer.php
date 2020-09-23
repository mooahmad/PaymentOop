<?php
namespace App;
use App\Payments as Pay;

class BankTransfer extends Pay implements PaymentLoad , PaymentProcess
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

