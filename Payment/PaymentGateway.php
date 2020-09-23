<?php
namespace App;

use App\Interfaces\PaymentProcess;

/**
 * Class PaymentGateway
 */
class PaymentGateway
{
    /**
     * DI based on payment gateway
     * @param PaymentProcess $paymentProcessService
     * @return mixed
     */
    public function takePayment(PaymentProcess $paymentProcessService)
    {
        return $paymentProcessService->process();
    }
}
