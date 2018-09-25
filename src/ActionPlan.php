<?php

namespace Aashmelev\ActionPlan;

/**
 * Class ActionPlan
 * @package Aashmelev\ActionPlan
 */
class ActionPlan implements \IteratorAggregate, \Countable
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

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->actions);
    }

    public function count(): int
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

    /**
     * @return AbstractAction[]
     */
    public function getActions(): array
    {
        return $this->actions;
    }

    /**
     * @param AbstractAction[] $actions
     */
    public function setActions(array $actions): void
    {
        $this->actions = $actions;
    }
}