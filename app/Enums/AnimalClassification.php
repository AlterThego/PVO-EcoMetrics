<?php
namespace App\Enums;

enum AnimalClassification: string
{
    case Fish = 'Fish';
    case Livestock = 'Livestock';
    case Poultry = 'Poultry';
    case Pet = 'Pet';
    case Insect = 'Insect';

    public function labels(): string
    {
        return match ($this) {
            self::Fish => 'Fish',
            self::Livestock => 'Livestock',
            self::Poultry => 'Poultry',
            self::Pet => 'Pet',
            self::Insect => 'Insect',
        };
    }

    public function labelPowergridFilter(): string
    {
        return $this->labels();
    }
}