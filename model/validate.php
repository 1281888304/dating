<?php
function validName($name)
{
    $name = str_replace(' ', '', $name);
    return !empty($name) && ctype_alpha($name);
}
function validPhone($age){
    if(is_numeric($age)){
        return true;
    }
    else{
        return false;
    }
}
function validAge($age){
    if ($age>18 && $age<118){
        return true;
    }
    else{
        return false;
    }
}
function validEmail($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }else{
        return false;
    }
}
function validInterest($interest){
    $indoor=array("tv","movies","cooking",
        "boardgame", "puzzles","readying","playingCard","videoGame");
    if(in_array($interest,$indoor)){
        return true;
    }
    else{
        return false;
    }
}
function validInterest2($interest){
    $outdoor=array("hiking","biking", "football","running","jogging",
        "walking","swimming","Jumping");
    if(in_array($interest,$outdoor)){
        return true;
    }
    else{
        return false;
    }
}