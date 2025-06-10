<?php

declare(strict_types=1);

namespace App\Gamification\App\FindUserBadges;

class FindUserBadgesDTO
{
  public string $cpf;

  public function __construct(string $cpf)
  {
    $this->cpf = $cpf;
  }
}
