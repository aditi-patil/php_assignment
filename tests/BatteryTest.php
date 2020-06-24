<?php

use PHPUnit\Framework\TestCase;

class BatteryTest extends TestCase{

    function testInitBatteryPowerStatus(){
        $battery = new Battery();
        $this->assertEquals(MAX_LIMIT, $battery->status);
    }
}