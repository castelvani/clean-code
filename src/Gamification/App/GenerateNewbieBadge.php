<?php

declare(strict_types=1);

namespace App\Gamification\App;

use App\Gamification\Domain\Badge\Badge;
use App\Gamification\Domain\Badge\BadgeRepository;
use App\Shared\Domain\Event\Event;
use App\Shared\Domain\Event\EventListener;

class GenerateNewbieBadge extends EventListener
{
  private BadgeRepository $badgeRepository;

  public function __construct(BadgeRepository $badgeRepository)
  {
    $this->badgeRepository = $badgeRepository;
  }

  public function processable(Event $event): bool
  {
    return $event->eventName() === 'StudentRegistered';
  }

  public function reactTo(Event $event): void
  {
    $data = $event->jsonSerialize();
    $cpf = $data['cpf'];

    $badge = new Badge($cpf, 'Newbie');

    $this->badgeRepository->add($badge);
  }
}
