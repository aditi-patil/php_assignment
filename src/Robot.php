<?php

define("MAX_CHARGING_TIME", 30, true);
class Robot {

    private $batteryStatus;
    public $capacity;
    public $action;

    function __construct($action, Battery $b){
        $this->action = $action;
        $this->batteryStatus = $b->status;
    }

    function checkBatteryStatus(){
        $this->batteryStatus = round($this->batteryStatus - (100 / $this->capacity), 2);
    }

    function charge(){
        echo "Battery is charging" . PHP_EOL;
        for($j=1; $j<= MAX_CHARGING_TIME; $j++)  {
            sleep(1);
            $this->batteryStatus = (100 / 30) * (int)$j;
        }
        echo "Battery is fully charged--- $this->batteryStatus %" . PHP_EOL;
    }

    function clean($endCleanUpAt, $startCleanUpAt,  $interval){

        for($i=$startCleanUpAt; $i<=$endCleanUpAt; $i++) {
            sleep($interval);
            $this->checkBatteryStatus();
            echo "[ Cleaned area ---$i meter sq., BatteryStatus----$this->batteryStatus ]" . PHP_EOL;
            if((int)$this->batteryStatus == 0) {
                echo "Battery is discharged" . PHP_EOL;
                $i += 1;
                break;
            }
        }
        return $i;
    }

}
