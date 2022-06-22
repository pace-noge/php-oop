<?php

class BankAccount
{
    private $accountNumber;
    private $balance;


    function __construct($accountNumber, $balance)
    {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getAccountNumber()
    {
        return $this->accountNumber;
    }
}


$account = new BankAccount(1, 100);
echo $account->getBalance();

?>