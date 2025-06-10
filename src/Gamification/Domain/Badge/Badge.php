<?php

declare(strict_types=1);

namespace App\Gamification\Domain\Badge;

use App\Shared\Domain\Cpf;

class Badge
{
  private Cpf $cpf;
  private string $name;

  public function __construct(Cpf $cpf, string $name)
  {
    $this->cpf = $cpf;
    $this->name = $name;
  }

  public function cpf()
  {
    return $this->cpf;
  }
}
