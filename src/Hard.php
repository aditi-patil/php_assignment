<?php

class Hard implements Floor {
    public $area;
    private $robot;

    function __construct($area, Robot $r){
        $this->area = $area;
        $this->robot = $r;
    }

    function calculateCleanUpArea() {
        echo "Cleaning Hard floor area---" . PHP_EOL;
        $this->robot->capacity = 60;
        $cleandArea = $this->robot->clean($this->area, 1, 1);
        while($cleandArea <= $this->area){
            $this->robot->charge();
            $cleandArea = $this->robot->clean($this->area, $cleandArea, 1);
        }
        echo "Cleanining task is completed" . PHP_EOL;
    }
}
