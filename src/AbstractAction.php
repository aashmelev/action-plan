<?php

namespace Aashmelev\ActionPlan;

/**
 * Class AbstractAction
 * @package Aashmelev\ActionPlan
 */
abstract class AbstractAction
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $description;

    /**
     * @param string|null $id
     * @param string $description
     * @throws \ReflectionException
     */
    public function __construct(string $id = null, string $description = '')
    {
        $this->id = isset($id) ? $id : (new \ReflectionClass($this))->getShortName();
        $this->description = $description;
    }

    /**
     * Executing the action
     */
    abstract public function execute(): void;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getInfo(): string
    {
        return sprintf('Action#%s - %s', $this->id, $this->description);
    }

    public function __toString(): string
    {
        return $this->getInfo();
    }
}