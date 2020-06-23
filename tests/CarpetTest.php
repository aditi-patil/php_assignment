<?php

use PHPUnit\Framework\TestCase;

class CarpetTest extends TestCase {

    public function testArea() {
        $c = new Carpet(41, new Robot(20));
        $this->assertEquals(41, $c->area);
    }

    public function testCalculateCleanUpAreaWithMockery(){
        $mock = Mockery::mock(Robot::class);

        $mock->shouldReceive('clean')
                ->once()
                ->withSomeOfArgs(31, 1, 2)
                ->andReturn(31);

        $c = new Carpet(31, $mock);
        $c->calculateCleanUpArea($c->area, 1, 2);
        $this->assertEquals(31, $c->area);
    }


}