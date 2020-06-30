<?php

define("CARPET_FLOOR_CLEANING_TIME", 2, true);


class Carpet extends Floor {
    private $area;
    private $cleaningTime;


    function __construct($area){
        $this->area = $area;
        $this->cleaningTime = CARPET_FLOOR_CLEANING_TIME;
        parent::__construct($area);
    }

    function getCleaningTime(){
        return $this->cleaningTime;
    }

    function getArea() {
        return $this->area;
    }

}
