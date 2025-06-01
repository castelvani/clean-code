<?php

declare(strict_types=1);

namespace App\Tests\App\Student;

use App\App\Student\Register\RegisterStudent;
use App\App\Student\Register\RegisterStudentDTO;
use App\Domain\Cpf;
use App\Infra\Student\StudentMemoryRepository;
use PHPUnit\Framework\TestCase;

class RegisterStudentTest extends TestCase
{

  public function testStudentShouldBeRegistered()
  {
    $registeredStudent = new RegisterStudentDTO(
      '111.123.456-78',
      'João da Silva',
      'joao@gmail.com',
      '11987654321'
    );

    $repository = new StudentMemoryRepository();

    $useCase = new RegisterStudent($repository);
    $useCase->execute($registeredStudent);

    $student = $repository->findByCpf(new Cpf('111.123.456-78'));

    $this->assertSame('João da Silva', $student->getName());
  }
}
