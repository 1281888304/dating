<?php

/**
 * Class Controller
 * control the index page for all statement
 */
class Controller{
    /**
     * @var the router
     */
    private $_f3; //router
    /**
     * @var validater object
     */
    private $_validator; //validation object

    /**
     * Controller constructor.
     * @param $f3
     * @param $validator
     */
    public function __construct($f3, $validator)
    {
        $this->_f3 = $f3;
        $this->_validator = $validator;
    }

    /**
     * home page
     */
    public function home()
    {
        $view = new Template();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_f3->reroute('person');
        }
        echo $view->render
        ('views/home.html');
    }

    /**
     * person form page
     */
    public function person(){
        $gender = getGender();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            if (!$this->_validator->validName($_POST['firstName'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["firstName"]', "cant be empty");
            }

            if (!$this->_validator->validName($_POST['lastName'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["lastName"]', "cant be empty");
            }

            if (!$this->_validator->validAge($_POST['age'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["age"]', "cant over 118 or under 18");
            }

            if (!$this->_validator->validPhone($_POST['phone'])) {
                $this->_f3->set('errors["phone"]', "must be a number");
            }

            //Store the data in the session array
            if (empty($this->_f3->get('errors'))) {
//            $_SESSION['firstName'] = $_POST['firstName'];
//            $_SESSION['lastName'] = $_POST['lastName'];
//            $_SESSION['age'] = $_POST['age'];
//            $_SESSION['phone'] = $_POST['phone'];
//            $_SESSION['gender'] = $_POST['gender'];
                $member=new Member();
                $member->setFirstName($_POST['firstName']);
                $member->setLastName($_POST['lastName']);
                $member->setAge($_POST['age']);
                $member->setPhone($_POST['phone']);
                $member->setGender($_POST['gender']);

                if(isset($_POST['premium']) && $_POST['premium']!=""){
                    $_SESSION['pre']="yes";
                }
                else{
                    $_SESSION['pre']="no";
                }

                $_SESSION['member']=$member;
                //Redirect to Order 2 page
                $this->_f3->reroute('profile');
            }


        }


        $this->_f3->set('genders', $gender);
        $this->_f3->set('firstName', $_POST['firstName']);
        $this->_f3->set('lastName', $_POST['lastName']);
        $this->_f3->set('age', $_POST['age']);
        $this->_f3->set('phone', $_POST['phone']);
        $view = new Template();
        echo $view->render
        ('views/person.html');
    }

    /**
     * profile form page
     */
    public function profile(){
        $gender = getGender();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!$this->_validator->validEmail($_POST['email'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["email"]', "must be a correct format");
            }

            if (empty( $this->_f3->get('errors'))) {
//            $_SESSION['email'] = $_POST['email'];
//            $_SESSION['state'] = $_POST['state'];
//            $_SESSION['seek'] = $_POST['seek'];
//            $_SESSION['bio'] = $_POST['bio'];
                $_SESSION['member']->setEmail($_POST['email']);
                $_SESSION['member']->setState($_POST['state']);
                $_SESSION['member']->setSeeking($_POST['seek']);
                $_SESSION['member']->setBio($_POST['bio']);
                //Redirect to Order 2 page
                if( $_SESSION['pre']=="yes"){
                    $this->_f3->reroute('interest');
                }
                else{
                    $this->_f3->reroute('summary');
                }
                // $_SESSION['premium']="checked";

            }
        }
        $this->_f3->set('genders', $gender);
        $this->_f3->set('email', $_POST['email']);
        $view = new Template();
        echo $view->render
        ('views/profile.html');
    }

    /**
     * interest select page
     */
    public function interest(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $indoors = $_POST['indoor'];
            $outdoors = $_POST['outdoor'];
            if (isset($_POST['indoor'])) {
                foreach ($indoors as $indoor) {
                    if (!$this->_validator->validInterest($indoor)) {
                        $this->_f3->set('errors["indoor"]', "must in array");
                    }
                }
            }
            if (isset($_POST['outdoor'])) {
                foreach ($outdoors as $outdoor) {
                    if (!$this->_validator->validInterest2($outdoor)) {
                        $this->_f3->set('errors["outdoor"]', "must in array");
                    }
                }
            }
            //Store the data in the session array
            if (empty($this->_f3->get('errors'))) {

//                $_SESSION['indoor'] = $_POST['indoor'];
//
//                $_SESSION['outdoor'] = $_POST['outdoor'];
                $premium = new Premium();
                if (isset($_POST['indoor'])){
                    $premium->setIndoor($_POST['indoor']);
                }
                if (isset($_POST['outdoor'])) {
                    $premium->setOutdoor($_POST['outdoor']);
                }
                $_SESSION['premium']=$premium;
                $this->_f3->reroute('summary');
            }
        }

        $this->_f3->set('indoors', getIndoor());
        $this->_f3->set('outdoors', getoutdoor());

        $this->_f3->set('outdoor', $_POST['outdoor']);
        $this->_f3->set('indoor', $_POST['indoor']);
        $view = new Template();
        echo $view->render
        ('views/interest.html');

    }

    /**
     * summary page
     */
    public function summary(){
        $view = new Template();
        echo $view->render('views/Summary.html');
        session_destroy();
    }

}