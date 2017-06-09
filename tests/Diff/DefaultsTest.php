<?php

namespace FineDiffTests\Diff;

use iphis\FineDiff\Diff;
use PHPUnit\Framework\TestCase;

class DefaultsTest extends TestCase
{
    /**
     * @var Diff
     */
    protected $diff;

    public function setUp()
    {
        $this->diff = new Diff;
    }

    public function testGetGranularity()
    {
        $this->assertTrue(is_a($this->diff->getGranularity(), 'iphis\FineDiff\Granularity\Character'));
        $this->assertTrue(is_a($this->diff->getGranularity(), 'iphis\FineDiff\Granularity\Granularity'));
        $this->assertTrue(is_a($this->diff->getGranularity(), 'iphis\FineDiff\Granularity\GranularityInterface'));
    }

    public function testGetRenderer()
    {
        $this->assertTrue(is_a($this->diff->getRenderer(), 'iphis\FineDiff\Render\Html'));
        $this->assertTrue(is_a($this->diff->getRenderer(), 'iphis\FineDiff\Render\Renderer'));
        $this->assertTrue(is_a($this->diff->getRenderer(), 'iphis\FineDiff\Render\RendererInterface'));
    }

    public function testGetParser()
    {
        $this->assertTrue(is_a($this->diff->getParser(), 'iphis\FineDiff\Parser\Parser'));
        $this->assertTrue(is_a($this->diff->getParser(), 'iphis\FineDiff\Parser\ParserInterface'));
    }
}