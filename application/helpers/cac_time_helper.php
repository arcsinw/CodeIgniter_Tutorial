<?php
function time_convert($time)
{
    $month = date('M', strtotime($time));
    $year = date('Y', strtotime($time));

    // $dic = [1 => 'Jan',
    //         2 => 'Feb',
    //         3 => 'Mar',
    //         4 => 'Apr',
    //         5 => 'May',
    //         6 => 'June',
    //         7 => 'July',
    //         8 => 'Aug',
    //         9 => 'Sep',
    //         10 => 'Oct',
    //         11 => 'Nov',
    //         12 => 'Dec'];

    return $month . ' ' . $year;
}