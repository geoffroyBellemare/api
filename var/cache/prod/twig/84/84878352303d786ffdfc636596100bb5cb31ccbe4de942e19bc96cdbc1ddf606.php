<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @EasyAdmin/default/includes/_actions_dropdown.html.twig */
class __TwigTemplate_08245c3119133157ef3eb8540bf20da244a4077ead3ba9ae6e8c0b31bdc241cb extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"actions-dropdown\">
    <button type=\"button\" class=\"btn btn-secondary btn-sm dropdown-toggle\">
        <i class=\"fa fa-fw fa-ellipsis-h\"></i>
    </button>

    <div class=\"dropdown-menu dropdown-menu-right\">
        ";
        // line 7
        echo twig_include($this->env, $context, "@EasyAdmin/default/includes/_actions.html.twig", ["is_dropdown" => true]);
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@EasyAdmin/default/includes/_actions_dropdown.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@EasyAdmin/default/includes/_actions_dropdown.html.twig", "/Users/geoffroybellemare/Documents/workspace/PhpServer/vendor/easycorp/easyadmin-bundle/src/Resources/views/default/includes/_actions_dropdown.html.twig");
    }
}
