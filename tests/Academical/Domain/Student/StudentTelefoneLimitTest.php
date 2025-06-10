<?php

namespace App\Tests\Academical\Domain\Student;

use App\Academical\Domain\Student\Student;
use PHPUnit\Framework\TestCase;

class StudentTelefoneLimitTest extends TestCase
{
  public function testStudentTelefoneLimit()
  {
    $student = Student::withCpfEmailName('123.123.123-12', 'ggnei@hotmail.com', 'Gabriel');

    $student->addTelefone('123456789', '11');
    $student->addTelefone('987654321', '11');

    $this->expectException(\App\Academical\Domain\Student\StudentTelefoneLimit::class);

    $student->addTelefone('987654322', '21');

    $this->assertCount(2, $student->getTelefones());
  }
}
