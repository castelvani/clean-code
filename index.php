<?php

require 'vendor/autoload.php';

use App\Academical\App\Student\Register\RegisterStudent;
use App\Academical\App\Student\Register\RegisterStudentDTO;
use App\Shared\Domain\Event\EventPublisher;
use App\Academical\Domain\Student\LogRegisteredStudent;
use App\Gamification\App\GenerateNewbieBadge;
use App\Academical\Infra\Student\StudentMemoryRepository;
use App\Gamification\Infra\Badge\BadgeMemoryRepository;

$cpf = $argv[1] ?? null;
$name = $argv[2] ?? null;
$email = $argv[3] ?? null;
$telefone = $argv[4] ?? null;

$repository = new StudentMemoryRepository();
$publisher = new EventPublisher();
$publisher->addListener(new LogRegisteredStudent());
$publisher->addListener(new GenerateNewbieBadge(new BadgeMemoryRepository()));
$useCase = new RegisterStudent($repository);
$useCase->execute(new RegisterStudentDTO(
  cpf: $cpf,
  name: $name,
  email: $email,
  telefone: $telefone
));
