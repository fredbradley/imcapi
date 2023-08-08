<?php

namespace FredBradley\IMCAPI\Tests;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setup(): void
    {
        $container = new Container();

        Container::setInstance($container);
        Facade::setFacadeApplication($container);
        parent::setup();
    }

    protected function tearDown(): void
    {
        Facade::clearResolvedInstances();
        Facade::setFacadeApplication(null);
        Container::setInstance(null);
        \Mockery::close();
        parent::tearDown(); // TODO: Change the autogenerated stub
    }
}
