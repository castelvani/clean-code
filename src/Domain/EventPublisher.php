<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Event;
use App\Domain\EventListener;

class EventPublisher
{
  private array $listeners = [];

  public function addListener(EventListener $listener): void
  {
    $this->listeners[] = $listener;
  }

  public function publish(Event $event): void
  {
    foreach ($this->listeners as $listener) {
      $listener->process($event);
    }
  }
}
