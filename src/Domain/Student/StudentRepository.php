<?php

namespace App\Domain\Student;

use App\Domain\Cpf;

interface StudentRepository
{
  public function add(Student $student): void;

  public function findByCpf(Cpf $cpf): ?Student;
}
