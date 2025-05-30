<?php

declare(strict_types=1);

namespace App\Domain;

class Cpf implements \Stringable
{
  private string $number;

  public function __construct(string $number)
  {
    $this->setNumber($number);
  }

  private function setNumber(string $number): void
  {
    // Remove non-numeric characters
    $options = [
      'options' => [
        'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
      ]
    ];

    if (filter_var($number, FILTER_VALIDATE_REGEXP, $options) === false) {
      throw new \InvalidArgumentException("Invalid CPF number: $number");
    }

    $this->number = $number;
  }

  public function __toString(): string
  {
    return $this->number;
  }
}
