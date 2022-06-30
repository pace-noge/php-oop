<?php

declare(strict_types=0);

class BankAccount
{
    private $accountNumber;
    private $balance;
    
    public function __construct(
        $accountNumber,
        $balance
    ) {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    public function __toString()
    {
        return "Bank Account: $this->accountNumber, Balance: $$this->balance";
    }
}

$account = new BankAccount('12345678', 100);
echo $account;


class Quarter
{
    private $number;

    public function __construct($number)
    {
        if ($number < 0 && $number > 4) {
            throw new InvalidArgumentException('Quarter must be between 1 and 4');
        }
        $this->number = $number;
    }

    public function __toString()
    {
        return $this->number;
    }
}

$quarter = new Quarter(5);
echo $quarter;

?>