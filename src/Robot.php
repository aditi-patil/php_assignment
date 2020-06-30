<?php

class Robot {

    private $battery;
    private $action;
    private $floor;

    function __construct($action, $floor){
        $this->action = $action;
        $this->battery = new Battery();
        $this->floor = $floor;
    }

    function process(){
        $cleandArea = $this->clean($this->floor->getArea(), 1);
        $isCleaningCompleted = $this->floor->checkCleanedArea($cleandArea);
        while ($isCleaningCompleted != true) {
            $isCleaningCompleted = $this->floor->checkCleanedArea($this->clean($this->floor->getArea(), $cleandArea));
        }
        echo "Cleanining task is completed" . PHP_EOL;
    }

    function clean($endCleanUpAt, $startCleanUpAt){
        for($i=$startCleanUpAt; $i<=$endCleanUpAt; $i++) {
            sleep($this->floor->getCleaningTime());
            $this->battery->setBatteryStatus($this->floor->getCleaningTime());
            echo "[ Cleaned area ---$i meter sq., BatteryStatus----" . $this->battery->getStatus() ."% ]" . PHP_EOL;
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
