<?php
namespace App\Enums;

enum FarmType: string
{
    case Breeding = 'Animal and Fishery Breeding';
    case Piggery = 'Piggery';

    case Poultry = 'Poultry';
    case Cattle = 'Cattle';

    public function labels(): string
    {
        return match ($this) {
            self::Breeding => 'Animal and Fishery Breeding',
            self::Piggery => 'Piggery',
            self::Poultry => 'Poultry',
            self::Cattle => 'Cattle',
        };
    }

    public function labelPowergridFilter(): string
    {
        return $this->labels();
    }
}