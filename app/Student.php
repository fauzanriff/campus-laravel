<?php
  namespace App;

  /*
  * Student
  */
  class Student
  {

    /*
    * @var
    * name: string
    * nik: integer unique
    * age: integer
    */
    private $name;
    private $nik;
    private $age;

    /*
    * Construct student with the given name, nik, and age
    */
    public function __construct($name, $nik, $age)
    {
      $this->name = $name;
      $this->nik = $nik;
      $this->age = $age;
    }
    /*
    * Clone student
    */
    public function __clone(){}

    /*
    * Getter Setter
    * name, nik, age
    */
    public function setName($name)
    {
      $this->name = $name;
    }

    public function getName()
    {
      return $this->name;
    }

    public function setNik($nik)
    {
      $this->nik = $nik;
    }

    public function getNik()
    {
      return $this->nik;
    }

    public function setAge($age)
    {
      $this->age = $age;
    }

    public function getAge()
    {
      return $this->age;
    }

    /*
    * Function and Method
    */

    /*
    * Return true if all properties is valid.
    * name must be string.
    * nik must be unique.
    * age must be greater than 7.
    */
    public function isStudentValid()
    {
      return isNameValid() && isAgeValid();
    }

    /*
    * Return true if name is a string.
    */
    public function isNameValid()
    {
      if (is_string($this->name))
      {
        return true;
      }

      return false;
    }

    /*
    * Return true if foreach element in niklist doesnt have
    */
    public function isNikValid($niklist)
    {
      for($i = 0; $i < count($niklist); $i++)
      {
        if($this->nik === $niklist[$i])
        {
          return false;
        }
      }

      return true;
    }

    /*
    * Return true if age is greater than 7.
    */
    public function isAgeValid()
    {
      if ($this->age > 7)
      {
        return true;
      }

      return false;
    }

  }

>
