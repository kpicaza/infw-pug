<?php

namespace spec\InFw\Pug;

use InFw\Pug\ConfigProvider;
use InFw\Pug\PugRendererFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Container\ContainerInterface;
use Pug\Pug;
use Zend\Expressive\Template\TemplateRendererInterface;

class PugRendererFactorySpec extends ObjectBehavior
{
    function it_should_create_pug_template_renderer_instances(
        ContainerInterface $container
    ) {
        $container->get(Pug::class)->willReturn(new Pug())->shouldBeCalled();
        $container->get('config')->willReturn((new ConfigProvider())())->shouldBeCalled();

        $this->__invoke($container)->shouldBeAnInstanceOf(TemplateRendererInterface::class);
    }
}
