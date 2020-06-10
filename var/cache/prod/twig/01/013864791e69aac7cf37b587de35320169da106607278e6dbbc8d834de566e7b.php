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

/* Email/confirmationCommandCompanySucces.html.twig */
class __TwigTemplate_8a5b3db922854ddd4ed4fcbe5e0fec0082a873060c94e1b5363959265840c57d extends \Twig\Template
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
        echo "<h3>
    ";
        // line 2
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "getName", [], "any", false, false, false, 2), "html", null, true);
        echo ", are happy to seeing you soon
</h3>



";
    }

    public function getTemplateName()
    {
        return "Email/confirmationCommandCompanySucces.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Email/confirmationCommandCompanySucces.html.twig", "/Users/geoffroybellemare/Documents/workspace/PhpServer/templates/Email/confirmationCommandCompanySucces.html.twig");
    }
}
