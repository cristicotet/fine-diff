<?php

namespace FineDiffTests\Parser;

use iphis\FineDiff\Granularity\Character;
use iphis\FineDiff\Parser\Parser;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    /**
     * @var Parser
     */
    protected $parser;

    public function setUp()
    {
        $granularity = new Character;
        $this->parser = new Parser($granularity);
    }

    public function tearDown()
    {
        m::close();
    }

    public function testInstanceOf()
    {
        $this->assertTrue(is_a($this->parser, 'iphis\FineDiff\Parser\ParserInterface'));
    }

    public function testDefaultOpcodes()
    {
        $opcodes = $this->parser->getOpcodes();
        $this->assertTrue(is_a($opcodes, 'iphis\FineDiff\Parser\OpcodesInterface'));
    }

    public function testSetOpcodes()
    {
        $opcodes = m::mock('iphis\FineDiff\Parser\Opcodes');
        $opcodes->shouldReceive('foo')->andReturn('bar');
        $this->parser->setOpcodes($opcodes);

        $opcodes2 = $this->parser->getOpcodes();
        $this->assertEquals($opcodes2->foo(), 'bar');
    }

    /**
     * @expectedException \iphis\FineDiff\Exceptions\GranularityCountException
     */
    public function testParseBadGranularity()
    {
        $granularity = m::mock('iphis\FineDiff\Granularity\Character');
        $granularity->shouldReceive('count')->andReturn(0);
        $parser = new Parser($granularity);

        $parser->parse('hello world', 'hello2 worl');
    }

    public function testParseSetOpcodes()
    {
        $opcodes = m::mock('iphis\FineDiff\Parser\Opcodes');
        $opcodes->shouldReceive('setOpcodes')->once();
        $this->parser->setOpcodes($opcodes);

        $this->parser->parse('Hello worlds', 'Hello2 world');
    }
}
