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
class __TwigTemplate_b0d0ae2ac0233348c811446c25a3464cf9f93dc0090b6d682aa3c0cd304c7e8b extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Email/confirmationCommandCustomerSucces.html.twig"));

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
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 10, $this->source); })()), "getName", [], "any", false, false, false, 10), "html", null, true);
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
        echo twig_escape_filter($this->env, (isset($context["totalAmount"]) || array_key_exists("totalAmount", $context) ? $context["totalAmount"] : (function () { throw new RuntimeError('Variable "totalAmount" does not exist.', 15, $this->source); })()), "html", null, true);
        echo "</b></p>
    </div>
    <div style=\"width: max-content; height: ";
        // line 17
        echo 60;
        echo "\">
        <p style=\"color: #0F83E8\">totalAmount: <b style=\"color: #6c757d\">";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["totalAmount"]) || array_key_exists("totalAmount", $context) ? $context["totalAmount"] : (function () { throw new RuntimeError('Variable "totalAmount" does not exist.', 18, $this->source); })()), "html", null, true);
        echo "</b></p>
    </div>
</div>

    <img src=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["img"]) || array_key_exists("img", $context) ? $context["img"] : (function () { throw new RuntimeError('Variable "img" does not exist.', 22, $this->source); })()), "html", null, true);
        echo "\" width=\"300\" height=\"300\"  />







";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

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
        return array (  78 => 22,  71 => 18,  67 => 17,  62 => 15,  58 => 14,  51 => 10,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<style type=\"text/css\">
    span {
        color: #0F83E8;
        font-family: \"Open Sans\", sans-serif;
        font-size: 20px;
    }
</style>
<span style='color: #0F83E8; font-family: \"Open Sans\",sans-serif; font-size: 25px'>
    {{ user.getName }}, Your command has been proceed
</span>
</br>
<div>
    <div style=\"width: max-content; height: {{60}}\">
        <p style=\"color: #0F83E8\">totalAmount: <b style=\"color: #6c757d\">{{ totalAmount }}</b></p>
    </div>
    <div style=\"width: max-content; height: {{60}}\">
        <p style=\"color: #0F83E8\">totalAmount: <b style=\"color: #6c757d\">{{ totalAmount }}</b></p>
    </div>
</div>

    <img src=\"{{ img }}\" width=\"300\" height=\"300\"  />







", "Email/confirmationCommandCustomerSucces.html.twig", "/Users/geoffroybellemare/Documents/workspace/PhpServer/templates/Email/confirmationCommandCustomerSucces.html.twig");
    }
}
