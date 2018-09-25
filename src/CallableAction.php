<?php

namespace Aashmelev\ActionPlan;

/**
 * Class CallableAction
 * @package Aashmelev\ActionPlan
 */
class CallableAction extends AbstractAction
{
    /**
     * @var callable
     */
    private $action;

    /**
     * @param $id
     * @param $description
     * @param callable $action
     * @throws \ReflectionException
     */
    public function __construct($id, $description, Callable $action)
    {
        parent::__construct($id, $description);
        $this->action = $action;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(): void
    {
        call_user_func($this->action);
    }
}