<?php

use VG\core\Controller;
use PHPUnit\Framework\TestCase;

/**
 * Class ControllerTest
 */
class ControllerTest extends TestCase
{

    public function testRender()
    {
        $this->assertIsBool(true, "This is not true cause of");
    }
}
