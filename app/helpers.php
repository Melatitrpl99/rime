<?php

function numerify(float $number = null, bool $useDecimal = false): String
{
    return number_format($number ?? 0, $useDecimal ? 2 : 0, ',', '.');
}

function rp(float $number = null, bool $useDecimal = true): String
{
    return 'Rp ' . numerify($number, $useDecimal);
}
