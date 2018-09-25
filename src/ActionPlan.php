<?php

namespace Aashmelev\ActionPlan;

/**
 * Class ActionPlan
 * @package Aashmelev\ActionPlan
 */
class ActionPlan implements \IteratorAggregate
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
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->actions);
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
        foreach ($this->getIterator() as $action) {
            $action->execute();
        }
    }
}