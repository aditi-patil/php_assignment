<?php

class Floor implements Cleanable {
    private $cleanedArea;
    private $totalArea;

    function __construct($area) {
        $this->totalArea = $area;
    }

    function checkCleanedArea($area) {
        $this->cleanedArea = $area;
        if ($this->cleanedArea < $this->totalArea) {
            return false;
        }
        return true;
    }

}
