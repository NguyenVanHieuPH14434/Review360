<?php
    if (!function_exists('generateCode')) {
        function generateCode(string $prefix, $number)
        {
            $number = $number ? (int) $number + 1 : 00001;
            $code = sprintf('%05d', $number);
            return $prefix . $code;
        }
    }
?>