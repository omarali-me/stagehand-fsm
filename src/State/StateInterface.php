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

namespace Stagehand\FSM\State;

use Stagehand\FSM\Token\TokenAwareInterface;

/**
 * @since Class available since Release 2.0.0
 */
interface StateInterface extends TokenAwareInterface
{
    /**
     * Gets the ID of the state.
     *
     * @return string
     */
    public function getStateId();

    /**
     * @return bool
     */
    public function hasToken(): bool;
}
