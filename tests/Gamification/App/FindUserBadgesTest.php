<?php

declare(strict_types=1);

namespace App\Tests\Gamification\App;

use App\Academical\App\Student\Register\RegisterStudent;
use App\Academical\App\Student\Register\RegisterStudentDTO;
use App\Academical\Domain\Student\Student;
use App\Gamification\App\FindUserBadges\FindUserBadges;
use App\Academical\Infra\Student\StudentMemoryRepository;
use App\Gamification\App\FindUserBadges\FindUserBadgesDTO;
use App\Gamification\Domain\Badge\Badge;
use App\Gamification\Infra\Badge\BadgeMemoryRepository;
use PHPUnit\Framework\TestCase;

class FindUserBadgesTest extends TestCase
{

  public function testBadgeAdded()
  {
    $badgeRepository = new BadgeMemoryRepository();
    $student = Student::withCpfEmailName(
      cpf: '123.123.123-10',
      email: 'walter@white.com',
      name: 'Walter White'
    );

    $badgeRepository->add(new Badge(
      cpf: $student->getCpf(),
      name: 'Badge 1',
    ));
    $findUserBadgesDTO = new FindUserBadgesDTO('123.123.123-10');
    $findUserBadgesService = new FindUserBadges($badgeRepository);
    $badgesFound = $findUserBadgesService->execute($findUserBadgesDTO);

    $this->assertEquals('123.123.123-10', (string) $badgesFound->cpf());
  }
}
