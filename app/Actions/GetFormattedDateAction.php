<?php

declare(strict_types=1);

namespace App\Actions;

use Carbon\CarbonImmutable;
use DateTimeImmutable;
use Exception;

class GetFormattedDateAction
{
    /**
     * @throws Exception
     */
    public function __invoke(null|string|CarbonImmutable $date): string
    {
        if ($date === null) {
            return '';
        }

        if ($date instanceof CarbonImmutable) {
            return $date->format('Y-m-d');
        }

        return (new DateTimeImmutable($date))->format('Y-m-d');
    }
}
