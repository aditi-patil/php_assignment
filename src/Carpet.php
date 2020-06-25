<?php


class Carpet implements Floor {
    private $area;
    private $robot;

    function __construct($area, Robot $r){
        $this->area = $area;
        $this->robot = $r;
    }

    function calculateCleanUpArea() {
        echo "Cleaning carpet floor area---" . PHP_EOL;
        $this->robot->setCapacity(30);
        $cleandArea = $this->robot->clean($this->area, 1, 2);
        while($cleandArea <= $this->area){
            $cleandArea = $this->robot->clean($this->area, $cleandArea, 2);
        }
        echo "Cleaning task is completed" . PHP_EOL;
    }

    function getArea() {
        return $this->area;
    }

}
