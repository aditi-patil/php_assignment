<?php

define("HARD_FLOOR_CLEANING_TIME", 1, true);

class Hard extends Floor {
    private $area;
    private $cleaningTime;

    function __construct($area){
        $this->area = $area;
        $this->cleaningTime = HARD_FLOOR_CLEANING_TIME;
        parent::__construct($area);
    }

    function getCleaningTime(){
        return $this->cleaningTime;
    }

    function getArea() {
        return $this->area;
    }

}
