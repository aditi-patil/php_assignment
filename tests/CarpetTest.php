<?php

use PHPUnit\Framework\TestCase;

class CarpetTest extends TestCase {

    public function setUp(): void {
        $this->robot = new Robot('clean', new Battery());
        $this->setOutputCallback(function() {});
    }

    public function testArea() {
        $c = new Carpet(41, $this->robot);
        $this->assertEquals(41, $c->getArea());
    }

    public function testCalculateCleanUpArea(){
        $c = new Carpet(2, $this->robot);
        $c->calculateCleanUpArea($c->getArea(), 1, 2);
        $this->assertEquals(2, $c->getArea());
    }


}