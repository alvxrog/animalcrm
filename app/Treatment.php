<?php

namespace App;

enum Treatment:string
{
    case Terapeutico = 'therapeutic';
    case Profilactico = 'profilactic';
    case Metafilactico = 'metafilactic';

    public function label(): string
    {
        return match($this) {
            self::Terapeutico => 'Terapéutico',
            self::Profilactico => 'Profiláctico',
            self::Metafilactico => 'Metafiláctico',
        };
    }
}
