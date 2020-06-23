<?php

class Hard extends Robot implements Floor {
    public $area;

    function __construct($area){
        $this->area = $area;
    }

    function calculateCleanUpArea() {
        echo "Cleaning Hard floor area---" . PHP_EOL;
        $this->capacity = 60;
        $cleandArea = $this->clean($this->area, 1, 1);
        echo "Cleanining task is completed" . PHP_EOL;
    }

    function setArea($area) {
        $this->area = $area - 1;
    }
}
