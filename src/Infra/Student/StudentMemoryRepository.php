<?php

declare(strict_types=1);

namespace App\Infra\Student;

use App\Domain\Cpf;
use App\Domain\Student\Student;
use App\Domain\Student\StudentRepository;

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
