<?php


class Carpet implements Floor {
    public $area;
    private $robot;

    function __construct($area, Robot $r){
        $this->area = $area;
        $this->robot = $r;
    }

    function calculateCleanUpArea() {
        echo "Cleaning carpet floor area---" . PHP_EOL;
        $this->robot->capacity = 30;
        $cleandArea = $this->robot->clean($this->area, 1, 2);
        while($cleandArea <= $this->area){
            $this->robot->charge();
            $cleandArea = $this->robot->clean($this->area, $cleandArea, 2);
        }
        echo "Cleaning task is completed" . PHP_EOL;
    }
}
