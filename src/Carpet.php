<?php


class Carpet extends Robot implements Floor {
    public $area;

    function __construct($area){
        $this->area = $area;
    }

    function calculateCleanUpArea() {
        echo "Cleaning carpet area---" . PHP_EOL;
        $this->capacity = 30;
        $cleandArea = $this->clean($this->area, 1, 2);
        echo "Cleanining task is completed" . PHP_EOL;
    }

    function setArea($area) {
        $this->area = $area - 1;
    }
}
