<?php

declare(strict_types=1);

namespace App\Domain\Student;

use App\Domain\Cpf;
use App\Domain\Event;
use DateTimeImmutable;

class StudentRegistered implements Event
{
  private \DateTimeImmutable $moment;
  private Cpf $cpf;

  public function __construct(Cpf $cpf)
  {
    $this->moment = new DateTimeImmutable();
    $this->cpf = $cpf;
  }

  public function cpf(): Cpf
  {
    return $this->cpf;
  }

  public function moment(): DateTimeImmutable
  {
    return $this->moment;
  }
}
