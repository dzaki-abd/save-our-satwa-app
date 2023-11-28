<?php

if (!function_exists('getFullDateID')) {
    /**
     * Get the name of the month based on its numeric representation.
     *
     * @param int $month Numeric representation of the month (1 to 12).
     * @return string|null Name of the month or null if the input is invalid.
     */
    function getFullDateID()
    {
        $currentDate = now();

        // Array of month names
        $monthNames = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Extract day, month, and year
        $day = $currentDate->format('d');
        $month = $monthNames[$currentDate->format('n') - 1];
        $year = $currentDate->format('Y');

        return "{$day} {$month} {$year}";
    }
}