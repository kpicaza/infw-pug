<?php

namespace InFw\Pug;

use Pug\Pug;
use Zend\Expressive\Template\TemplatePath;
use Zend\Expressive\Template\TemplateRendererInterface;

class PugTemplateRenderer implements TemplateRendererInterface
{
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

    public function __construct(Pug $pug, array $globals, array $config)
    {
        $this->pug = $pug;
        $this->globals = $globals;
        $this->config = $config;
        $this->addPath($this->config['template_path']);
    }

    public function render(string $name, $params = []) : string
    {
        return $this->pug->render(
            sprintf(
                '%s.%s',
                $this->path . str_replace('::', '/', $name),
                $this->config['extension']
            ),
            array_merge($params, $this->globals)
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

    /**
     * Add a default parameter to use with a template.
     *
     * Use this method to provide a default parameter to use when a template is
     * rendered. The parameter may be overridden by providing it when calling
     * `render()`, or by calling this method again with a null value.
     *
     * The parameter will be specific to the template name provided. To make
     * the parameter available to any template, pass the TEMPLATE_ALL constant
     * for the template name.
     *
     * If the default parameter existed previously, subsequent invocations with
     * the same template name and parameter name will overwrite.
     *
     * @param string $templateName Name of template to which the param applies;
     *     use TEMPLATE_ALL to apply to all templates.
     * @param string $param Param name.
     * @param mixed $value
     */
    public function addDefaultParam(string $templateName, string $param, $value) : void
    {
    }
}
