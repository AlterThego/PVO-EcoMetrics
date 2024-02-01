<?php
namespace App\Enums;

enum FarmSector: string
{
    case Government = 'Government';
    case Commercial = 'Commercial';

    public function labels(): string
    {
        return match ($this) {
            self::Government => 'Government',
            self::Commercial => 'Commercial',
        };
    }

    public function labelPowergridFilter(): string
    {
        return $this->labels();
    }
}