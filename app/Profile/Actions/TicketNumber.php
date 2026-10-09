<?php

namespace App\Profile\Actions;

trait TicketNumber
{
    public function createNumber(int $int, ?string $symbol = null, ?int $count = null)
    {
        $symbol = $symbol ? $symbol : "T";
        $date = date('Y-m-d');
        $count = $count ? $count : 6;
        while ((string) $int < $count) {
            $int = random_int(0, 9) . $int;
        }

        $array = [$symbol, $date, $int];
        return implode("-", $array);
    }
}
