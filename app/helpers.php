<?php

/**
 * Convert numeric values to pre-formatted strings
 */
function numerify(
    float $number = null,
    bool $useDecimal = false,
    string $prepend = null,
    string $append = null
): string {

    if ($number == 0) {
        return '-';
    }

    return $prepend . number_format($number, $useDecimal ? 2 : 0, ',', '.') . $append;
}

/**
 * Attempt to pre-format values to Indonesian Rupiah (IDR) currency.
 */
function rp(float $number = null, bool $useDecimal = true): string
{
    if ($number == 0) {
        return '-';
    }

    return numerify($number, $useDecimal, 'Rp ');
}
