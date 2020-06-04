<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);




//require autoload file
require_once('vendor/autoload.php');
//require_once("model/validate.php");
require_once("model/data-layer.php");
session_start();
//var_dump($_SESSION);
//Create an instance of the Base class
$f3 = Base::instance();

//class called
$validator = new Validate();
$controller = new Controller($f3, $validator);
//default route
$f3->route('GET|POST /', function () use ($f3) {
    $GLOBALS['controller']->home();
});
// choose


//personal information
$f3->route('GET|POST /person', function () use ($f3) {
    $GLOBALS['controller']->person();
});

// interest
$f3->route('GET|POST /interest', function () use ($f3) {
    $GLOBALS['controller']->interest();
});

$f3->route('GET|POST /summary', function () {
//    var_dump($_SESSION['pre']);
//    echo "<br>";
//    var_dump($_SESSION['premium']);
    $GLOBALS['controller']->summary();

});

//profile
$f3->route('GET|POST /profile', function () use ($f3) {
    $GLOBALS['controller']->profile();


});




//run fat free (last things)
$f3->run();

