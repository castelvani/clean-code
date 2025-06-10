<?php

declare(strict_types=1);

namespace App\Academical\App\Recomendation;

use App\Academical\Domain\Student\Student;

interface SendRecomendationEmail
{
  public function send(Student $recomendationStudent, Student $recomendedStudent): void;
}
