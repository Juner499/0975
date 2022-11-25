<?php

class Person
{
  private $name;
  private $lastname;
  private $age;
  private $hp;
  private $mother;
  private $father;

  function __construct($name, $lastname, $age, $mother = null, $father = null)
  {
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->mother = $mother;
    $this->father = $father;
    $this->hp = 100;
  }

  function sayHi($name)
  {
    return "Hi $name, I`m " . $this->name;
  }

  function setHp($hp)
  {
    if ($this->hp + $hp >= 100) $this->hp = 100;
    else $this->hp = $this->hp + $hp;
  }
  function getHp()
  {
    return $this->hp;
  }
  function getName()
  {
    return $this->name;
  }
  function getMother()
  {
    return $this->mother;
  }
  function getFather()
  {
    return $this->father;
  }


  function getInfo()
  {
    return "
    <h2>A few words about myself.</h2><br>" . "My name is: " . $this->getName() . "<br>my father is: " . $this->getFather()->getName()
      . "<br>my mother is: " . $this->getMother()->getName()
      . "<br>my grandfather is: " . $this->getFather()->getFather()->getName()
      . "<br>my grandmother is: " . $this->getFather()->getMother()->getName()
      . "<br>my grandfather is: " . $this->getMother()->getFather()->getName()
      . "<br>my grandmother is: " . $this->getMother()->getMother()->getName();
    //* Необходимо дописать метод и вызвать для вывода на экран всей родни
  }
}
//! Здоровье человека не может быть более 100

$igor = new Person("Igor", "Petrov", 78);
$tatyana = new Person("Tatyana", "Petrova", 78);

$pavel = new Person("Pavel", "Ivanov", 78);
$oksana = new Person("Oksana", "Pavlova", 78);


$alex = new Person("Alex", "Ivanov", 42, $oksana, $pavel);
$olga = new Person("Olga", "Ivanova", 42, $tatyana, $igor);
$valera = new Person("Valera", "Ivanov", 15, $olga, $alex);

echo $valera->getInfo();
