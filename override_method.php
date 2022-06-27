<?php
class Robot
{
    public function greet()
    {
        return 'Hello!';
    }

    final public function id()
    {
        return uniqid();
    }
}

class Android extends Robot
{
    public function greet()
    {
        $greeting = parent::greet();
        return $greeting . ' from android';
    }

    // we can't do this
    // public function id()
    // {
    //     return uniqid('Android-');
    // }
}

$robot = new Robot();
echo $robot->greet()."\n";

$android = new Android();
echo $android->greet();
echo "\n";


class BankAccount
{
    private $balance;

    public function __construct($amount)
    {
        $this->balance = $amount;   
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
        return $this;
    }

    public function withdraw($amount)
    {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }
}


class  CheckingAccount extends BankAccount
{
    private $minBalance;

    public function __construct($amount, $minBalance)
    {
        if ($amount > 0 && $amount >= $minBalance) {
            parent::__construct($amount);
            $this->minBalance = $minBalance;
        } else {
            throw new InvalidArgumentException('amount must be more than zero than the minimum balance');
        }
    }

    public function withdraw($amount)
    {
        $canWithdraw = $amount > 0 && $this->getBalance() - $amount > $this->minBalance;

        if ($canWithdraw) {
            parent::withdraw($amount);
            return true;
        }
        return false;
    }
}


?>