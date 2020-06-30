<?php

use PHPUnit\Framework\TestCase;

class HardTest extends TestCase {

    public function setUp(): void {
        $this->hard = new Hard(41);
        $this->setOutputCallback(function() {});
    }

    public function testGetArea() {
        $this->assertEquals(41, $this->hard->getArea());
    }

    public function testGetCleaningTime() {
        $this->assertEquals(1, $this->hard->getCleaningTime());
    }
}