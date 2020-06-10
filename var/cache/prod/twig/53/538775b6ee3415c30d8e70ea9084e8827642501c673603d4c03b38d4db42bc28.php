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

/* Email/confirmation.html.twig */
class __TwigTemplate_33b44509feb2118b61ddf4b7acc9ea4e088bb02f32019052312f16f7a505d867 extends \Twig\Template
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
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getName", [], "any", false, false, false, 2), "html", null, true);
        echo ", Please Confirm your Email adress
</h3>
<p>
    please confir address by click the link -> <a href=\"\">this</a>
</p>";
    }

    public function getTemplateName()
    {
        return "Email/confirmation.html.twig";
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
        return new Source("", "Email/confirmation.html.twig", "/Users/geoffroybellemare/Documents/workspace/PhpServer/templates/Email/confirmation.html.twig");
    }
}
