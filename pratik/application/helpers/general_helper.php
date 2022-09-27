<?php
function getCalendarinfo(){
    $CI =&get_instance();
    $data_calendar = $CI->db->where(array("company_id"=>getCompanyids()))->get("calendar")->result();
    $calendar = [];
    foreach ($data_calendar as $key => $val)
    {
        $calendar[] = array(
            'id' 	=> intval($val->id),
            'title' => $val->title,
            'description' => trim($val->description),
            'start' => date_format( date_create($val->start_date) ,"Y-m-d"),
            'end' 	=> date_format( date_create($val->end_date) ,"Y-m-d"),
            'color' => $val->color,
        );
    }
    $calInfo=json_encode($calendar);
    return $calInfo;
}
function getCompanyids(){
    return "234";
}