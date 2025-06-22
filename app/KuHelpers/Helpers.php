<?php
namespace App\KuHelpers;

class Helpers {
    const MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'];

    // Valid BD Phone Numbers
    public static function validatePhoneNumber($numbers_array)
    {
        $valid_number = true;
        foreach ($numbers_array as $number) {
            if(!preg_match("/^(?:\+?88)?01[13-9]\d{8}$/", $number)) {
                $valid_number = false;
                break;
            }
        }

        return $valid_number;
    }

    public static function storeFile($file, $name, $path = '/', $disk = [])
    {
        $filename = $name . '.' . $file->extension();
        $path = $file->storeAs($path, $filename, $disk);
        return basename($path);
    }

    public static function calculate_after_discount_price($price, $percent)
    {
        $discount_price = $price - (($percent * $price)/100);
        return round($discount_price, 2);
    }




}
