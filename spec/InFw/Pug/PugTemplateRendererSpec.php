<?php

namespace spec\InFw\Pug;

use InFw\Pug\PugTemplateRenderer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Pug\Pug;
use Zend\Expressive\Template\TemplateRendererInterface;

class PugTemplateRendererSpec extends ObjectBehavior
{
    function it_should_render_pug_template()
    {
        $this->beConstructedWith(
            new Pug(),
            ['foo' => 'bar'],
            [
                'extension' => 'pug',
                'template_path' => 'templates/',
            ]
        );

        $this->render('foo', [])->shouldBe('<h1>bar</h1>');
    }
}
