<?php


class Carpet implements Floor {
    public $area;
    public $robot;

    function __construct($area, Robot $r){
        $this->area = $area;
        $this->robot = $r;
    }

    function calculateCleanUpArea() {
        echo "Cleaning carpet area---" . PHP_EOL;
        $this->robot->capacity = 30;
        $cleandArea = $this->robot->clean($this->area, 1, 2);
        echo "Cleanining task is completed" . PHP_EOL;
    }
}
