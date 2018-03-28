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
            $config['pug']['default_params'],
            $config['pug']['globals'],
            array_merge(
                $config['templates'],
                [
                    'template_path' => $config['pug']['template_path']
                ]
            )
        );
    }
}
