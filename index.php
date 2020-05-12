<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

session_start();

//require autoload file
require_once('vendor/autoload.php');
require_once("model/data-layer.php");
//Create an instance of the Base class
$f3 = Base::instance();

//default route
$f3->route('GET|POST /',function(){
    $view = new Template();
    echo $view->render
    ('views/home.html');


});
// choose
$f3->route('GET|POST /choose',function(){
    $view = new Template();
    echo $view->render('views/person.html');


});




//personal information
$f3->route('GET|POST /person',function() use ($f3) {
    $gender=getGender();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        //Data is valid

        //Store the data in the session array
        $_SESSION['firstName'] = $_POST['firstName'];
        $_SESSION['lastName'] = $_POST['lastName'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['gender'] = $_POST['gender'];

        //Redirect to Order 2 page
        $f3->reroute('profile');
    }


    $f3->set('genders',$gender);
    $view = new Template();
    echo $view->render
    ('views/person.html');


});

// interest
$f3->route('GET|POST /interest',function() use ($f3) {
    $indoor=getIndoor();
    $outdoor=getoutdoor();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['indoor'] = $_POST['indoor'];
        $_SESSION['outdoor'] = $_POST['outdoor'];


        $f3->reroute('summary');
    }

    $f3->set('indoors',$indoor);
    $f3->set('outdoors',$outdoor);
    $view = new Template();
    echo $view->render
    ('views/interest.html');

});

$f3->route('GET|POST /summary',function(){
    $view = new Template();
    echo $view->render('views/Summary.html');


});

//profile
$f3->route('GET|POST /profile',function() use ($f3) {
    $gender=getGender();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['seek']=$_POST['seek'];
        $_SESSION['bio']=$_POST['bio'];

        //Redirect to Order 2 page
        $f3->reroute('interest');
    }
    $f3->set('genders',$gender);

    $view = new Template();
    echo $view->render
    ('views/profile.html');


});


//run fat free (last things)
$f3->run();

