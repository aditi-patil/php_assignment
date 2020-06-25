<?php

use PHPUnit\Framework\TestCase;

class HardTest extends TestCase {

    public function setUp(): void {
        $this->robot = new Robot('clean', new Battery());
        $this->setOutputCallback(function() {});
    }

    public function testArea() {
        $c = new Hard(4, $this->robot);
        $this->assertEquals(4, $c->getArea());
    }


    public function testCalculateCleanUpArea(){
        $c = new Hard(2, $this->robot);
        $c->calculateCleanUpArea($c->getArea(), 1, 1);
        $this->assertEquals(2, $c->getArea());
    }

}