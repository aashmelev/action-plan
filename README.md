Action Plan
===========

This package is designed for flexible formation and execution of a sequence of actions.

Example of use:

```PHP
    require 'vendor/autoload.php';
    
    use Aashmelev\ActionPlan\AbstractAction;
    use Aashmelev\ActionPlan\ActionPlan;
    use Aashmelev\ActionPlan\CallableAction;

    class SimpleAction extends AbstractAction
    {
        public function execute(): void
        {
            echo 'Simple Action...';
        }
    }

    $actionPlan = new ActionPlan([
        new SimpleAction('SimpleActionId', 'Description'),
        new CallableAction('CallableActionId', 'Description', function() {
            echo 'Callable Action...';
        }),
    ]);

    $actionPlan->run();
```

Output:
```
Simple Action...
Callable Action...
```