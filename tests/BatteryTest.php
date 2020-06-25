<?php

use PHPUnit\Framework\TestCase;

class BatteryTest extends TestCase{

    public function setUp(): void {
        $this->battery = new Battery();
        $this->setOutputCallback(function() {});
    }

    function testInitBatteryPowerStatus(){
        $this->assertEquals(MAX_LIMIT, $this->battery->getStatus());
    }

    public function testCheckBatteryStatus() {
        $this->battery->checkBatteryStatus(60);
        $this->assertEquals(98.33, $this->battery->getStatus());

    }
}