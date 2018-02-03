<?php

namespace spec\InFw\Pug;

use InFw\Pug\ConfigProvider;
use InFw\Pug\PugFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Container\ContainerInterface;
use Pug\Pug;

class PugFactorySpec extends ObjectBehavior
{
    function it_should_create_pug_instances(
        ContainerInterface $container
    ) {
        $container->get('config')->willReturn((new ConfigProvider())())->shouldBeCalled();

        $this->__invoke($container)->shouldBeAnInstanceOf(Pug::class);
    }
}
