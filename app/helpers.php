<?php

if (!function_exists('format_rupiah')) {
    function format_rupiah($amount)
    {
        return 'Rp. ' . number_format($amount, 0, ",", ".");
    }
}

if (!function_exists('format_hari')) {
    function format_hari($day)
    {
        if ($day == "Sunday") {
            return "Ahad";
        }elseif ("Monday") {
            return "Senin";
        }elseif ("Tuesday") {
            return "Selasa";
        }elseif ("Wednesday") {
            return "Rabu";
        }elseif ("Thursday") {
            return "Kamis";
        }elseif ("Friday") {
            return "Jumat";
        }elseif ("Saturday") {
            return "Sabtu";
        }
    }
}
