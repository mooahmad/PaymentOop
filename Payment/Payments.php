<?php

namespace App;

class Payments
{
    public $amount;
    public $commission;
    public $currency;
    public $user;

    /**
     * Payment constructor.
     * @param $amount
     * @param $commission
     * @param $currency
     * @param $method
     * @param $user
     */
    public function __construct($amount, $currency, $userId, $userMethod, $commission = null)
    {
        $this->amount = $amount;
        $this->commission = $commission;
        $this->currency = $currency;
        $this->user = new User($userId, $userMethod);
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {

        return $this->user;
    }

    /**
     * @return float|int|mixed
     */
    public function checkCommission()
    {
        if ($this->commission == null) return $this->getAmount();
        return $this->getAmount() - ($this->getCommission() * $this->getAmount() / 100);
    }

    public function bindPayment()
    {
        if ($this->getUser()->bindPaymentMethod() == 'failed') {
            return ['failed' => 'sorry the user not bind to any payment method'];
        } elseif ($this->getUser()->bindPaymentMethod() != $this->methodType()) {
            return ['failed' => 'sorry the payment is not bind to the user'];
        }
        $data = [
            'method' => $this->methodType(),
            'currency' => $this->getCurrency(),
            'amount' => $this->getAmount(),
            'sum_after_commission' => $this->checkCommission(),
            'user' => $this->getUser()->getIdentifier()
        ];

        $resultData = $tempArray = array();


        if(( file_exists('history.json')) == true){
           $oldData = file_get_contents('history.json');
            $tempArray = json_decode($oldData, true);
        }

        array_push($tempArray, $data);
        $resultData[] = $tempArray;
        $jsonData = json_encode($tempArray);
        file_put_contents('history.json', $jsonData);


        return $data;

    }

    function methodType()
    {
        $class = new \ReflectionClass($this);
        $class_name = $class->getShortName();
        $str = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $class_name));

        return $str;
    }

    public function paymentLog()
    {
        $user = $this->getUser();
        $bindMethod = isset($this->bindPayment()['failed']) ? 'failed' : $user->bindPaymentMethod();

        //Write action to txt log
        $log = "User: " . $user->getIdentifier() .
            ", Action Name:" . $bindMethod . "_bind, Date : " . date("F j, Y, g:i a") . PHP_EOL;
        file_put_contents('./action.log', $log, FILE_APPEND);
    }
}


