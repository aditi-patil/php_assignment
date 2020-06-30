<?php

use PHPUnit\Framework\TestCase;

class RobotTest extends TestCase {

    public function setUp(): void {
        $carpet = new Carpet(4);
        $this->robot = new Robot('clean', $carpet);
        $this->setOutputCallback(function() {});
    }

    public function testCharge(){

        $mock = Mockery::mock($this->robot);
        $mock->shouldReceive('charge')
             ->once()
             ->andReturn(100);

        $reflector = new ReflectionClass(Robot::class);
        $property = $reflector->getProperty('battery');
        $mock->charge();
        $property->setAccessible(true);
        $value = $property->getValue($mock);
        $this->assertEquals(100, $mock->charge());
    }

    public function testCleanWithMockery() {

        $mock = Mockery::mock($this->robot);

        $mock->shouldReceive('clean')
                ->once()
                ->withSomeOfArgs(31, 1)
                ->andReturn(31);

        $this->assertEquals(31, $mock->clean(31, 1));
    }

    public function testProcessForHardFloor() {
        $this->assertEquals(NULL, $this->robot->process());
    }

}