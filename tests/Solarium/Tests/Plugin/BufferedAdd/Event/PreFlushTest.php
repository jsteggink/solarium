<?php
/**
 * Copyright 2011 Bas de Nooijer. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *    this listof conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * The views and conclusions contained in the software and documentation are
 * those of the authors and should not be interpreted as representing official
 * policies, either expressed or implied, of the copyright holder.
 */

namespace Solarium\Tests\Plugin\BufferedAdd\Event;

use PHPUnit\Framework\TestCase;
use Solarium\Plugin\BufferedAdd\Event\PreFlush;

class PreFlushTest extends TestCase
{
    public function testConstructorAndGetters()
    {
        $buffer = array(1, 2, 3);
        $overwrite = true;
        $commitWithin = 567;

        $event = new PreFlush($buffer, $overwrite, $commitWithin);

        $this->assertEquals($buffer, $event->getBuffer());
        $this->assertEquals($overwrite, $event->getOverwrite());
        $this->assertEquals($commitWithin, $event->getCommitWithin());

        return $event;
    }

    /**
     * @depends testConstructorAndGetters
     *
     * @param PreFlush $event
     */
    public function testSetAndGetBuffer($event)
    {
        $buffer = array(4, 5, 6);
        $event->setBuffer($buffer);
        $this->assertEquals($buffer, $event->getBuffer());
    }

    /**
     * @depends testConstructorAndGetters
     *
     * @param PreFlush $event
     */
    public function testSetAndGetCommitWithin($event)
    {
        $commitWithin = 321;
        $event->setCommitWithin($commitWithin);
        $this->assertEquals($commitWithin, $event->getCommitWithin());
    }

    /**
     * @depends testConstructorAndGetters
     *
     * @param PreFlush $event
     */
    public function testSetAndGetOverwrite($event)
    {
        $overwrite = false;
        $event->setOverwrite($overwrite);
        $this->assertEquals($overwrite, $event->getOverwrite());
    }
}
