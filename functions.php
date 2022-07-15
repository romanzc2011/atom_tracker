<?php

// RETURNS FONT AWESOME PLAY ICON
function set_icon($icon){
    return '<i class="fa fa-'.$icon.'"></i>';
}

function date_nice(int $time){
    return date("M j Y h:i A", $time);
}

function time_nice($seconds){
    $hour = floor(($seconds/60) / 60);
    $minutes = round(($seconds/60) - ($hour * 60));
    return $hour.' hrs : '.$minutes.' mins';
}

function save($data){
    $json = json_encode($data);
    $file = fopen('data.json', 'w');
    fwrite($file, $json);
}


?>
