<?php


class Robot {

    const MAX_CHARGING_TIME = 30;

    private $batteryStatus = 100;
    public $cleanedArea = 1;
    protected $capacity = 60;

    function __construct($batteryStatus){
        $this->batteryStatus = $batteryStatus;
    }

    function checkBatteryStatus($cleanedArea){
        $this->batteryStatus = round((100 - (100 / $this->capacity) * (int)$cleanedArea), 2);
    }

    function charge(){
        echo "Battery is charging" . PHP_EOL;
        for($j=1; $j<= self::MAX_CHARGING_TIME; $j++)  {
            sleep(1);
            $this->batteryStatus = (100 / 30) * (int)$j;
        }
        echo "Battery is fully charged--- $this->batteryStatus %" . PHP_EOL;
    }

    function clean($endCleanUpAt, $startCleanUpAt,  $interval){

        for($i=$endCleanUpAt; $i>=$startCleanUpAt; $i--) {
            sleep($interval);
            if($this->batteryStatus <= 100 && $this->batteryStatus != 0) {
                $this->checkBatteryStatus($this->cleanedArea);
                echo "[ Cleaned area ---$this->cleanedArea , BatteryStatus----$this->batteryStatus ]" . PHP_EOL;
                $this->cleanedArea++;
            } elseif($this->batteryStatus == 0) {
                echo "Battery is discharged" . PHP_EOL;
                $this->cleanedArea = 1;
                $this->charge();
                $this->checkBatteryStatus($this->cleanedArea);
                $this->cleanedArea++;
                echo "[ Cleaned area ---$this->area , BatteryStatus----$this->batteryStatus ]" . PHP_EOL;
            }
        }
    }

}
