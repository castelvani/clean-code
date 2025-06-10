<?php

declare(strict_types=1);

namespace App\Academical\Infra\Student;

use App\Shared\Domain\Cpf;
use App\Academical\Domain\Student\Student;
use App\Academical\Domain\Student\StudentRepository;

class StudentMemoryRepository implements StudentRepository
{
  private array $students = [];

  public function add(Student $student): void
  {
    $this->students[(string) $student->getCpf()] = $student;
  }

  public function findByCpf(Cpf $cpf): ?Student
  {
    return $this->students[(string) $cpf] ?? null;
  }
}
