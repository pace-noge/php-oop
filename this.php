<?php


class BankAccount
{
    public $accountNumber;
    public $balance;

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
        # return BankAccount object for chaining method
        return $this;
    }

    public function withdraw($amount)
    {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }
}


$account = new BankAccount();
$account->accountNumber = 1;
$account->balance = 50;
$account->deposit(100);
$account->withdraw(25);

var_dump($account);

$account->withdraw(25);
var_dump($account);

$account->deposit(100)
    ->deposit(50)
    ->deposit(25);

var_dump($account);

$account->deposit(100)
    ->withdraw(125);
var_dump($account);

?>

