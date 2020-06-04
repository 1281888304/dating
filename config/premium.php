<?php

/**
 * Class Premium
 */
class Premium extends Member{

    /**
     * @var the interest indoor
     */
    private $_indoor;
    /**
     * @var the interest outdoor
     */
    private $_outdoor;

    /**
     * Premium constructor.
     * @param array $indoor as indoor value
     * @param array $outdoor as out door value
     */
    public function __construct($indoor=array("tv","movies","cooking",
        "boardgame", "puzzles","readying","playingCard","videoGame"),
                                $outdoor=array("hiking","biking", "football","running","jogging",
                                    "walking","swimming","Jumping"))
    {
        $this->setIndoor($indoor);
        $this->setOutdoor($outdoor);
    }

    /**
     * @param $indoor interest value
     */
    public function setIndoor($indoor){
        $this->_indoor=$indoor;
    }

    /**
     * @return mixed in door value
     */
    public function getIndoor(){
        return $this->_indoor;
    }

    /**
     * @param $outdoor as the out door value
     */
    public function setOutdoor($outdoor){
        $this->_outdoor=$outdoor;
    }

    /**
     * @return mixed outdoor value
     */
    public function getOutdoor(){
        return $this->_outdoor;
    }
}