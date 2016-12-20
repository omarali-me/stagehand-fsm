<?php
/*
 * Copyright (c) KUBO Atsuhiro <kubo@iteman.jp>,
 * All rights reserved.
 *
 * This file is part of Stagehand_FSM.
 *
 * This program and the accompanying materials are made available under
 * the terms of the BSD 2-Clause License which accompanies this
 * distribution, and is available at http://opensource.org/licenses/BSD-2-Clause
 */

namespace Stagehand\FSM\Event;

use Stagehand\FSM\State\StateInterface;

/**
 * @since Class available since Release 0.1.0
 */
class TransitionEvent implements TransitionEventInterface, \Serializable
{
    /**
     * @var string
     */
    protected $eventId;

    /**
     * @var StateInterface
     */
    protected $nextState;

    /**
     * {@inheritdoc}
     *
     * @since Method available since Release 2.2.0
     */
    public function serialize()
    {
        return serialize(array(
            'eventId' => $this->eventId,
        ));
    }

    /**
     * {@inheritdoc}
     *
     * @since Method available since Release 2.2.0
     */
    public function unserialize($serialized)
    {
        foreach (unserialize($serialized) as $name => $value) {
            if (property_exists($this, $name)) {
                $this->$name = $value;
            }
        }
    }

    /**
     * @param string $eventId
     */
    public function __construct($eventId)
    {
        $this->eventId = $eventId;
    }

    /**
     * Sets the next state to the event.
     *
     * @param StateInterface $state
     */
    public function setNextState(StateInterface $state)
    {
        $this->nextState = $state;
    }

    /**
     * {@inheritdoc}
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * {@inheritdoc}
     */
    public function getNextState()
    {
        return $this->nextState;
    }

    /**
     * {@inheritdoc}
     *
     * @since Method available since Release 2.1.0
     */
    public function isEndEvent()
    {
        return $this->getNextState() !== null && $this->getNextState()->getStateId() == StateInterface::STATE_FINAL;
    }
}
