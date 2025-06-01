<?php

declare(strict_types=1);

namespace App\App\Student\Register;

class RegisterStudentDTO
{
  public string $cpf;
  public string $name;
  public string $email;
  public string $telefone;

  public function __construct(string $cpf, string $name, string $email, string $telefone)
  {
    $this->cpf = $cpf;
    $this->name = $name;
    $this->email = $email;
    $this->telefone = $telefone;
  }
}
