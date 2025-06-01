<?php

declare(strict_types=1);

namespace App\Recomendation;

use App\Domain\Student\Student;

interface SendRecomendationEmail
{
  public function send(Student $recomendationStudent, Student $recomendedStudent): void;
}
