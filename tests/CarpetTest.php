<?php

use PHPUnit\Framework\TestCase;

class CarpetTest extends TestCase {

    public function setUp(): void {
        $this->carpet = new Carpet(41);
        $this->setOutputCallback(function() {});
    }

    public function testGetArea() {
        $this->assertEquals(41, $this->carpet->getArea());
    }

    public function testGetCleaningTime() {
        $this->assertEquals(2, $this->carpet->getCleaningTime());
    }
}