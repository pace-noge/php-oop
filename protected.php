<?php

class Customer
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    protected function format()
    {
        return ucwords($this->name);
    }

    public function getName()
    {
        return $this->format($this->name);
    }
}


class VIP extends Customer
{
    public function getFormattedName()
    {
        return ucwords($this->name);
    }

    protected function format()
    {
        return strtoupper($this->name);
    }
}

$alex = new VIP('alex ferguson');
echo $alex->getFormattedName()."\n";


$bob = new Customer('bob allen');
echo $bob->getName()."\n";

$bilal = new VIP("bilal nasariza");
echo $bilal->getName()."\n";

?>
