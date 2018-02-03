<?php

namespace InFw\Pug;

use Psr\Container\ContainerInterface;
use Pug\Pug;

class PugRendererFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config')['pug'];
        $globals = $config['globals'];
        $pug = new Pug([
            'pretty' => $config['pretty'],
            'cache' => $config['cache'],
        ]);

        return new PugTemplateRenderer($pug, $globals);
    }
}