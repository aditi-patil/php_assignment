<?php

use PHPUnit\Framework\TestCase;

class RobotTest extends TestCase {

    public function setUp(): void {
        $this->robot = new Robot('clean', new Battery());
        $this->setOutputCallback(function() {});
    }

    public function testCharge(){

        $mock = Mockery::mock($this->robot);
        $mock->shouldReceive('charge')
             ->once()
             ->andReturn(100);

        $reflector = new ReflectionClass(Robot::class);
        $property = $reflector->getProperty('batteryStatus');
        $mock->charge();
        $property->setAccessible(true);
        $value = $property->getValue($mock);
        $this->assertEquals(100, $mock->charge());
    }

    public function testCleanWithMockery() {

        $mock = Mockery::mock($this->robot);

        $mock->shouldReceive('clean')
                ->once()
                ->withSomeOfArgs(31, 1, 2)
                ->andReturn(31);

        $this->assertEquals(31, $mock->clean(31, 1, 2));
    }

    public function testCheckBatteryStatus() {
        $this->robot->capacity = 60;        
        $reflector = new ReflectionClass($this->robot);
        $property = $reflector->getProperty('batteryStatus');
        $this->robot->checkBatteryStatus();
        $property->setAccessible(true);
        $value = $property->getValue($this->robot);

        $this->assertEquals(98.33, $value);

    }
}