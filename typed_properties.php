<?php

// declare(strict_types=1);

class BankAccount
{
    public float $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}

$account = new BankAccount(100);
var_dump($account->balance);


$account2 = new BankAccount("100.5");
var_dump($account2->balance);
?>