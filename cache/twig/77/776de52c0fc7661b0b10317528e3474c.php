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

/* error/404.twig */
class __TwigTemplate_ff1cd6ac1eb58193f3e582976fc67a56 extends Template
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
        echo "<html>
<head>
    <meta charset=\"utf-8\"/>
    <title>Slim 3</title>
    <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <link href='";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/css/style.css' rel='stylesheet' type='text/css'>
</head>
<body>
\t<h1>Slim</h1>
\t<h2>404</h2>
\tPage not found
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "error/404.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<html>
<head>
    <meta charset=\"utf-8\"/>
    <title>Slim 3</title>
    <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <link href='{{ base_url() }}/css/style.css' rel='stylesheet' type='text/css'>
</head>
<body>
\t<h1>Slim</h1>
\t<h2>404</h2>
\tPage not found
</body>
</html>
", "error/404.twig", "C:\\xampp\\htdocs\\pwc\\templates\\error\\404.twig");
    }
}
