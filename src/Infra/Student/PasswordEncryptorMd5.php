<?php

declare(strict_types=1);

use App\Domain\Student\PasswordEncryptor;

class PasswordEncryptorMd5 implements PasswordEncryptor
{
  /**
   * Encrypts a password using MD5.
   *
   * @param string $password The password to encrypt.
   * @return string The encrypted password.
   */
  public function encrypt(string $password): string
  {
    return md5($password);
  }

  /**
   * Validates a password against an encrypted password.
   *
   * @param string $password The plain text password to validate.
   * @param string $encryptedPassword The encrypted password to validate against.
   * @return bool True if the password is valid, false otherwise.
   */
  public function validate(string $password, string $encryptedPassword): bool
  {
    return md5($password) === $encryptedPassword;
  }
}
