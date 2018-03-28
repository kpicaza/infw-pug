<?php

namespace InFw\Pug;

use Pug\Pug;

class ConfigProvider
{
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
            'pug' => $this->getPugConfig(),
        ];
    }

    protected function getDependencies()
    {
        return [
            'factories' => [
                Pug::class => PugFactory::class,
            ]
        ];
    }

    protected function getTemplates()
    {
        return [
            'extension' => 'pug',
        ];
    }

    protected function getPugConfig()
    {
        return [
            'pretty' => true,
            'expressionLanguage' => 'js',
            'pugjs' => false,
            'localsJsonFile' => false,
            'cache' => 'data/cache/pug',
            'template_path' => 'templates/',
            'globals' => [],
            'filters' => [],
            'keywords' => [],
            'helpers' => [],
            'default_params' => [],
        ];
    }
}
