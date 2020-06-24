<?php

use PHPUnit\Framework\TestCase;

class HardTest extends TestCase {

    public function setUp(): void {
        $this->robot = new Robot('clean', new Battery());
        $this->setOutputCallback(function() {});
    }

    public function testArea() {
        $c = new Hard(41, $this->robot);
        $this->assertEquals(41, $c->area);
    }


    public function testCalculateCleanUpArea(){
        $c = new Hard(2, $this->robot);
        $c->calculateCleanUpArea($c->area, 1, 1);
        $this->assertEquals(2, $c->area);
    }

}