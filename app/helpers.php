<?php

if (! function_exists('shortNumber')) {
    // Original Source : https://stackoverflow.com/a/52490452
    function humanReadableNumber($num) {
        $units = ['', 'K', 'M', 'B', 'T'];
        
        for ($i = 0; $num >= 1000; $i++) {
            $num /= 1000;
        }
        
        return round($num, 1) . $units[$i];
    }
}
