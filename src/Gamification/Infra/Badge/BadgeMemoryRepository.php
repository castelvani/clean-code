<?php

declare(strict_types=1);

namespace App\Gamification\Infra\Badge;

use App\Gamification\Domain\Badge\Badge;
use App\Gamification\Domain\Badge\BadgeRepository;
use App\Shared\Domain\Cpf;

class BadgeMemoryRepository implements BadgeRepository
{

  private array $badges = [];

  public function add(Badge $badge): void
  {
    $this->badges[] = $badge;
  }

  public function findByStudentCpf(Cpf $cpf): ?Badge
  {
    foreach ($this->badges as $badge) {
      if ((string) $badge->cpf() === (string) $cpf) {
        return $badge;
      }
    }
    return null;
  }
}
