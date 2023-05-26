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

/* Org_1/Layout/app.twig */
class __TwigTemplate_396d204db54a9c8ea3b90960c252aa0c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'scriptBlock' => [$this, 'block_scriptBlock'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Pathway</title>
\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/favicon.ico\">
        <link rel='stylesheet' href=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "css/bootstrap4.5.min.css\">
        <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "css/login_style.css?v=";
        echo twig_escape_filter($this->env, twig_constant("PROEDGE_CSS_VERSION"), "html", null, true);
        echo "\">

    </head>
    <body class=\"login-page login-section\">
        ";
        // line 13
        $this->displayBlock('content', $context, $blocks);
        // line 14
        echo "        
        ";
        // line 15
        $this->displayBlock('scriptBlock', $context, $blocks);
        // line 16
        echo "    </body>
</html>
";
    }

    // line 13
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 15
    public function block_scriptBlock($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "Org_1/Layout/app.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 15,  76 => 13,  70 => 16,  68 => 15,  65 => 14,  63 => 13,  54 => 9,  50 => 8,  46 => 7,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!DOCTYPE html>#}
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Pathway</title>
\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"{{constant('HTTP_SERVER')}}images/favicon.ico\">
        <link rel='stylesheet' href=\"{{constant('HTTP_SERVER')}}css/bootstrap4.5.min.css\">
        <link rel=\"stylesheet\" href=\"{{constant('HTTP_SERVER')}}css/login_style.css?v={{constant('PROEDGE_CSS_VERSION')}}\">

    </head>
    <body class=\"login-page login-section\">
        {% block content %}{% endblock %}
        
        {% block scriptBlock %}{% endblock %}
    </body>
</html>
", "Org_1/Layout/app.twig", "C:\\xampp\\htdocs\\pwc\\templates\\Org_1\\Layout\\app.twig");
    }
}
