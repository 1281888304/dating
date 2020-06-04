<?php

/**
 * Class Member
 */
class Member{
    /**
     * @var firstnameValue
     */
    private $_firstName;
    /**
     * @var lastname Value
     */
    private $_lastName;
    /**
     * @var Age value
     */
    private $_age;
    /**
     * @var gender value
     */
    private $_gender;
    /**
     * @var phone number
     */
    private $_phone;
    /**
     * @var email address
     */
    private $_email;
    /**
     * @var state value
     */
    private $_state;
    /**
     * @var ssek choice
     */
    private $_seeking;
    /**
     * @var soem detail for user
     */
    private $_bio;

    /**
     * Member constructor.
     * @param string $firstName
     * @param string $lastName
     * @param int $age
     * @param string $gender
     * @param string $phone
     * @param string $email
     * @param string $state
     * @param string $seeking
     * @param string $bio
     */
    public function __construct($firstName="Qinghang",
                                $lastName="Zhang", $age=23, $gender="Male",
                                $phone="2532892222", $email="Qzhang9@mail.greenriver.edu",
                                $state="WA", $seeking="Male", $bio="Nothing")
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setAge($age);
        $this->setGender($gender);
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setState($state);
        $this->setSeeking($seeking);
        $this->setBio($bio);
    }

    /**
     * @param $firstName as first name
     */
    public function setFirstName($firstName)
    {
        $this->_firstName = $firstName;
    }

    /**
     * @return string the firstname
     */
    public function getFirstName()
    {
        return $this->_firstName;
    }

    /**
     * @param $lastName
     */
    public function setLastName($lastName)
    {
        $this->_lastName = $lastName;
    }

    /**
     * @return string the lastname
     */
    public function getLastName()
    {
        return $this->_lastName;
    }

    /**
     * @param $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * @return string the age
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param $gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * @return string the gender value
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return string the phone number
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return string the email address
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return string the state element
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param $seeking
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * @return string the seek choce
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * @param $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }

    /**
     * @return string the detail for themself
     */
    public function getBio()
    {
        return $this->_bio;
    }

}