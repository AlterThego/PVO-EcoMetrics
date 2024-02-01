<?php
namespace App\Enums;

enum VeterinaryClinicsSector: string
{
    case Government = 'Government';
    case Private = 'Private';

    public function labels(): string
    {
        return match ($this) {
            self::Government => 'Government',
            self::Private => 'Private',
        };
    }

    public function labelPowergridFilter(): string
    {
        return $this->labels();
    }
}