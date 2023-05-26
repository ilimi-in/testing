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

/* Org_1/Home/thanks_login.twig */
class __TwigTemplate_0f59b7316bfe62d68481c6faef9738cf extends Template
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
<meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Pathway</title>
\t\t<link rel=\"icon\" href=\"/images/favicon.ico\" type=\"image/x-icon\">
  <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "css/style.css\" rel=\"stylesheet\">
  <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "css/fonts.css\" rel=\"stylesheet\">
  <script src=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "js/pagejs/logout.js?v=";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_date_converter($this->env), "timestamp", [], "any", false, false, false, 9), "html", null, true);
        echo "\"></script>
</head>
  <body>
      <header class=\"header-section\">
          <nav class=\"navbar navbar-expand-lg navbar-light content-section\">
              <label class=\"mr-auto\">Pathway</label>
          </nav>
      </header>
      <section class=\"\">
        <div class=\"container-xxl\">
            <div class=\"bgimg\">
              <div class=\"sessionexpire-bar\">
                <label>You are logged out</label>
                  <p>Please log in again to continue using the system.</p>
                  <div class=\"align-right\">
                  
                      <a class=\"button-primary\" role=\"button\" aria-description=\"Please log in again to continue using the system.\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("login", ["lang" => ($context["lang"] ?? null)]), "html", null, true);
        echo "\">Log in</a>
                  </div>

              </div>
            </div>
        </div>
    </section>
  </body>
</html>";
    }

    public function getTemplateName()
    {
        return "Org_1/Home/thanks_login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 25,  53 => 9,  49 => 8,  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<html>
<head>
<meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Pathway</title>
\t\t<link rel=\"icon\" href=\"/images/favicon.ico\" type=\"image/x-icon\">
  <link href=\"{{constant('HTTP_SERVER')}}css/style.css\" rel=\"stylesheet\">
  <link href=\"{{constant('HTTP_SERVER')}}css/fonts.css\" rel=\"stylesheet\">
  <script src=\"{{constant('HTTP_SERVER')}}js/pagejs/logout.js?v={{ date().timestamp }}\"></script>
</head>
  <body>
      <header class=\"header-section\">
          <nav class=\"navbar navbar-expand-lg navbar-light content-section\">
              <label class=\"mr-auto\">Pathway</label>
          </nav>
      </header>
      <section class=\"\">
        <div class=\"container-xxl\">
            <div class=\"bgimg\">
              <div class=\"sessionexpire-bar\">
                <label>You are logged out</label>
                  <p>Please log in again to continue using the system.</p>
                  <div class=\"align-right\">
                  
                      <a class=\"button-primary\" role=\"button\" aria-description=\"Please log in again to continue using the system.\" href=\"{{path_for('login', {lang: lang})}}\">Log in</a>
                  </div>

              </div>
            </div>
        </div>
    </section>
  </body>
</html>", "Org_1/Home/thanks_login.twig", "C:\\xampp\\htdocs\\pwc\\templates\\Org_1\\Home\\thanks_login.twig");
    }
}
