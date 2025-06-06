<?php

require 'vendor/autoload.php';

use App\App\Student\Register\RegisterStudent;
use App\App\Student\Register\RegisterStudentDTO;
use App\Domain\EventPublisher;
use App\Domain\Student\LogRegisteredStudent;
use App\Domain\Student\Student;
use App\Infra\Student\StudentMemoryRepository;

$cpf = $argv[1] ?? null;
$name = $argv[2] ?? null;
$email = $argv[3] ?? null;
$telefone = $argv[4] ?? null;

$repository = new StudentMemoryRepository();
$publisher = new EventPublisher();
$publisher->addListener(new LogRegisteredStudent());
$useCase = new RegisterStudent($repository);
$useCase->execute(new RegisterStudentDTO(
  cpf: $cpf,
  name: $name,
  email: $email,
  telefone: $telefone
));
