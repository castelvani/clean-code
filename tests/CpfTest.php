<?php

namespace App\Tests;

use App\Domain\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
  public function testValidCpf()
  {
    $cpf = new Cpf('123.456.789-09');
    $this->assertEquals('123.456.789-09', (string) $cpf);
  }
}
