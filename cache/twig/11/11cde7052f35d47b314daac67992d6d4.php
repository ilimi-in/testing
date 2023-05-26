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

/* home/login.twig */
class __TwigTemplate_16ae24165bc92da329be5d94d7e3b80e extends Template
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
\t<head>
\t\t<meta charset=\"utf-8\"/>
\t\t<title>Slim 3</title>
\t\t<link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
\t\t<link href='";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/css/style.css' rel='stylesheet' type='text/css'>
\t</head>
\t<body>
\t\t<h1>Slim</h1>

\t\t";
        // line 11
        if (($context["flash"] ?? null)) {
            // line 12
            echo "\t\t\t<div style=\"margin:30px auto;color:red\">
\t\t\t\t";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["flash"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
                // line 14
                echo "\t\t\t\t\t<p>";
                echo twig_escape_filter($this->env, $context["f"], "html", null, true);
                echo "</p>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "\t\t\t</div>
\t\t";
        }
        // line 18
        echo "

\t\t<h2>Login</h2>

\t\t<div class=\"login\">
\t\t\t<form action=\"/member/login\" method=\"post\">
\t\t\t\t<label for=\"uname\"><b>Username</b></label>
\t\t\t\t<input type=\"text\" placeholder=\"Enter Username\" name=\"uname\" required>

\t\t\t\t<label for=\"pswd\"><b>Password</b></label>
\t\t\t\t<input type=\"password\" placeholder=\"Enter Password\" name=\"pswd\" required>

\t\t\t\t<button type=\"submit\">Login</button>
\t\t\t</form>
\t\t</div>
\t</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "home/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 18,  70 => 16,  61 => 14,  57 => 13,  54 => 12,  52 => 11,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<html>
\t<head>
\t\t<meta charset=\"utf-8\"/>
\t\t<title>Slim 3</title>
\t\t<link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
\t\t<link href='{{ base_url() }}/css/style.css' rel='stylesheet' type='text/css'>
\t</head>
\t<body>
\t\t<h1>Slim</h1>

\t\t{% if flash %}
\t\t\t<div style=\"margin:30px auto;color:red\">
\t\t\t\t{% for f in flash %}
\t\t\t\t\t<p>{{ f }}</p>
\t\t\t\t{% endfor %}
\t\t\t</div>
\t\t{% endif %}


\t\t<h2>Login</h2>

\t\t<div class=\"login\">
\t\t\t<form action=\"/member/login\" method=\"post\">
\t\t\t\t<label for=\"uname\"><b>Username</b></label>
\t\t\t\t<input type=\"text\" placeholder=\"Enter Username\" name=\"uname\" required>

\t\t\t\t<label for=\"pswd\"><b>Password</b></label>
\t\t\t\t<input type=\"password\" placeholder=\"Enter Password\" name=\"pswd\" required>

\t\t\t\t<button type=\"submit\">Login</button>
\t\t\t</form>
\t\t</div>
\t</body>
</html>
", "home/login.twig", "C:\\xampp\\htdocs\\pwc\\templates\\home\\login.twig");
    }
}
