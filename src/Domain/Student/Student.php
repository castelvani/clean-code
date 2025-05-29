<?php

declare(strict_types=1);

namespace App\Domain\Student;

use App\Domain\Cpf;
use App\Domain\Email;

class Student
{
  private Cpf $cpf;
  private string $name;
  private Email $email;
  private array $telefones;

  public function __construct(Cpf $cpf, string $name, Email $email)
  {
    $this->cpf = $cpf;
    $this->name = $name;
    $this->email = $email;
  }

  // Named constructor to create a Student with CPF, Email, and Name
  public static function withCpfEmailName(string $cpf, string $email, string $name): self
  {
    $cpf = new Cpf($cpf);
    $email = new Email($email);

    return new Student($cpf, $name, $email);
  }

  public function addTelephone(string $numero, string $ddd): self
  {
    $this->telefones[] = new Telephone($numero, $ddd);

    return $this;
  }

  public function getCpf(): Cpf
  {
    return $this->cpf;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getEmail(): Email
  {
    return $this->email;
  }

  public function getTelefones(): array
  {
    return $this->telefones;
  }
}
