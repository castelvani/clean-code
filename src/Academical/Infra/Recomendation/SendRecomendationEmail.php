<?php

declare(strict_types=1);

namespace App\Infra\Recomendation;

use App\Academical\Domain\Student\Student;
use App\Recomendation\SendRecomendationEmail;

class SendRecomendationEmailMailer implements SendRecomendationEmail
{
  public function send(Student $recomendationStudent, Student $recomendedStudent): void
  {
    mail(
      (string) $recomendedStudent->getEmail(),
      'Recomendação de Estudante',
      "Olá,\n\nVocê foi recomendado por {$recomendationStudent->getName()}.\n\nAtenciosamente,\nEquipe"
    );
  }
}
