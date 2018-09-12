<?php

namespace Aashmelev\ActionPlan\Tests;

use Aashmelev\ActionPlan\CallableAction;
use PHPUnit\Framework\TestCase;

class CallableActionTest extends TestCase
{
    public function testExecute()
    {
        $callableAction = new CallableAction('callableAction', 'Callable Action Description', function() {
           echo 'Callable Action...';
        });

        $this->expectOutputString('Callable Action...');
        $callableAction->execute();
    }
}
