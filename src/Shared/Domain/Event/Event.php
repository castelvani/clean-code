<?php

declare(strict_types=1);

namespace App\Shared\Domain\Event;

interface Event extends \JsonSerializable
{
  public function moment(): \DateTimeImmutable;

  public function eventName(): string;
}
