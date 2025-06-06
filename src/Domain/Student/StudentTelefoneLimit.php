<?php

declare(strict_types=1);

namespace App\Domain\Student;

use DomainException;

class StudentTelefoneLimit extends DomainException
{
  public function __construct(string $message = 'Apenas dois telefones são permitidos.')
  {
    parent::__construct($message);
  }
}
