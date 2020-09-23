# PaymentOop
run http://localhost/pay/ or http://localhost/pay/index.php

Run: composer dump-autoload -o

there are 2 files for Action Log , and User Payment History


//todo run one by one

// Note: takePayment add new Class PaymentMethod matching with user registry method like below and will record the action action.log.
$pay = new PaymentGateway();
print_r($pay->takePayment(new \App\CreditCard(100, 'us', 9, \App\MethodsTypes::CreditCard)));

//Note: this case will fail because Class PaymentMethod is not matching with user registry method like below and will record the action action.log
//$pay = new PaymentGateway();
//print_r($pay->takePayment(new \App\CreditCard(100, 'us', 9, \App\MethodsTypes::BankTransfer)));
//
////Note: this case will fail because  visa is not in User MethodsType (MethodsType.php) and will record the action action.log
//$pay = new PaymentGateway();
//print_r($pay->takePayment(new \App\CreditCard(100, 'us', 9, 'Visa')));
//
//
//// return the user payment history
//$userHistory = new PaymentHistory(10);
//
//print_r($userHistory->getHistory());
