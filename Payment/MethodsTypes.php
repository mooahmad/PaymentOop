<?php
namespace App;



final class MethodsTypes
{
    const NoMethod = 'failed';

    const BankTransfer = 'bank_transfer';
    const Default_BankTransfer = 1;

    const CreditCard = 'credit_card';
    const Default_CreditCard = 2;

    /**
     * Get device types list.
     *
     * @param $reversed boolean
     * @return array
     */
    public static function getChoices($reversed = false)
    {
        if ($reversed) {
            return array(
                self::Default_BankTransfer => self::BankTransfer,
                self::Default_CreditCard => self::CreditCard,
            );
        }
        return array(
            self::BankTransfer => self::Default_BankTransfer,
            self::CreditCard => self::Default_CreditCard,
        );
    }

    public static function getLabel($role)
    {
        $roles = self::getChoices();

        return isset($roles[$role]) ? $roles[$role] : 'others';
    }
}