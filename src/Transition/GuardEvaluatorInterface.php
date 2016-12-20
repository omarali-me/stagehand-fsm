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

namespace Stagehand\FSM\Transition;

use PHPMentors\DomainKata\Service\ServiceInterface;
use Stagehand\FSM\Event\EventInterface;
use Stagehand\FSM\StateMachine\StateMachineInterface;

/**
 * @since Class available since Release 3.0.0
 */
interface GuardEvaluatorInterface extends ServiceInterface
{
    /**
     * @param EventInterface        $event
     * @param mixed                 $payload
     * @param StateMachineInterface $stateMachine
     *
     * @return bool
     */
    public function evaluate(EventInterface $event, $payload, StateMachineInterface $stateMachine);
}
