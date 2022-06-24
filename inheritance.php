<?php

require 'savingAccount.php';

$account = new SavingAccount();
$account->deposit(100);
echo $account->getBalance();

$account->setInterestRate(0.05);
$account->addInterest();
echo $account->getBalance();