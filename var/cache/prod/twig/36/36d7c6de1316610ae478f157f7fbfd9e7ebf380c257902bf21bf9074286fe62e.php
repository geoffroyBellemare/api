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

/* Email/confirmationCommandCustomerSucces.html.twig */
class __TwigTemplate_9d9ada1c1d684ae0918fe695aaadeaa20c0e4c16f3c3fb36b2432ac61ce29283 extends \Twig\Template
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
        echo "
<style type=\"text/css\">
    span {
        color: #0F83E8;
        font-family: \"Open Sans\", sans-serif;
        font-size: 20px;
    }
</style>
<span style='color: #0F83E8; font-family: \"Open Sans\",sans-serif; font-size: 25px'>
    ";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getName", [], "any", false, false, false, 10), "html", null, true);
        echo ", Your command has been proceed
</span>
</br>
<div>
    <div style=\"width: max-content; height: ";
        // line 14
        echo 60;
        echo "\">
        <p style=\"color: #0F83E8\">totalAmount: <b style=\"color: #6c757d\">";
        // line 15
        echo twig_escape_filter($this->env, ($context["totalAmount"] ?? null), "html", null, true);
        echo "</b></p>
    </div>
    <div style=\"width: max-content; height: ";
        // line 17
        echo 60;
        echo "\">
        <p style=\"color: #0F83E8\">totalAmount: <b style=\"color: #6c757d\">";
        // line 18
        echo twig_escape_filter($this->env, ($context["totalAmount"] ?? null), "html", null, true);
        echo "</b></p>
    </div>
</div>

    <img src=\"";
        // line 22
        echo twig_escape_filter($this->env, ($context["img"] ?? null), "html", null, true);
        echo "\" width=\"300\" height=\"300\"  />







";
    }

    public function getTemplateName()
    {
        return "Email/confirmationCommandCustomerSucces.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 22,  68 => 18,  64 => 17,  59 => 15,  55 => 14,  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Email/confirmationCommandCustomerSucces.html.twig", "/Users/geoffroybellemare/Documents/workspace/PhpServer/templates/Email/confirmationCommandCustomerSucces.html.twig");
    }
}
