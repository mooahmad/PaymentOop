<?php

namespace App;
use App\MethodsTypes;


class User
{
    protected $id;
    protected $method;

    public function __construct($id,$method)
    {
        $this->id = $id;
        $this->method =$method;
    }

    public function getIdentifier()
    {
        return $this->id;
    }

    public function bindPaymentMethod(){
     if (in_array($this->method,MethodsTypes::getChoices(true))){

         return $this->method;
     }
     return MethodsTypes::NoMethod;
    }

}
