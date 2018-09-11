<?php

namespace Aashmelev\ActionPlan;

/**
 * Class ActionPlan
 * @package Aashmelev\ActionPlan
 */
class ActionPlan
{
    /**
     * @var AbstractAction[]
     */
    protected $actions;

    /**
     * @param AbstractAction[] $actions
     */
    public function __construct(array $actions)
    {
        $this->actions = $actions;
    }

    /**
     * @return \Generator
     */
    public function iterateActions(): \Generator
    {
        foreach ($this->actions as $action) {
            /** @var AbstractAction $action */
            yield $action;
        }
    }

    /**
     * @return int
     */
    public function countActions(): int
    {
        return count($this->actions);
    }
    
    public function run(): void
    {
        /** @var AbstractAction $action */
        foreach ($this->iterateActions() as $action) {
            $action->execute();
        }
    }
}