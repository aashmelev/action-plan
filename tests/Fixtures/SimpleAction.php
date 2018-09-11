<?php

namespace Aashmelev\ActionPlan\Tests\Fixtures;

use Aashmelev\ActionPlan\AbstractAction;

class SimpleAction extends AbstractAction
{

    public function execute(): void
    {
        echo 'Simple Action...';
    }
}