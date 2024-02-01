<?php
namespace App\Enums;

enum FarmLevel: string
{
    case Municipal = 'Municipal';
    case Provincial = 'Provincial';

    public function labels(): string
    {
        return match ($this) {
            self::Municipal => 'Municipal',
            self::Provincial => 'Provincial',
        };
    }

    public function labelPowergridFilter(): string
    {
        return $this->labels();
    }
}