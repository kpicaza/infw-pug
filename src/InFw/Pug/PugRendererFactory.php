<?php

namespace InFw\Pug;

use Psr\Container\ContainerInterface;
use Pug\Pug;

class PugRendererFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');

        return new PugTemplateRenderer(
            $container->get(Pug::class),
            $config['pug']['globals'],
            $config['templates']
        );
    }
}