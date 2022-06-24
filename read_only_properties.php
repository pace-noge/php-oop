<?php

class User
{
    public readonly string $username;
    public string $password;

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
}

$user = new User();
$user->setUsername("Joe");
var_dump($user);
?>