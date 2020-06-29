<?php

class Robot {

    private $battery;
    private $capacity;
    private $action;
    private $floor;

    function __construct($action, Battery $b){
        $this->action = $action;
        $this->battery = $b;
    }

    function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    function getCapacity() {
        return $this->capacity;
    }


    function process($floor, $area){
        if ($floor == 'hard') {
            $this->setCapacity(60);
            $this->floor = new Floor($area, 1);
            echo "Cleaning Hard floor area---" . PHP_EOL;

        } else {
            $this->setCapacity(30);
            $this->floor = new Floor($area, 2);
            echo "Cleaning Carpet floor area---" . PHP_EOL;
        }
        $cleandArea = $this->clean($this->floor->getArea(), 1, $this->floor->getInterval());
        $cleaningCompleted = $this->floor->calculateCleanUpArea($cleandArea);
        while ($cleaningCompleted != true) {
            $cleaningCompleted = $this->floor->calculateCleanUpArea($this->clean($this->floor->getArea(), $cleandArea, $this->floor->getInterval()));
        }
        echo "Cleanining task is completed" . PHP_EOL;
    }

    function clean($endCleanUpAt, $startCleanUpAt,  $interval){
        for($i=$startCleanUpAt; $i<=$endCleanUpAt; $i++) {
            sleep($interval);
            $this->battery->checkBatteryStatus($this->capacity);
            echo "[ Cleaned area ---$i meter sq., BatteryStatus----" . $this->battery->getStatus() ."]" . PHP_EOL;
            if((int)$this->battery->getStatus() == 0) {
                echo "Battery is discharged" . PHP_EOL;
                $this->battery->charge();
                $i += 1;
                break;
            }
        }
        return $i;
    }

}
