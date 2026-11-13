<?php

namespace App\Support;

use RuntimeException;

class CpfHasher
{
    public static function hash(string $cpf): string
    {
        $digits = preg_replace('/\D/', '', $cpf) ?? '';
        $key = (string) config('cpf.hmac_key');

        if ($key === '') {
            throw new RuntimeException('CPF_HMAC_KEY não definida.');
        }

        return hash_hmac('sha256', $digits, $key);
    }
}
