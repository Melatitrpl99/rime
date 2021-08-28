<?php

function numerify(float $number = null, bool $useDecimal = false): String
{
    if ($number == 0) {
        return '-';
    }

    return number_format($number, $useDecimal ? 2 : 0, ',', '.');
}

function rp(float $number = null, bool $useDecimal = true): String
{
    if ($number == 0) {
        return '-';
    }

    return 'Rp ' . numerify($number, $useDecimal);
}
