<?php

namespace Aashmelev\ActionPlan\Tests;

use Aashmelev\ActionPlan\Tests\Fixtures\SimpleAction;
use PHPUnit\Framework\TestCase;

class AbstractActionTest extends TestCase
{
    public function testConstructorWithDefaultParams()
    {
        $simpleAction = new SimpleAction();
        $this->assertEquals('SimpleAction', $simpleAction->getId());
        $this->assertEquals('', $simpleAction->getDescription());
    }

    public function testConstructorWithCustomParams()
    {
        $simpleAction = new SimpleAction('AnotherName', 'Description');
        $this->assertEquals('AnotherName', $simpleAction->getId());
        $this->assertEquals('Description', $simpleAction->getDescription());
    }

    public function testSetId()
    {
        $simpleAction = new SimpleAction();
        $simpleAction->setId('NewAction');
        $this->assertEquals('NewAction', $simpleAction->getId());
    }

    public function testSetDescription()
    {
        $simpleAction = new SimpleAction();
        $simpleAction->setDescription('New Description');
        $this->assertEquals('New Description', $simpleAction->getDescription());
    }

    public function testToString()
    {
        $simpleAction = new SimpleAction();
        $this->assertEquals($simpleAction->getInfo(), (string) $simpleAction);
    }
}
