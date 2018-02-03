# Expressive Phug Template Renderer

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kpicaza/infw-pug/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kpicaza/infw-pug/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/kpicaza/infw-pug/badges/build.png?b=master)](https://scrutinizer-ci.com/g/kpicaza/infw-pug/build-status/master)
[![Maintainability](https://api.codeclimate.com/v1/badges/2f4af7a1f76a00fb03a5/maintainability)](https://codeclimate.com/github/kpicaza/infw-pug/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/2f4af7a1f76a00fb03a5/test_coverage)](https://codeclimate.com/github/kpicaza/infw-pug/test_coverage)

## Installation

Install with composer

````
composer require infw/pug
````

Enable config provider

````
<?php
// config/config.php

use Zend\ConfigAggregator\ArrayProvider;
use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

// To enable or disable caching, set the `ConfigAggregator::ENABLE_CACHE` boolean in
// `config/autoload/local.php`.
$cacheConfig = [
    'config_cache_path' => 'data/cache/config-cache.php',
];

$aggregator = new ConfigAggregator([
    \InFw\Pug\ConfigProvider::class,

    ...

    new PhpFileProvider('config/autoload/{{,*.}global,{,*.}local}.php'),

    // Load development config if it exists
    new PhpFileProvider('config/development.config.php'),
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();

````

Enable dependencies

````
<?php
// config/autoload/templates.global

use Zend\Expressive\Template\TemplateRendererInterface;
use InFw\Pug\PugRendererFactory;

return [
    'dependencies' => [
        'factories' => [
            TemplateRendererInterface::class => PugRendererFactory::class,
        ],
    ],

    'templates' => [
        'extension' => 'pug',
    ],
];
````
