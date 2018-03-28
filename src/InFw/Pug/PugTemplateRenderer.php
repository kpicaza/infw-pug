<?php

namespace InFw\Pug;

use Pug\Pug;
use Zend\Expressive\Template\TemplatePath;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\Template\DefaultParamsTrait;

class PugTemplateRenderer implements TemplateRendererInterface
{
    use DefaultParamsTrait;

    const DEFAULT_PATH = 'templates/';

    /**
     * @var Pug
     */
    private $pug;

    /**
     * @var string
     */
    private $path;

    /**
     * @var array
     */
    private $globals;

    /**
     * @var array
     */
    private $config;

    public function __construct(Pug $pug, array $defaultParams, array $globals, array $config)
    {
        $this->pug = $pug;
        $this->globals = $globals;
        $this->config = $config;
        $this->addPath($this->config['template_path']);
        $this->setDefaultParams($defaultParams);
    }

    private function setDefaultParams($defaultParams)
    {
        foreach ($defaultParams as $name => $params) {
            foreach ($params as $param => $value) {
                $this->addDefaultParam($name, $param, $value);
            }
        }
    }

    /**
     * @param string $name
     * @param array $params
     * @return string
     * @throws \Exception
     */
    public function render(string $name, $params = []) : string
    {
        return $this->pug->render(
            sprintf(
                '%s.%s',
                $this->path . str_replace('::', '/', $name),
                $this->config['extension']
            ),
            $this->mergeParams($name, array_merge($this->globals, $params))
        );
    }

    /**
     * Add a template path to the engine.
     *
     * Adds a template path, with optional namespace the templates in that path
     * provide.
     *
     * @param string $path
     * @param string $namespace
     */
    public function addPath(string $path, string $namespace = null) : void
    {
        $this->path = empty($path) ? self::DEFAULT_PATH : $path;
    }

    /**
     * Retrieve configured paths from the engine.
     *
     * @return TemplatePath[]
     */
    public function getPaths() : array
    {
        return [new TemplatePath($this->path)];
    }
}
