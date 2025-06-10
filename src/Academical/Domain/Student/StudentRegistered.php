<?php

declare(strict_types=1);

namespace App\Academical\Domain\Student;

use App\Shared\Domain\Cpf;
use App\Shared\Domain\Event\Event;
use DateTimeImmutable;

class StudentRegistered implements Event
{
  private string $eventName;
  private \DateTimeImmutable $moment;
  private Cpf $cpf;

  public function __construct(Cpf $cpf)
  {
    $this->moment = new DateTimeImmutable();
    $this->eventName = 'StudentRegistered';
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

  public function eventName(): string
  {
    return $this->eventName;
  }

  public function jsonSerialize(): mixed
  {
    return get_object_vars($this);
  }
}
