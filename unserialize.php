<?php

require 'FileReader.php';

class Customer
{

    private $id;
    private $name;
    private $email;

    public function __construct(
        int $id,
        string $name,
        string $email
    ) {
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
}

$customer = new Customer(10, 'John Doe', 'john.doe@example.com');
$str = serialize($customer);

file_put_contents('customer.dat', $str);

$str =  file_get_contents('customer.dat');
$customer = unserialize($str);

var_dump($customer);

echo "\n";

$fileName = 'objects.dat';

file_put_contents($fileName, serialize(new FileReader('readme.txt')));

$file_reader = unserialize(file_get_contents($fileName));
echo $file_reader->read();

$file_reader->close();

?>