<?php

declare(strict_types=1);

namespace App\Academical\App\Student\Register;

use App\Shared\Domain\Event\EventPublisher;
use App\Academical\Domain\Student\LogRegisteredStudent;
use App\Academical\Domain\Student\Student;
use App\Academical\Domain\Student\StudentRegistered;
use App\Academical\Infra\Student\StudentMemoryRepository;
use App\Academical\App\Student\Register\RegisterStudentDTO;

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
