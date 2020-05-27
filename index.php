<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

session_start();

//require autoload file
require_once('vendor/autoload.php');
require_once("model/validate.php");
require_once("model/data-layer.php");

//Create an instance of the Base class
$f3 = Base::instance();

//default route
$f3->route('GET|POST /', function () use ($f3) {
    $view = new Template();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $f3->reroute('person');
    }

    echo $view->render
    ('views/home.html');


});
// choose


//personal information
$f3->route('GET|POST /person', function () use ($f3) {
    $gender = getGender();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        if (!validName($_POST['firstName'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["firstName"]', "cant be empty");
        }

        if (!validName($_POST['lastName'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["lastName"]', "cant be empty");
        }

        if (!validAge($_POST['age'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["age"]', "cant over 118 or under 18");
        }

        if (!validPhone($_POST['phone'])) {
            $f3->set('errors["phone"]', "must be a number");
        }

        //Store the data in the session array
        if (empty($f3->get('errors'))) {
            $_SESSION['firstName'] = $_POST['firstName'];
            $_SESSION['lastName'] = $_POST['lastName'];
            $_SESSION['age'] = $_POST['age'];
            $_SESSION['phone'] = $_POST['phone'];
            $_SESSION['gender'] = $_POST['gender'];

            //Redirect to Order 2 page
            $f3->reroute('profile');
        }


    }


    $f3->set('genders', $gender);
    $f3->set('firstName', $_POST['firstName']);
    $f3->set('lastName', $_POST['lastName']);
    $f3->set('age', $_POST['age']);
    $f3->set('phone', $_POST['phone']);
    $view = new Template();
    echo $view->render
    ('views/person.html');


});

// interest
$f3->route('GET|POST /interest', function () use ($f3) {


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $indoors = $_POST['indoor'];
        $outdoors = $_POST['outdoor'];
        if (isset($_POST['indoor'])) {
            foreach ($indoors as $indoor) {
                if (!validInterest($indoor)) {
                    $f3->set('errors["indoor"]', "must in array");
                }
            }
        }
        if (isset($_POST['outdoor'])) {
            foreach ($outdoors as $outdoor) {
                if (!validInterest2($outdoor)) {
                    $f3->set('errors["outdoor"]', "must in array");
                }
            }
        }


        //Store the data in the session array
        if (empty($f3->get('errors'))) {
            $_SESSION['indoor'] = $_POST['indoor'];

            $_SESSION['outdoor'] = $_POST['outdoor'];


            $f3->reroute('summary');
        }
    }

    $f3->set('indoors', getIndoor());
    $f3->set('outdoors', getoutdoor());

    $f3->set('outdoor', $_POST['outdoor']);
    $f3->set('indoor', $_POST['indoor']);
    $view = new Template();
    echo $view->render
    ('views/interest.html');

});

$f3->route('GET|POST /summary', function () {
    $view = new Template();
    echo $view->render('views/Summary.html');

});

//profile
$f3->route('GET|POST /profile', function () use ($f3) {
    $gender = getGender();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (!validEmail($_POST['email'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["email"]', "must be a correct format");
        }

        if (empty($f3->get('errors'))) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['state'] = $_POST['state'];
            $_SESSION['seek'] = $_POST['seek'];
            $_SESSION['bio'] = $_POST['bio'];

            //Redirect to Order 2 page
            $f3->reroute('interest');
        }
    }
    $f3->set('genders', $gender);
    $f3->set('email', $_POST['email']);
    $view = new Template();
    echo $view->render
    ('views/profile.html');


});


//run fat free (last things)
$f3->run();

