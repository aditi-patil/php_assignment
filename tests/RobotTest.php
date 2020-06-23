<?php

use PHPUnit\Framework\TestCase;

class RobotTest extends TestCase {

    public function testCharge(){

        $mock = Mockery::mock(Robot::class);

        $mock->shouldReceive('charge')
                ->once()
                ->andReturn(100);

        $reflector = new ReflectionClass(Robot::class);
        $property = $reflector->getProperty('batteryStatus');
        $mock->charge();
        $property->setAccessible(true);
        $value = $property->getValue($mock);
        $this->assertEquals(100, $value);
    }

    public function testCleanWithMockery(){

        $mock = Mockery::mock(Robot::class);

        $mock->shouldReceive('clean')
                ->once()
                ->withSomeOfArgs(31, 1, 2)
                ->andReturn(31);

        $this->assertEquals(31, $mock->clean(31, 1, 2));
    }
}