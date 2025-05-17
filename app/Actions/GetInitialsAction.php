<?php

declare(strict_types=1);

namespace App\Actions;

class GetInitialsAction
{
    public function __invoke(?string $name = ''): string
    {
        if (empty($name)) {
            return '';
        }

        $parts = explode(' ', $name);

        $initials = strtoupper($parts[0][0] ?? '');

        if (count($parts) > 1) {
            $initials .= strtoupper(end($parts)[0] ?? '');
        }

        return $initials;
    }
}
