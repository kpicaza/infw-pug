<?php

namespace InFw\Pug;

class ConfigProvider
{
    public function __invoke()
    {
        return [
            'templates' => [
                'extension' => 'pug',
            ],
            'pug' => [
                'pretty' => true,
                'cache' => 'data/cache/pug',
                'globals' => [
                    'foo' => 'bar'
                ]
            ]
        ];
    }
}
