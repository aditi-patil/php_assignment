<?php


class Robot {

    const MAX_CHARGING_TIME = 30;

    private $batteryStatus = 100;
    public $cleanedArea;
    public $capacity;

    function __construct($batteryStatus){
        $this->batteryStatus = $batteryStatus;
    }

    function checkBatteryStatus(){
        $this->batteryStatus = round($this->batteryStatus - (100 / $this->capacity), 2);
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
            if((int)$this->batteryStatus <= 100 && (int)$this->batteryStatus != 0) {
                $this->checkBatteryStatus();
                $this->cleanedArea++;
                echo "[ Cleaned area ---$this->cleanedArea , BatteryStatus----$this->batteryStatus ]" . PHP_EOL;
            } elseif((int)$this->batteryStatus == 0) {
                echo "Battery is discharged" . PHP_EOL;
                $this->charge();
                $this->checkBatteryStatus();
                $this->cleanedArea++;
                echo "[ Cleaned area ---$this->cleanedArea , BatteryStatus----$this->batteryStatus ]" . PHP_EOL;
            }
        }
        return $this->cleanedArea;
    }

}
