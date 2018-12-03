<?php

// DI container pattern:
class SomeComponent //какой-то компонент
{
    public function doSomething() //сделай что-то
    {
		echo 'что-то';
    }
}

class App //приложение
{
	public $theComponent;
    public function __construct(SomeComponent $theComponent)
    {
        $this->theComponent = $theComponent;
    }

    public function run()
    {
        $this->theComponent->doSomething();

    }
}

class DIContainer
{
    public function get($className)
    {
        switch ($className) {
            case SomeComponent::class:
                return new SomeComponent;
            case App::class:
                return new App($this->get(SomeComponent::class));
            default:
                throw new Exception;
        }
    }
}

$DIContainer = new DIContainer();
$app = $DIContainer->get(App::class); //передаем сюда App 
$app->run();
