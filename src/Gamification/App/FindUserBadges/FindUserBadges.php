<?php

namespace App\Gamification\App\FindUserBadges;

use App\Gamification\Domain\Badge\BadgeRepository;
use App\Shared\Domain\Cpf;

class FindUserBadges
{
  private BadgeRepository $repository;

  public function __construct(BadgeRepository $repository)
  {
    $this->repository = $repository;
  }

  public function execute(FindUserBadgesDTO $data)
  {
    $studentCpf = new Cpf($data->cpf);
    return $this->repository->findByStudentCpf($studentCpf);
  }
}
