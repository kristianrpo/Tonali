<?php

if (! function_exists('formatPrice')) {
    function formatPrice(float $price): string
    {
        return '$'.number_format($price, 3).' COP';
    }
}