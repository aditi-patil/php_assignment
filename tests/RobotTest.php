<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class RobotTest extends MockeryTestCase {

    public function testCharge(){

        $r = new Robot(10);
        $reflector = new ReflectionClass(Robot::class);
        $property = $reflector->getProperty('batteryStatus');
        $r->charge();
        $property->setAccessible(true);
        $value = $property->getValue($r);
        $this->assertEquals(100, $value);
    }

}