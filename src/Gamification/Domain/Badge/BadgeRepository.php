<?php

declare(strict_types=1);

namespace App\Gamification\Domain\Badge;

use App\Gamification\Domain\Badge\Badge;
use App\Shared\Domain\Cpf;

interface BadgeRepository
{
  public function add(Badge $badge): void;

  public function findByStudentCpf(Cpf $cpf): ?Badge;
}
