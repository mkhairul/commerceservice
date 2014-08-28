<?php

namespace Mkcommerce;

use Mockery;
use TestCase;

class RespondTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }
    
    public function testCallback()
    {
        $respond = new Respond();
        $this->assertEquals("test", $respond->callback("test"));
    }
    
    public function testIsFailed()
    {
        $respond = new Respond();
        $this->assertFalse($respond->isFailed());
    }
    
    public function testFail()
    {
        $respond = new Respond();
        $this->assertInstanceOf("Mkcommerce\Respond", $respond->fail());
        $this->assertEquals('error', $respond->response['status']);
        $this->assertTrue($respond->isFailed());
    }
}