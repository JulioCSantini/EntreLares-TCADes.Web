<?php

namespace App\Enums;

enum PointTransactionType: string
{
    case Resgate = 'RESGATE';
    case Adocao = 'ADOCAO';
    case TrocaCupom = 'TROCA_CUPOM';
}
