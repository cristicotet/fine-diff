<?php

namespace FineDiffTests\Parser;

use iphis\FineDiff\Parser\Opcodes;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class OpcodesTest extends TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testInstanceOf()
    {
        $this->assertTrue(is_a(new Opcodes, 'iphis\FineDiff\Parser\OpcodesInterface'));
    }

    public function testEmptyOpcodes()
    {
        $opcodes = new Opcodes;
        $this->assertEmpty($opcodes->getOpcodes());
    }

    public function testSetOpcodes()
    {
        $operation = m::mock('iphis\FineDiff\Parser\Operations\Copy');
        $operation->shouldReceive('getOpcode')->once()->andReturn('testing');

        $opcodes = new Opcodes;
        $opcodes->setOpcodes(array($operation));

        $opcodes = $opcodes->getOpcodes();
        $this->assertEquals($opcodes[0], 'testing');
    }

    /**
     * @expectedException \iphis\FineDiff\Exceptions\OperationException
     */
    public function testNotOperation()
    {
        $opcodes = new Opcodes;
        $opcodes->setOpcodes(array('test'));
    }

    public function testGetOpcodes()
    {
        $operation_one = m::mock('iphis\FineDiff\Parser\Operations\Copy');
        $operation_one->shouldReceive('getOpcode')->andReturn('c5i');

        $operation_two = m::mock('iphis\FineDiff\Parser\Operations\Copy');
        $operation_two->shouldReceive('getOpcode')->andReturn('2c6d');

        $opcodes = new Opcodes;
        $opcodes->setOpcodes(array($operation_one, $operation_two));

        $opcodes = $opcodes->getOpcodes();

        $this->assertTrue(is_array($opcodes));
        $this->assertEquals($opcodes[0], 'c5i');
        $this->assertEquals($opcodes[1], '2c6d');
    }

    public function testGenerate()
    {
        $operation_one = m::mock('iphis\FineDiff\Parser\Operations\Copy');
        $operation_one->shouldReceive('getOpcode')->andReturn('c5i');

        $operation_two = m::mock('iphis\FineDiff\Parser\Operations\Copy');
        $operation_two->shouldReceive('getOpcode')->andReturn('2c6d');

        $opcodes = new Opcodes;
        $opcodes->setOpcodes(array($operation_one, $operation_two));

        $this->assertEquals($opcodes->generate(), 'c5i2c6d');
    }

    public function testToString()
    {
        $operation_one = m::mock('iphis\FineDiff\Parser\Operations\Copy');
        $operation_one->shouldReceive('getOpcode')->andReturn('c5i');

        $operation_two = m::mock('iphis\FineDiff\Parser\Operations\Copy');
        $operation_two->shouldReceive('getOpcode')->andReturn('2c6d');

        $opcodes = new Opcodes;
        $opcodes->setOpcodes(array($operation_one, $operation_two));

        $this->assertEquals((string)$opcodes, 'c5i2c6d');
        $this->assertEquals((string)$opcodes, $opcodes->generate());
    }
}
