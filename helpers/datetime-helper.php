<?php
function qd_datetime_to_js($datetime)
{
    if($datetime!=null)
    {
        $year = $datetime->format("Y");
        $month_0 = $datetime->format("m") - 0;
        $day = $datetime->format("d");
        return $year.', '.$month_0.', '.$day;
    }
    return '';
}
function qd_js_to_datetime($year_month_date)
{
    $arr = explode(',',$year_month_date);
    $tmp = DateTime::createFromFormat('Y, m, d', $arr[0].', '.($arr[1]+1).', '.$arr[2]);
    return $tmp;
}


