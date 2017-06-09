<?php

namespace FineDiffTests\Render\Text;

use iphis\FineDiff\Render\Text;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class ProcessTest extends TestCase
{
    /**
     * @var Text
     */
    protected $text;

    public function setUp()
    {
        $this->text = new Text;
    }

    public function tearDown()
    {
        m::close();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidOpcode()
    {
        $this->text->process('Hello worlds', 123);
    }

    public function testProcessWithString()
    {
        $html = $this->text->process('Hello worlds', 'c5i:2c6d');

        $this->assertEquals($html, 'Hello2 world');
    }

    public function testProcess()
    {
        $opcodes = m::mock('iphis\FineDiff\Parser\Opcodes');
        $opcodes->shouldReceive('generate')->andReturn('c5i:2c6d')->once();

        $html = $this->text->process('Hello worlds', $opcodes);

        $this->assertEquals($html, 'Hello2 world');
    }
}