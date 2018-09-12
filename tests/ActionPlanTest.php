<?php

namespace Aashmelev\ActionPlan\Tests;

use Aashmelev\ActionPlan\AbstractAction;
use Aashmelev\ActionPlan\ActionPlan;
use Aashmelev\ActionPlan\Tests\Fixtures\SimpleAction;
use PHPUnit\Framework\TestCase;

class ActionPlanTest extends TestCase
{
    public function testCountActions()
    {
        $actionPlan = new ActionPlan([]);
        $this->assertEquals(0, $actionPlan->countActions());

        $actionPlan = new ActionPlan([
            new SimpleAction('SimpleAction#1'),
        ]);
        $this->assertEquals(1, $actionPlan->countActions());

        $actionPlan = new ActionPlan([
            new SimpleAction('SimpleAction#1'),
            new SimpleAction('SimpleAction#2'),
        ]);
        $this->assertEquals(2, $actionPlan->countActions());
    }

    public function testIterateActions()
    {
        $actionPlan = new ActionPlan([
            new SimpleAction('SimpleAction#1'),
        ]);

        $action = $actionPlan->iterateActions()->current();
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
}
