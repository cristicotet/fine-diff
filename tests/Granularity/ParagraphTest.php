<?php

namespace FineDiffTests\Granularity;

use PHPUnit\Framework\TestCase;
use iphis\FineDiff\Delimiters;
use iphis\FineDiff\Granularity\Paragraph;

class ParagraphTest extends TestCase
{
    /**
     * @var Paragraph
     */
    protected $character;

    protected $delimiters = array(
        Delimiters::PARAGRAPH,
    );

    public function setUp()
    {
        $this->character = new Paragraph;
    }

    public function testExtendsAndImplements()
    {
        $this->assertTrue(is_a($this->character, 'iphis\FineDiff\Granularity\Granularity'));
        $this->assertTrue(is_a($this->character, 'iphis\FineDiff\Granularity\GranularityInterface'));
        $this->assertTrue(is_a($this->character, 'ArrayAccess'));
        $this->assertTrue(is_a($this->character, 'Countable'));
    }

    public function testGetDelimiters()
    {
        $this->assertEquals($this->character->getDelimiters(), $this->delimiters);
    }
}