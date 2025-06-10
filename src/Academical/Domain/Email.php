<?php

declare(strict_types=1);

namespace App\Academical\Domain;

class Email implements \Stringable
{
  private string $address;

  public function __construct(string $address)
  {
    if (!filter_var($address, FILTER_VALIDATE_EMAIL)) throw new \InvalidArgumentException("Invalid Email address: $address");

    $this->address = $address;
  }

  public function __toString(): string
  {
    return $this->address;
  }
}
