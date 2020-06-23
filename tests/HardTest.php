<?php

use PHPUnit\Framework\TestCase;

class HardTest extends TestCase {


    public function testArea() {
        $c = new Hard(41, new Robot(30));
        $this->assertEquals(41, $c->area);
    }

    public function testCalculateCleanUpAreaWithMockery(){
        $mock = Mockery::mock(Robot::class);

        $mock->shouldReceive('clean')
                ->once()
                ->withSomeOfArgs(41, 1, 1)
                ->andReturn(31);

        $c = new Hard(41, $mock);
        $c->calculateCleanUpArea($c->area, 1, 1);
        $this->assertEquals(41, $c->area);
    }

}