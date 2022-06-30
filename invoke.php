<?php


class MyClass
{
    public function __invoke(...$arguments)
    {
        echo 'Called to the __invoke method';
    }
}

$instance = new MyClass();
$instance();


class Comparator
{
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function __invoke($a, $b)
    {
        return $a[$this->key] <=> $b[$this->key];
    }
}

$customers = [
    ['id' => 1, "name" => 'John', 'credit' => 20000],
    ['id' => 2, 'name' => 'Doe', 'credit' => 10000],
    ["id" => 3, "name" => "Bob", "credit" => 15000],
];

usort($customers, new Comparator('name'));
print_r($customers);
usort($customers, new Comparator("credit"));
print_r($customers);
?>