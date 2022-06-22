<?php
class Customer
{
    public $name;
    private $age;
    private $lastName;

    public function getName()
    {
        return $this->name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setLastName($name)
    {
        $name = trim($name);

        if ($name == "") {
            return false;
        }
        $this->lastName = $name;
        return true;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

}


$customer = new Customer();
$customer->name = "Bob";
echo $customer->getName();

$customer->setAge(20);
echo $customer->getAge();

$isSet = $customer->setLastName("");
if ($isSet) {
    echo $customer->getLastName();
}

$isSet = $customer->setLastName("Marley");
echo $customer->getLastName();

?>