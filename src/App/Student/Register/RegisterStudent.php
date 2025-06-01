<?php

declare(strict_types=1);

namespace App\App\Student\Register;

use App\Domain\Student\Student;
use App\Infra\Student\StudentMemoryRepository;

class RegisterStudent
{
  private StudentMemoryRepository $repository;

  public function __construct(StudentMemoryRepository $repository)
  {
    $this->repository = $repository;
  }

  public function execute(RegisterStudentDTO $data): void
  {
    $student = Student::withCpfEmailName(
      $data->cpf,
      $data->email,
      $data->name
    );

    $this->repository->add($student);
  }
}
