<?php

require 'vendor/autoload.php';

use App\Domain\Student\Student;
use App\Infra\Student\StudentMemoryRepository;

$cpf = $argv[1] ?? null;
$name = $argv[2] ?? null;
$email = $argv[3] ?? null;
$telefone = $argv[4] ?? null;

$student = Student::withCpfEmailName($cpf, $email, $name, $telefone);
$repository = new StudentMemoryRepository();
$repository->add($student);
