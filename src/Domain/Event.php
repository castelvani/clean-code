<?php

declare(strict_types=1);

namespace App\Domain;

interface Event
{
  public function moment(): \DateTimeImmutable;
}
