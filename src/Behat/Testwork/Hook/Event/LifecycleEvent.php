<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Hook\Event;

use Behat\Testwork\Environment\Environment;
use Behat\Testwork\Suite\Suite;
use Symfony\Component\EventDispatcher\Event;

/**
 * Testwork lifecycle event.
 *
 * All hookable events should extend this class.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
abstract class LifecycleEvent extends Event
{
    /**
     * @var Suite
     */
    private $suite;
    /**
     * @var Environment
     */
    private $environment;
    /**
     * @var mixed
     */
    private $subject;

    /**
     * Initializes scenario event.
     *
     * @param Suite       $suite
     * @param Environment $environment
     * @param mixed       $subject
     */
    public function __construct(Suite $suite, Environment $environment, $subject)
    {
        $this->suite = $suite;
        $this->environment = $environment;
        $this->subject = $subject;
    }

    /**
     * Returns suite in which this event was fired.
     *
     * @return Suite
     */
    public function getSuite()
    {
        return $this->suite;
    }

    /**
     * Returns environment in which this event was fired.
     *
     * @return Environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Returns test subject.
     *
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Returns scenario status.
     *
     * @return integer
     */
    abstract public function getResultCode();
}
