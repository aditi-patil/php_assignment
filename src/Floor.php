<?php

class Floor implements Cleanable {
    private $area;
    private $interval;
    private $cleanedArea;

    function __construct($area, $interval){
        $this->area = $area;
        $this->interval = $interval;
    }

    function getInterval(){
        return $this->interval;
    }

    function calculateCleanUpArea($area) {
        $this->cleanedArea = $area;
        if ($this->cleanedArea < $this->area) {
            return false;
        }
        return true;
     }

    function getArea() {
        return $this->area;
    }

}
