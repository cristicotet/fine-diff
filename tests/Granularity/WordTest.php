<?php

namespace FineDiffTests\Granularity;

use iphis\FineDiff\Delimiters;
use iphis\FineDiff\Granularity\Word;
use PHPUnit\Framework\TestCase;

class WordTest extends TestCase
{
    /**
     * @var Word
     */
    protected $character;

    protected $delimiters = array(
        Delimiters::PARAGRAPH,
        Delimiters::SENTENCE,
        Delimiters::WORD,
    );

    public function setUp()
    {
        $this->character = new Word;
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