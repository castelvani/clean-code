<?php

declare(strict_types=1);

namespace App\Domain\Student;

class Telefone implements \Stringable
{
  private string $number;
  private string $ddd;

  public function __construct(string $number, string $ddd)
  {
    $this->setNumber($number);
    $this->setDdd($ddd);
  }

  private function setNumber(string $number): void
  {
    if (!preg_match('/^\d{8,9}$/', $number)) {
      throw new \InvalidArgumentException('Número de telefone inválido.');
    }
    $this->number = $number;
  }

  private function setDdd(string $ddd): void
  {
    if (!preg_match('/^\d{2}$/', $ddd)) {
      throw new \InvalidArgumentException('DDD inválido.');
    }
    $this->ddd = $ddd;
  }

  public function __toString(): string
  {
    return  "({$this->ddd}) {$this->number}";
  }

  public function getNumber(): string
  {
    return $this->number;
  }
}
