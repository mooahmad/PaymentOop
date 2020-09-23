<?php

use App\BankTransfer;
use App\PaymentGateway;
use App\User;
use App\PaymentHistory;
require "vendor/autoload.php";




//$pay = new PaymentGateway();
//print_r($pay->takePayment(new \App\CreditCard(100,'us',9,\App\MethodsTypes::CreditCard)));

$userHistory = new PaymentHistory(10,'dd');

print_r($userHistory->getHistory());