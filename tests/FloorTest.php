<?php

use PHPUnit\Framework\TestCase;

class FloorTest extends TestCase {

    public function setUp(): void {
        $this->floor = new Floor(4, 1);
        $this->setOutputCallback(function() {});
    }

    public function testGetArea() {
        $this->assertEquals(4, $this->floor->getArea());
    }

    public function testGetInterval() {
        $this->assertEquals(1, $this->floor->getInterval());
    }


    public function testCalculateCleanUpArea(){
        $this->assertTrue($this->floor->calculateCleanUpArea(4));
    }

    public function testCalculateCleanUpAreaForReturnFalse(){
        $this->assertfalse($this->floor->calculateCleanUpArea(1));
    }


}