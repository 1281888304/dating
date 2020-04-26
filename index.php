<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

//require autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//default route
$f3->route('GET /',function(){
    $view = new Template();
    echo $view->render
    ('views/home.html');


});

//run fat free (last things)
$f3->run();

