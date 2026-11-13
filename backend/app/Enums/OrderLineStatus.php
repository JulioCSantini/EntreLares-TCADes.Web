<?php

namespace App\Enums;

enum OrderLineStatus: string
{
    case Pendente = 'PENDENTE';
    case Aceito = 'ACEITO';
    case Recusado = 'RECUSADO';
}
