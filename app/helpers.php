<?php

use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

function convertedDate($date)
{
    date_default_timezone_set('Asia/Dhaka');
    $strDate = date('l, j F, Y', strtotime($date));
    $engDate = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    $bangDate = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার'];
    $convertedDate = str_replace($engDate, $bangDate, $strDate);
    return $convertedDate;
}
function convertedNumber($number)
{
    $engNumber = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
    $bnNumber = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০',];
    $convertedNumber = str_replace($engNumber, $bnNumber, $number);
    return $convertedNumber;
}

function make_slug($string)
{
    return preg_replace('/\s+/u', '-', trim($string));
}
if (!function_exists('ActiveRoutes')) {
    function ActiveRoutes(array $routes, $output = "active1")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
        }
    }
}


?>