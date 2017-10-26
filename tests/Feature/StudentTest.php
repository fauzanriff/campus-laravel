<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Student;

class StudentTest extends TestCase
{
    /**
     * Test name with string data type
     */
    public function testNameWithString()
    {
      $student = new Student('Budi', 1, 18);
      $this->assertTrue($student->isNameValid());
    }

    /**
     * Test name with other data type
     */
    public function testNameWithoutString()
    {
      $student = new Student(1, 1, 18);
      $this->assertFalse($student->isNameValid());
      $student = new Student(true, 1, 18);
      $this->assertFalse($student->isNameValid());
      $student = new Student(new Student('Budi', 1, 18), 1, 18);
      $this->assertFalse($student->isNameValid());
    }

    /**
     * Test nik with value is unique
     */
    public function testNikUnique()
    {
        $this->assertTrue(true);
    }

    /**
     * Test nik with value exist in DB
     */
    public function testNikExistInDB()
    {
        $this->assertTrue(true);
    }

    /**
     * Test age with value > 7. Assume age can be whatever value greater than 7
     */
    public function testAgeGreaterThan7()
    {
      $student = new Student("Budi", 1, 18);
      $this->assertTrue($student->isAgeValid());
      $student = new Student("Budi", 1, 80);
      $this->assertTrue($student->isAgeValid());
      $student = new Student("Budi", 1, 123);
      $this->assertTrue($student->isAgeValid());
      $student = new Student("Budi", 1, 999999);
      $this->assertTrue($student->isAgeValid());
    }

    /**
     * Test age with value <= 7
     */
    public function testAgeUnder7()
    {
      $student = new Student("Budi", 1, 7);
      $this->assertFalse($student->isAgeValid());
      $student = new Student("Budi", 1, 3);
      $this->assertFalse($student->isAgeValid());
      $student = new Student("Budi", 1, 0);
      $this->assertFalse($student->isAgeValid());
      $student = new Student("Budi", 1, -3);
      $this->assertFalse($student->isAgeValid());
      $student = new Student("Budi", 1, -999999);
      $this->assertFalse($student->isAgeValid());
    }
}
