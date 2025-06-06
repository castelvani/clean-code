<?php

declare(strict_types=1);

namespace App\App\Student\Register;

use App\Domain\EventPublisher;
use App\Domain\Student\LogRegisteredStudent;
use App\Domain\Student\Student;
use App\Domain\Student\StudentRegistered;
use App\Infra\Student\StudentMemoryRepository;

class RegisterStudent
{
  private StudentMemoryRepository $repository;
  private EventPublisher $eventPublisher;

  public function __construct(StudentMemoryRepository $repository)
  {
    $this->repository = $repository;
    $this->eventPublisher = new EventPublisher();
    $this->eventPublisher->addListener(new LogRegisteredStudent());
  }

  public function execute(RegisterStudentDTO $data): void
  {
    $student = Student::withCpfEmailName(
      $data->cpf,
      $data->email,
      $data->name
    );

    $this->repository->add($student);

    $this->eventPublisher->publish(new StudentRegistered($student->getCpf()));
  }
}
