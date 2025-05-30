<?php

declare(strict_types=1);

namespace App\Domain\Recomendation;

use App\Domain\Student\Student;

class Recomendation
{
  private Student $recomendedStudent;
  private Student $recomendingStudent;
  private \DateTimeImmutable $date;

  public function __construct(Student $recomendedStudent, Student $recomendingStudent)
  {
    $this->recomendedStudent = $recomendedStudent;
    $this->recomendingStudent = $recomendingStudent;

    $this->date = new \DateTimeImmutable();
  }
}
