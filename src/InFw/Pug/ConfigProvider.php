<?php

namespace InFw\Pug;

use Pug\Pug;

class ConfigProvider
{
    public function __invoke()
    {
        return [
            'dependencies' => [
                'factories' => [
                    Pug::class => PugFactory::class,
                ]
            ],
            'templates' => [
                'extension' => 'pug',
            ],
            'pug' => [
                'pretty' => true,
                'expressionLanguage' => 'js',
                'pugjs' => false,
                'localsJsonFile' => false,
                'cache' => 'data/cache/pug',
                'template_path' => '',
                'globals' => [
                ],
                'filters' => [

                ],
                'keywords' => [

                ],
                'helpers' => [

                ]
            ]
        ];
    }
}
