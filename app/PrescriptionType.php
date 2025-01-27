<?php

namespace App;

enum PrescriptionType:string
{
    case Ordinaria = 'ordinary';
    case Excepcional = 'exceptional';

    public function label(): string
    {
        return match($this) {
            self::Ordinaria => 'Ordinaria',
            self::Excepcional => 'Excepcional',
        };
    }
}
