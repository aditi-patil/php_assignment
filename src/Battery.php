<?php

define("MAX_LIMIT", 100, true);
define("MAX_CHARGING_TIME", 30, true);

class Battery {
    private $status;

    public function __construct(){
        $this->status = MAX_LIMIT;
    }

    function checkBatteryStatus($capacity){
        $this->status = round($this->status - (100 / $capacity), 2);
    }

    function charge(){
        echo "Battery is charging" . PHP_EOL;
        for($j=1; $j<= MAX_CHARGING_TIME; $j++)  {
            sleep(1);
            $this->status = (100 / 30) * (int)$j;
        }
        echo "Battery is fully charged---" . $this->status . PHP_EOL;
    }

    function getStatus() {
        return $this->status;
    }

}
