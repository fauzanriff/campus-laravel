<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Student;

class StudentTest extends TestCase
{
  use RefreshDatabase;

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
      // Create student for testing. This insert method will refresh after the testing success.
      DB::table('students')->insert(
          ['name' => 'Budi', 'nik' => 999999, 'age' => 18]
      );
      $student = new Student("Aryo", 999998, 19);
      $this->assertTrue($student->isNikValid());
    }

    /**
     * Test nik with value exist in DB
     */
    public function testNikExistInDB()
    {
      // Create student for testing. This insert method will refresh after the testing success.
      DB::table('students')->insert(
          ['name' => 'Budi', 'nik' => 999999, 'age' => 18]
      );
      $student = new Student("Aryo", 999999, 19);
      $this->assertFalse($student->isNikValid());
      $student = new Student("Budi", 999999, 18);
      $this->assertTrue($student->isNikValid());
      $student = new Student("Budi", 999999, 19);
      $this->assertFalse($student->isNikValid());
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
