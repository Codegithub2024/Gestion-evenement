<?php

namespace App\Traits;

use DateTimeInterface;

trait SerializeIso8601
{
    /**
     * Prépare une date pour la sérialisation Array / JSON.
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('c'); // 'c' est le format ISO 8601 complet en PHP
    }
}
