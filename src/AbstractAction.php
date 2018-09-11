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
     * Метод, содержащий логику действия
     */
    abstract public function execute(): void;

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getInfo(): string
    {
        return sprintf('Action#%s - %s', $this->id, $this->description);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getInfo();
    }
}