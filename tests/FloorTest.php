<?php

use PHPUnit\Framework\TestCase;

class FloorTest extends TestCase {

    public function setUp(): void {
        $this->floor = new Floor(4);
        $this->setOutputCallback(function() {});
    }

    public function testCheckCleanedArea(){
        $this->assertTrue($this->floor->checkCleanedArea(4));
    }

    public function testCheckCleanedAreaForReturnFalse(){
        $this->assertfalse($this->floor->checkCleanedArea(1));
    }


}