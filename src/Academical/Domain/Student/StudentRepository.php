<?php

namespace App\Academical\Domain\Student;

use App\Shared\Domain\Cpf;

interface StudentRepository
{
  public function add(Student $student): void;

  public function findByCpf(Cpf $cpf): ?Student;
}
