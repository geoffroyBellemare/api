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

/* @EasyAdmin/default/layout.html.twig */
class __TwigTemplate_796db7ceba1ed056f67be502afce05d8169776b51f7353bc06bfc5318f520d81 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'page_title' => [$this, 'block_page_title'],
            'head_stylesheets' => [$this, 'block_head_stylesheets'],
            'head_custom_stylesheets' => [$this, 'block_head_custom_stylesheets'],
            'head_favicon' => [$this, 'block_head_favicon'],
            'head_javascript' => [$this, 'block_head_javascript'],
            'body' => [$this, 'block_body'],
            'body_id' => [$this, 'block_body_id'],
            'body_class' => [$this, 'block_body_class'],
            'wrapper_wrapper' => [$this, 'block_wrapper_wrapper'],
            'wrapper' => [$this, 'block_wrapper'],
            'header' => [$this, 'block_header'],
            'header_logo' => [$this, 'block_header_logo'],
            'user_menu' => [$this, 'block_user_menu'],
            'header_custom_menu' => [$this, 'block_header_custom_menu'],
            'sidebar' => [$this, 'block_sidebar'],
            'main_menu_wrapper' => [$this, 'block_main_menu_wrapper'],
            'flash_messages' => [$this, 'block_flash_messages'],
            'content' => [$this, 'block_content'],
            'content_header_wrapper' => [$this, 'block_content_header_wrapper'],
            'content_header' => [$this, 'block_content_header'],
            'content_title' => [$this, 'block_content_title'],
            'global_actions_wrapper' => [$this, 'block_global_actions_wrapper'],
            'global_actions' => [$this, 'block_global_actions'],
            'content_help' => [$this, 'block_content_help'],
            'main' => [$this, 'block_main'],
            'content_footer_wrapper' => [$this, 'block_content_footer_wrapper'],
            'content_footer' => [$this, 'block_content_footer'],
            'body_javascript' => [$this, 'block_body_javascript'],
            'body_custom_javascript' => [$this, 'block_body_custom_javascript'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"";
        // line 2
        echo twig_escape_filter($this->env, _twig_default_filter(twig_first($this->env, twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 2), "locale", [], "any", false, false, false, 2), "_")), "en"), "html", null, true);
        echo "\" dir=\"";
        echo (($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("design.rtl")) ? ("rtl") : ("ltr"));
        echo "\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"robots\" content=\"noindex, nofollow, noarchive, nosnippet, noodp, noimageindex, notranslate, nocache\" />
        <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
        <meta name=\"generator\" content=\"EasyAdmin\" />

        <title>";
        // line 10
        $this->displayBlock('page_title', $context, $blocks);
        echo "</title>

        ";
        // line 12
        $this->displayBlock('head_stylesheets', $context, $blocks);
        // line 15
        echo "
        ";
        // line 16
        $this->displayBlock('head_custom_stylesheets', $context, $blocks);
        // line 21
        echo "
        ";
        // line 22
        if (($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("design.brand_color") != "hsl(230, 55%, 60%)")) {
            // line 23
            echo "        <style>
            :root { --color-primary: ";
            // line 24
            echo twig_escape_filter($this->env, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("design.brand_color"), "html", null, true);
            echo "; }
        </style>
        ";
        }
        // line 27
        echo "
        ";
        // line 28
        $this->displayBlock('head_favicon', $context, $blocks);
        // line 32
        echo "
        ";
        // line 33
        $this->displayBlock('head_javascript', $context, $blocks);
        // line 36
        echo "
        ";
        // line 37
        if ($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("design.rtl")) {
            // line 38
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/easyadmin/app.rtl.css"), "html", null, true);
            echo "\">
            <link rel=\"stylesheet\" href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/easyadmin/app-custom-rtl.css"), "html", null, true);
            echo "\">
        ";
        }
        // line 41
        echo "    </head>

    ";
        // line 43
        $this->displayBlock('body', $context, $blocks);
        // line 204
        echo "</html>
";
    }

    // line 10
    public function block_page_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo strip_tags(        $this->renderBlock("content_title", $context, $blocks));
    }

    // line 12
    public function block_head_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        echo "            <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/easyadmin/app.css"), "html", null, true);
        echo "\">
        ";
    }

    // line 16
    public function block_head_custom_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 17
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("design.assets.css"));
        foreach ($context['_seq'] as $context["_key"] => $context["css_asset"]) {
            // line 18
            echo "                <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($context["css_asset"]), "html", null, true);
            echo "\">
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['css_asset'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "        ";
    }

    // line 28
    public function block_head_favicon($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "            ";
        $context["favicon"] = $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("design.assets.favicon");
        // line 30
        echo "            <link rel=\"icon\" type=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["favicon"] ?? null), "mime_type", [], "any", false, false, false, 30), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(twig_get_attribute($this->env, $this->source, ($context["favicon"] ?? null), "path", [], "any", false, false, false, 30)), "html", null, true);
        echo "\" />
        ";
    }

    // line 33
    public function block_head_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/easyadmin/app.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    // line 43
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 44
        echo "    <body id=\"";
        $this->displayBlock('body_id', $context, $blocks);
        echo "\" class=\"easyadmin ";
        $this->displayBlock('body_class', $context, $blocks);
        echo "\">
        <script>
            document.body.classList.add(
                'easyadmin-content-width-' + (localStorage.getItem('easyadmin/content/width') || 'normal'),
                'easyadmin-sidebar-width-' + (localStorage.getItem('easyadmin/sidebar/width') || 'normal')
            );
        </script>

        ";
        // line 52
        $this->displayBlock('wrapper_wrapper', $context, $blocks);
        // line 193
        echo "
        ";
        // line 194
        $this->displayBlock('body_javascript', $context, $blocks);
        // line 195
        echo "
        ";
        // line 196
        $this->displayBlock('body_custom_javascript', $context, $blocks);
        // line 201
        echo "
    </body>
    ";
    }

    // line 44
    public function block_body_id($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_body_class($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 52
    public function block_wrapper_wrapper($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 53
        echo "        <div class=\"wrapper\">
        ";
        // line 54
        $this->displayBlock('wrapper', $context, $blocks);
        // line 191
        echo "        </div>
        ";
    }

    // line 54
    public function block_wrapper($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 55
        echo "            <header class=\"main-header\">
                ";
        // line 56
        $this->displayBlock('header', $context, $blocks);
        // line 125
        echo "            </header>

            <aside class=\"main-sidebar\">
            ";
        // line 128
        $this->displayBlock('sidebar', $context, $blocks);
        // line 140
        echo "            </aside>

            <div class=\"content-wrapper\">
                ";
        // line 143
        $this->displayBlock('flash_messages', $context, $blocks);
        // line 146
        echo "
                <div id=\"sidebar-resizer-handler\" class=\"resizer-handler resizer-handler-left\"></div>

                ";
        // line 149
        $this->displayBlock('content', $context, $blocks);
        // line 187
        echo "
                <div id=\"content-resizer-handler\" class=\"resizer-handler resizer-handler-right\"></div>
            </div>
        ";
    }

    // line 56
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 57
        echo "                    <nav class=\"navbar\" role=\"navigation\">
                        <button id=\"navigation-toggler\" type=\"button\" aria-label=\"Toggle navigation\">
                            <i class=\"fa fa-fw fa-bars\"></i>
                        </button>

                        <div id=\"header-logo\">
                            ";
        // line 63
        $this->displayBlock('header_logo', $context, $blocks);
        // line 68
        echo "                        </div>
                    </nav>

                    ";
        // line 71
        $context["_user_name"] = _twig_default_filter($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->readProperty(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 71), $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("user.name_property_path")), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("user.unnamed", array(), "EasyAdminBundle"));
        // line 72
        echo "                    ";
        $context["_logout_path"] = $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getLogoutPath();
        // line 73
        echo "                    ";
        $context["_user_has_logout"] =  !twig_test_empty(($context["_logout_path"] ?? null));
        // line 74
        echo "
                    ";
        // line 75
        if (twig_constant_is_defined("Symfony\\Component\\Security\\Core\\Authorization\\Voter\\AuthenticatedVoter::IS_IMPERSONATOR")) {
            // line 76
            echo "                        ";
            $context["_user_is_impersonated"] = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_IMPERSONATOR");
            // line 77
            echo "                    ";
        } else {
            // line 78
            echo "                        ";
            $context["_user_is_impersonated"] = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_PREVIOUS_ADMIN");
            // line 79
            echo "                    ";
        }
        // line 80
        echo "
                    ";
        // line 81
        ob_start(function () { return ''; });
        // line 82
        echo "                        <div class=\"popover-content-section user-details ";
        echo (((($context["_user_has_logout"] ?? null) || ($context["_user_is_impersonated"] ?? null))) ? ("user-has-actions") : (""));
        echo "\">
                            <p class=\"small text-muted mb-0\">";
        // line 83
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("user.logged_in_as", array(), "EasyAdminBundle"), "html", null, true);
        echo "</p>
                            <p class=\"user-details-name\">
                                ";
        // line 85
        if ((((twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", true, true, false, 85)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 85), false)) : (false)) == false)) {
            // line 86
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("user.anonymous", array(), "EasyAdminBundle"), "html", null, true);
            echo "
                                ";
        } else {
            // line 88
            echo "                                    ";
            echo twig_escape_filter($this->env, ($context["_user_name"] ?? null), "html", null, true);
            echo "
                                ";
        }
        // line 90
        echo "                            </p>
                        </div>

                        ";
        // line 93
        $this->displayBlock('user_menu', $context, $blocks);
        // line 105
        echo "                    ";
        $context["_user_menu_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 106
        echo "
                    <div class=\"content-top navbar-custom-menu\">
                        ";
        // line 108
        $this->displayBlock('header_custom_menu', $context, $blocks);
        // line 123
        echo "                    </div>
                ";
    }

    // line 63
    public function block_header_logo($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 64
        echo "                                <a class=\"logo ";
        echo (((twig_length_filter($this->env, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("site_name")) > 14)) ? ("logo-long") : (""));
        echo "\" title=\"";
        echo twig_escape_filter($this->env, strip_tags($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("site_name")), "html", null, true);
        echo "\" href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("easyadmin");
        echo "\">
                                    ";
        // line 65
        echo $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("site_name");
        echo "
                                </a>
                            ";
    }

    // line 93
    public function block_user_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 94
        echo "                            ";
        if ((($context["_user_has_logout"] ?? null) || ($context["_user_is_impersonated"] ?? null))) {
            // line 95
            echo "                                <div class=\"popover-content-section user-menu\">
                                    ";
            // line 96
            if (($context["_user_has_logout"] ?? null)) {
                // line 97
                echo "                                        <a class=\"user-action user-action-logout\" href=\"";
                echo twig_escape_filter($this->env, ($context["_logout_path"] ?? null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("user.signout", array(), "EasyAdminBundle"), "html", null, true);
                echo "</a>
                                    ";
            }
            // line 99
            echo "                                    ";
            if (($context["_user_is_impersonated"] ?? null)) {
                // line 100
                echo "                                        <a class=\"user-action user-action-exit-impersonation\" href=\"?_switch_user=_exit\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("user.exit_impersonation", array(), "EasyAdminBundle"), "html", null, true);
                echo "</a>
                                    ";
            }
            // line 102
            echo "                                </div>
                            ";
        }
        // line 104
        echo "                        ";
    }

    // line 108
    public function block_header_custom_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 109
        echo "                            <div class=\"user user-menu-wrapper ";
        echo ((($context["_user_is_impersonated"] ?? null)) ? ("user-is-impersonated") : (""));
        echo "\" data-toggle=\"popover\" data-placement=\"bottom\" data-container=\".user-menu-wrapper\" data-content=\"";
        echo twig_escape_filter($this->env, ($context["_user_menu_content"] ?? null), "html_attr");
        echo "\" data-html=\"true\">
                                ";
        // line 110
        if ($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("user.display_avatar")) {
            // line 111
            echo "                                    ";
            $context["_avatar_image_path"] = $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->readProperty(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 111), $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("user.avatar_property_path"));
            // line 112
            echo "                                    ";
            if ((null == ($context["_avatar_image_path"] ?? null))) {
                // line 113
                echo "                                        <i class=\"fa fa-fw ";
                echo (( !(null === twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 113))) ? ("fa-user-circle") : ("fa-user-times"));
                echo " user-avatar\"></i>
                                    ";
            } else {
                // line 115
                echo "                                        <img class=\"user-avatar\" src=\"";
                echo twig_escape_filter($this->env, ($context["_avatar_image_path"] ?? null), "html", null, true);
                echo "\" />
                                    ";
            }
            // line 117
            echo "                                ";
        }
        // line 118
        echo "                                ";
        if ($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("user.display_name")) {
            // line 119
            echo "                                    <span class=\"user-name\">";
            echo twig_escape_filter($this->env, ($context["_user_name"] ?? null), "html", null, true);
            echo "</span>
                                ";
        }
        // line 121
        echo "                            </div>
                        ";
    }

    // line 128
    public function block_sidebar($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 129
        echo "                <section class=\"sidebar\">
                    ";
        // line 130
        $this->displayBlock('main_menu_wrapper', $context, $blocks);
        // line 137
        echo "                </section>

            ";
    }

    // line 130
    public function block_main_menu_wrapper($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 131
        echo "                        ";
        echo twig_include($this->env, $context, [0 => ((        // line 132
(isset($context["_entity_config"]) || array_key_exists("_entity_config", $context))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["_entity_config"] ?? null), "templates", [], "any", false, false, false, 132), "menu", [], "any", false, false, false, 132)) : ("")), 1 => $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("design.templates.menu"), 2 => "@EasyAdmin/default/menu.html.twig"]);
        // line 135
        echo "
                    ";
    }

    // line 143
    public function block_flash_messages($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 144
        echo "                    ";
        echo twig_include($this->env, $context, (((isset($context["_entity_config"]) || array_key_exists("_entity_config", $context))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["_entity_config"] ?? null), "templates", [], "any", false, false, false, 144), "flash_messages", [], "any", false, false, false, 144)) : ("@EasyAdmin/default/flash_messages.html.twig")));
        echo "
                ";
    }

    // line 149
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 150
        echo "                    <div class=\"content\">
                        ";
        // line 151
        $this->displayBlock('content_header_wrapper', $context, $blocks);
        // line 175
        echo "
                        <section id=\"main\" class=\"content-body\">
                            ";
        // line 177
        $this->displayBlock('main', $context, $blocks);
        // line 178
        echo "                        </section>

                        ";
        // line 180
        $this->displayBlock('content_footer_wrapper', $context, $blocks);
        // line 185
        echo "                    </div>
                ";
    }

    // line 151
    public function block_content_header_wrapper($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 152
        echo "                        ";
        $context["_has_content_help"] = ((isset($context["_entity_config"]) || array_key_exists("_entity_config", $context)) && ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["_entity_config"] ?? null), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 152), "query", [], "any", false, false, false, 152), "get", [0 => "action"], "method", false, false, false, 152), [], "array", false, true, false, 152), "help", [], "array", true, true, false, 152)) ? (_twig_default_filter((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, ($context["_entity_config"] ?? null), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 152), "query", [], "any", false, false, false, 152), "get", [0 => "action"], "method", false, false, false, 152), [], "array", false, true, false, 152)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["help"] ?? null) : null), false)) : (false)));
        // line 153
        echo "                        <section class=\"content-header ";
        echo ((($context["_has_content_help"] ?? null)) ? ("has-content-help") : (""));
        echo "\">
                            ";
        // line 154
        $this->displayBlock('content_header', $context, $blocks);
        // line 173
        echo "                        </section>
                        ";
    }

    // line 154
    public function block_content_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 155
        echo "                                <div class=\"d-flex flex-row justify-content-between align-content-center w-100\">
                                    <div class=\"content-header-title\">
                                        <h1 class=\"title\">";
        // line 157
        $this->displayBlock('content_title', $context, $blocks);
        echo "</h1>
                                    </div>

                                    ";
        // line 160
        $this->displayBlock('global_actions_wrapper', $context, $blocks);
        // line 163
        echo "                                </div>

                                ";
        // line 165
        $this->displayBlock('content_help', $context, $blocks);
        // line 172
        echo "                            ";
    }

    // line 157
    public function block_content_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 160
    public function block_global_actions_wrapper($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 161
        echo "                                        <div class=\"global-actions\">";
        $this->displayBlock('global_actions', $context, $blocks);
        echo "</div>
                                    ";
    }

    public function block_global_actions($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 165
    public function block_content_help($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 166
        echo "                                    ";
        if (((isset($context["_entity_config"]) || array_key_exists("_entity_config", $context)) && ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["_entity_config"] ?? null), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 166), "query", [], "any", false, false, false, 166), "get", [0 => "action"], "method", false, false, false, 166), [], "array", false, true, false, 166), "help", [], "array", true, true, false, 166)) ? (_twig_default_filter((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = twig_get_attribute($this->env, $this->source, ($context["_entity_config"] ?? null), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 166), "query", [], "any", false, false, false, 166), "get", [0 => "action"], "method", false, false, false, 166), [], "array", false, true, false, 166)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["help"] ?? null) : null), false)) : (false)))) {
            // line 167
            echo "                                        <div class=\"content-header-help\">
                                            ";
            // line 168
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["_entity_config"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 168), "query", [], "any", false, false, false, 168), "get", [0 => "action"], "method", false, false, false, 168)] ?? null) : null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["help"] ?? null) : null), array(), twig_get_attribute($this->env, $this->source, ($context["_entity_config"] ?? null), "translation_domain", [], "any", false, false, false, 168));
            echo "
                                        </div>
                                    ";
        }
        // line 171
        echo "                                ";
    }

    // line 177
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 180
    public function block_content_footer_wrapper($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 181
        echo "                            <section class=\"content-footer\">
                                ";
        // line 182
        $this->displayBlock('content_footer', $context, $blocks);
        // line 183
        echo "                            </section>
                        ";
    }

    // line 182
    public function block_content_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 194
    public function block_body_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 196
    public function block_body_custom_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 197
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getBackendConfiguration("design.assets.js"));
        foreach ($context['_seq'] as $context["_key"] => $context["js_asset"]) {
            // line 198
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($context["js_asset"]), "html", null, true);
            echo "\"></script>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['js_asset'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 200
        echo "        ";
    }

    public function getTemplateName()
    {
        return "@EasyAdmin/default/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  710 => 200,  701 => 198,  696 => 197,  692 => 196,  686 => 194,  680 => 182,  675 => 183,  673 => 182,  670 => 181,  666 => 180,  660 => 177,  656 => 171,  650 => 168,  647 => 167,  644 => 166,  640 => 165,  628 => 161,  624 => 160,  618 => 157,  614 => 172,  612 => 165,  608 => 163,  606 => 160,  600 => 157,  596 => 155,  592 => 154,  587 => 173,  585 => 154,  580 => 153,  577 => 152,  573 => 151,  568 => 185,  566 => 180,  562 => 178,  560 => 177,  556 => 175,  554 => 151,  551 => 150,  547 => 149,  540 => 144,  536 => 143,  531 => 135,  529 => 132,  527 => 131,  523 => 130,  517 => 137,  515 => 130,  512 => 129,  508 => 128,  503 => 121,  497 => 119,  494 => 118,  491 => 117,  485 => 115,  479 => 113,  476 => 112,  473 => 111,  471 => 110,  464 => 109,  460 => 108,  456 => 104,  452 => 102,  446 => 100,  443 => 99,  435 => 97,  433 => 96,  430 => 95,  427 => 94,  423 => 93,  416 => 65,  407 => 64,  403 => 63,  398 => 123,  396 => 108,  392 => 106,  389 => 105,  387 => 93,  382 => 90,  376 => 88,  370 => 86,  368 => 85,  363 => 83,  358 => 82,  356 => 81,  353 => 80,  350 => 79,  347 => 78,  344 => 77,  341 => 76,  339 => 75,  336 => 74,  333 => 73,  330 => 72,  328 => 71,  323 => 68,  321 => 63,  313 => 57,  309 => 56,  302 => 187,  300 => 149,  295 => 146,  293 => 143,  288 => 140,  286 => 128,  281 => 125,  279 => 56,  276 => 55,  272 => 54,  267 => 191,  265 => 54,  262 => 53,  258 => 52,  247 => 44,  241 => 201,  239 => 196,  236 => 195,  234 => 194,  231 => 193,  229 => 52,  215 => 44,  211 => 43,  204 => 34,  200 => 33,  191 => 30,  188 => 29,  184 => 28,  180 => 20,  171 => 18,  166 => 17,  162 => 16,  155 => 13,  151 => 12,  144 => 10,  139 => 204,  137 => 43,  133 => 41,  128 => 39,  123 => 38,  121 => 37,  118 => 36,  116 => 33,  113 => 32,  111 => 28,  108 => 27,  102 => 24,  99 => 23,  97 => 22,  94 => 21,  92 => 16,  89 => 15,  87 => 12,  82 => 10,  69 => 2,  66 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@EasyAdmin/default/layout.html.twig", "/Users/geoffroybellemare/Documents/workspace/PhpServer/vendor/easycorp/easyadmin-bundle/src/Resources/views/default/layout.html.twig");
    }
}
