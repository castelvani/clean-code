<?php

namespace App\Infra\Student;

use App\Domain\Cpf;
use App\Domain\Student\Student;
use App\Domain\Student\StudentRepository as StudentStudentRepository;
use PDO;

class StudentRepository implements StudentStudentRepository
{
  private PDO $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function add(Student $student): void
  {
    $sql = 'INSERT INTO students (cpf, name, email) VALUES (:cpf, :name, :email)';
    $stmt = $this->connection->prepare($sql);
    $stmt->bindValue(':cpf', (string) $student->getCpf());
    $stmt->bindValue(':name', $student->getName());
    $stmt->bindValue(':email', $student->getEmail());
    $stmt->execute();

    $sql = 'INSERT INTO telefones (ddd, number, :student_cpf) VALUES (:ddd, :number, :student_cpf)';
    $stmt = $this->connection->prepare($sql);
    $stmt->bindValue(':student_cpf', $student->getCpf());

    foreach ($student->getTelefones() as $telefone) {
      $stmt->bindValue(':ddd', $telefone->getDdd());
      $stmt->bindValue(':number', $telefone->getNumber());
      $stmt->execute();
    }
  }

  public function findByCpf(Cpf $cpf): ?Student
  {
    // $sql = 'SELECT * FROM students WHERE cpf = :cpf';
    // $stmt = $this->connection->prepare($sql);
    // $stmt->bindValue(':cpf', (string) $cpf);
    // $stmt->execute();
    // $result = $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
