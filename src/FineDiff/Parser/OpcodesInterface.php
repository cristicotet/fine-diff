<?php

/**
 * FINE granularity DIFF.
 *
 * Computes a set of instructions to convert the content of
 * one string into another.
 *
 * Originally created by Raymond Hill (https://github.com/gorhill/PHP-FineDiff), brought up
 * to date by Cog Powered (https://github.com/iphis/FineDiff).
 *
 * @copyright Copyright 2011 (c) Raymond Hill (http://raymondhill.net/blog/?p=441)
 * @copyright Copyright 2013 (c) Robert Crowe (http://iphis.com)
 *
 * @link https://github.com/iphis/FineDiff
 *
 * @version 0.0.1
 *
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace iphis\FineDiff\Parser;

use iphis\FineDiff\Exceptions\OperationException;

interface OpcodesInterface
{
    /**
     * Get the opcodes.
     *
     * @return array
     */
    public function getOpcodes();

    /**
     * Set the opcodes for this parse.
     *
     * @param array $opcodes Elements must be an instance of iphis\FineDiff\Parser\Operations\OperationInterface.
     *
     * @throws OperationException
     *
     * @return void
     */
    public function setOpcodes(array $opcodes);

    /**
     * Return the opcodes in a format that can then be rendered.
     *
     * @return string
     */
    public function generate();

    /**
     * When object is cast to a string returns opcodes as string.
     *
     * @see Opcodes::generate
     *
     * @return string
     */
    public function __toString();
}
