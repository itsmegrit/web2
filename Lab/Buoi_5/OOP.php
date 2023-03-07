<?php

class Person
{

  protected $name;
  protected $age;

  /**
   * @return mixed
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param mixed $name 
   * @return self
   */
  public function setName($name): self
  {
    $this->name = $name;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getAge()
  {
    return $this->age;
  }

  /**
   * @param mixed $age 
   * @return self
   */
  public function setAge($age): self
  {
    $this->age = $age;
    return $this;
  }

  private function callToPrivateNameAndAge()
  {
    return "{$this->name} is {$this->age} years old";
  }

  protected function callToProtectedNameAndAge()
  {
    return "{$this->name} is {$this->age} years old";
  }

  public function show()
  {
    echo 'Name' . $this->name . 'age' . $this->age;
  }

}
class Employee extends Person
{
  private $employeeCode;
  private $salary;


  /**
   * @return mixed
   */
  public function getEmployeeCode()
  {
    return $this->employeeCode;
  }

  /**
   * @param mixed $employeeCode 
   * @return self
   */
  public function setEmployeeCode($employeeCode): self
  {
    $this->employeeCode = $employeeCode;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getSalary()
  {
    return $this->salary;
  }

  /**
   * @param mixed $salary 
   * @return self
   */
  public function setSalary($salary): self
  {
    $this->salary = $salary;
    return $this;
  }

  public function getNameAndAge()
  {
    return $this->callToProtectedNameAndAge();
  }

  public function show()
  {
    Person::show();
    echo $this->employeeCode . $this->salary . '<br/>';
  }
}

class Counter
{
  public static $count = 0;
  var $startPoint = 0;

  function increament()
  {
    self::$count++;
  }

  public static function countAll()
  {
    echo self::$count++ . '<br/>';
  }

  function increament1()
  {
    echo ++$this->startPoint . "<br/>";
  }
}

echo "======================================<br/>";
$aCounter = new Counter();
$aCounter->increament();
echo "Gia tri o ham Counter<br/>";
echo Counter::$count . "<br/>";
$aCounter->increament();
echo "Counter hien tai" . Counter::$count . "<br/>";
echo "Counter All: ";
Counter::countAll();
echo "Counter hien tai " . Counter::$count . "<br/>";
echo "Goi ham tang startPoint: <br/>";
$aCounter->increament1();
$aCounter->increament1();
$aCounter->increament1();
echo "<br/>==================================<br/>";
$employee = new Employee();
$employee->setName("Bob smith");
$employee->setAge(30);
$employee->setEmployeeCode('001');
$employee->setSalary("30k");

echo $employee->getName();
echo $employee->getAge();
echo $employee->getEmployeeCode();
echo $employee->getNameAndAge();

echo "<br/>Goi phuong thuc show: ";

$employee->show();