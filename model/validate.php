<?php

/**
 * Class Validate
 * for validation each data
 */
class Validate
{
    /**
     * @param $name
     * @return bool
     */
    function validName($name)
    {
        $name = str_replace(' ', '', $name);
        return !empty($name) && ctype_alpha($name);
    }

    /**
     * @param $age
     * @return bool if phone is a number
     */
    function validPhone($age)
    {
        if (is_numeric($age)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $age
     * @return bool is age is large than 18 and less than 118
     */
    function validAge($age)
    {
        if ($age > 18 && $age < 118) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $email
     * @return bool emailmust be corrert format
     */
    function validEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $interest
     * @return bool value must ina rray
     */
    function validInterest($interest)
    {
        $indoor = array("tv", "movies", "cooking",
            "boardgame", "puzzles", "readying", "playingCard", "videoGame");
        if (in_array($interest, $indoor)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $interest
     * @return bool value must in array
     */
    function validInterest2($interest)
    {
        $outdoor = array("hiking", "biking", "football", "running", "jogging",
            "walking", "swimming", "Jumping");
        if (in_array($interest, $outdoor)) {
            return true;
        } else {
            return false;
        }
    }
}