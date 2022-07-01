<?php

class Customer
{
    private $id;
    private $name;
    private $email;


    public function __construct(int $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }


    public function getInitial()
    {
        if ($this->name != '') {
            return strtoupper(substr($this->name, 0, 1));
        }
    }

    // public function __sleep(): array
    // {
    //     return ['id', 'name'];
    // }
    public function __serialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => "*****"
        ];
    }
}


$customer = new Customer(10, 'John Doe', 'john.doe@example.com');
$str = serialize($customer);

var_dump($str);
?>