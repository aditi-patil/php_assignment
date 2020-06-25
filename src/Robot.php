<?php

class Robot {

    private $battery;
    private $capacity;
    private $action;

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
