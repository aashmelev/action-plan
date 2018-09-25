<?php

namespace Aashmelev\ActionPlan\Tests;

use Aashmelev\ActionPlan\AbstractAction;
use Aashmelev\ActionPlan\ActionPlan;
use Aashmelev\ActionPlan\Tests\Fixtures\SimpleAction;
use PHPUnit\Framework\TestCase;

class ActionPlanTest extends TestCase
{
    public function testCount()
    {
        $actionPlan = new ActionPlan([]);
        $this->assertEquals(0, $actionPlan->count());

        $actionPlan = new ActionPlan([
            new SimpleAction('SimpleAction#1'),
        ]);
        $this->assertEquals(1, $actionPlan->count());

        $actionPlan = new ActionPlan([
            new SimpleAction('SimpleAction#1'),
            new SimpleAction('SimpleAction#2'),
        ]);
        $this->assertEquals(2, $actionPlan->count());
    }

    public function testIterator()
    {
        $actionPlan = new ActionPlan([
            new SimpleAction('SimpleAction#1'),
        ]);

        $action = $actionPlan->getIterator()->current();
        $this->assertInstanceOf(AbstractAction::class, $action);
    }

    public function testRun()
    {
        $actionPlan = new ActionPlan([
            new SimpleAction('SimpleAction#1'),
        ]);

        $this->expectOutputString('Simple Action...');
        $actionPlan->run();
    }

    public function testSetActions()
    {
        $actionPlan = new ActionPlan();

        $actionPlan->setActions([
            new SimpleAction('SimpleAction#1'),
        ]);
        $this->assertEquals(1, count($actionPlan->getActions()));

        $actionPlan->setActions([
            new SimpleAction('SimpleAction#1'),
            new SimpleAction('SimpleAction#2'),
        ]);
        $this->assertEquals(2, count($actionPlan->getActions()));
    }
}
