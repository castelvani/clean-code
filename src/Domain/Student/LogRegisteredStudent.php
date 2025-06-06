<?php

declare(strict_types=1);

namespace App\Domain\Student;

use App\Domain\Event;
use App\Domain\EventListener;

class LogRegisteredStudent extends EventListener
{
  /**
   * @param \RegisteredStudent $event
   */
  public function reactTo(Event $event): void
  {
    fprintf(
      STDERR,
      "Student with CPF %s registered at %s\n",
      (string) $event->cpf(),
      $event->moment()->format('Y-m-d H:i:s')
    );
  }

  public function processable(Event $event): bool
  {
    return $event instanceof StudentRegistered;
  }
}
