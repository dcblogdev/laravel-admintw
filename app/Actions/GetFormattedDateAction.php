<?php

declare(strict_types=1);

namespace App\Actions;

use Carbon\Carbon;
use DateTime;
use Exception;

class GetFormattedDateAction
{
    /**
     * @throws Exception
     */
    public function __invoke(null|string|Carbon $date): string
    {
        if ($date === null) {
            return '';
        }

        return is_string($date) ? (new DateTime($date))->format('Y-m-d') : $date->format('Y-m-d');
    }
}
