<?php

namespace App\Shared\Domain\Event;

use App\Shared\Domain\Event\Event;

abstract class EventListener
{
  public function process(Event $event): void
  {
    if ($this->processable($event)) {
      $this->reactTo($event);
    }
  }

  abstract public function processable(Event $event): bool;

  abstract public function reactTo(Event $event): void;
}
