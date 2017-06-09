<?php

namespace FineDiffTests\Render\Html;

use iphis\FineDiff\Render\Html;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class ProcessTest extends TestCase
{
    /**
     * @var Html
     */
    protected $html;

    public function setUp()
    {
        $this->html = new Html;
    }

    public function tearDown()
    {
        m::close();
    }

    public function testProcess()
    {
        $opcodes = m::mock('iphis\FineDiff\Parser\Opcodes');
        $opcodes->shouldReceive('generate')->andReturn('c5i:2c6d')->once();

        $html = $this->html->process('Hello worlds', $opcodes);

        $this->assertEquals($html, 'Hello<ins>2</ins> world<del>s</del>');
    }
}