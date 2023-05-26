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

/* Org_1/Layout/app_home.twig */
class __TwigTemplate_94262d3896722dacf9f9ab938691e655 extends Template
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
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Pathway</title>
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/favicon.ico\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\"
        integrity=\"sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65\" crossorigin=\"anonymous\">

    
    
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js\"></script>

    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css\">
    <link rel='stylesheet' href=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "css/formio.full.min.css\">


    <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "css/fonts.css\" rel=\"stylesheet\">
    <link href=\"";
        // line 22
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "css/style.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "ckeditor5/styles.css\">

    <script type='text/javascript' src=\"";
        // line 25
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "js/formio.full.min.js\"></script>
    <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "ckeditor5/ckeditor.js\"></script>
    
</head>

<body>

    <nav class=\"navbar navbar-expand-lg  navbar-bg\">
        <div class=\"headersection\">
            <a class=\"navbar-brand\"><img class=\"logoimg\" src=\"";
        // line 34
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "/images/logo-img.jpg\" alt=\"logo-image\"></a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\"
                aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
                <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
                    <li class=\"nav-item\"> Pathway </li>
                </ul>

                <ul class=\"navbar-nav\">

                    <li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\"
                            aria-expanded=\"false\">
                            ";
        // line 49
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["lang"] ?? null)), "html", null, true);
        echo "
                        </a>
                        <ul class=\"dropdown-menu\">

                            <li><a class=\"dropdown-item\" href=\"";
        // line 53
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "en/";
        echo twig_escape_filter($this->env, ($context["routeName"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("English"), "html", null, true);
        echo "</a></li>
                            <li><a class=\"dropdown-item\" href=\"";
        // line 54
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "pt/";
        echo twig_escape_filter($this->env, ($context["routeName"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Portugese"), "html", null, true);
        echo "</a></li>
                        </ul>
                    </li>
                    <li class=\"nav-item pd10\">
                        <span class=\"\">";
        // line 58
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Hi"), "html", null, true);
        echo "</span> <span class=\"\">";
        echo twig_escape_filter($this->env, (($__internal_compile_0 = (($__internal_compile_1 = ($context["session"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["user"] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["first_name"] ?? null) : null), "html", null, true);
        echo "</span>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"";
        // line 61
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo twig_escape_filter($this->env, ($context["lang"] ?? null), "html", null, true);
        echo "/logout\"><img src=\"";
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/logout-pwc.svg\" alt=\"\"> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id=\"main1\" role=\"main\">
    ";
        // line 69
        $this->displayBlock('content', $context, $blocks);
        // line 70
        echo "    </div>

    <span id=\"getConstant\" HTTP_SERVER=\"";
        // line 72
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "\">
    
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\"
        integrity=\"sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4\"
        crossorigin=\"anonymous\"></script>
    <script src=\"";
        // line 77
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "js/pagejs/app_home.js\"></script>
    <script>
        
        function getFormData(d) {\t\t\t
            \$.ajax({
                url: '";
        // line 82
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("getFormData"), "html", null, true);
        echo "',
                type: 'POST',
                data: d,
                success: function success(response) {
                    var data = response.data;
                    data = JSON.stringify(data);
                    data = data.replace(/\"true\"/g, true);
                    data = data.replace(/\"false\"/g, false);
                    data = JSON.parse(data);
                    if (d.id !== undefined && d.id !== null && d.id != '') {
                        loadForm(data, d.id);
                    } else {
                        loadForm(data, '";
        // line 94
        echo twig_escape_filter($this->env, ($context["form_id"] ?? null), "html", null, true);
        echo "');
                    }
                },
                error: function (err) {
                    if (err.status == 401) {
                        location.reload();
                    } else {
                        console.log('it failed!');
                    }
                }
            })
        }
    </script>
    ";
        // line 107
        $this->displayBlock('scriptBlock', $context, $blocks);
        // line 108
        echo "</body>

</html>";
    }

    // line 69
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 107
    public function block_scriptBlock($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "Org_1/Layout/app_home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  228 => 107,  222 => 69,  216 => 108,  214 => 107,  198 => 94,  183 => 82,  175 => 77,  167 => 72,  163 => 70,  161 => 69,  147 => 61,  139 => 58,  128 => 54,  120 => 53,  113 => 49,  95 => 34,  84 => 26,  80 => 25,  75 => 23,  71 => 22,  67 => 21,  61 => 18,  48 => 8,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Pathway</title>
    <link rel=\"icon\" type=\"image/x-icon\" href=\"{{constant('HTTP_SERVER')}}images/favicon.ico\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\"
        integrity=\"sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65\" crossorigin=\"anonymous\">

    
    
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js\"></script>

    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css\">
    <link rel='stylesheet' href=\"{{constant('HTTP_SERVER')}}css/formio.full.min.css\">


    <link href=\"{{constant('HTTP_SERVER')}}css/fonts.css\" rel=\"stylesheet\">
    <link href=\"{{constant('HTTP_SERVER')}}css/style.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"{{constant('HTTP_SERVER')}}ckeditor5/styles.css\">

    <script type='text/javascript' src=\"{{constant('HTTP_SERVER')}}js/formio.full.min.js\"></script>
    <script src=\"{{constant('HTTP_SERVER')}}ckeditor5/ckeditor.js\"></script>
    
</head>

<body>

    <nav class=\"navbar navbar-expand-lg  navbar-bg\">
        <div class=\"headersection\">
            <a class=\"navbar-brand\"><img class=\"logoimg\" src=\"{{constant('HTTP_SERVER')}}/images/logo-img.jpg\" alt=\"logo-image\"></a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\"
                aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
                <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
                    <li class=\"nav-item\"> Pathway </li>
                </ul>

                <ul class=\"navbar-nav\">

                    <li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\"
                            aria-expanded=\"false\">
                            {{lang | trans}}
                        </a>
                        <ul class=\"dropdown-menu\">

                            <li><a class=\"dropdown-item\" href=\"{{constant('HTTP_SERVER')}}en/{{routeName}}\">{{'English' | trans}}</a></li>
                            <li><a class=\"dropdown-item\" href=\"{{constant('HTTP_SERVER')}}pt/{{routeName}}\">{{'Portugese' | trans}}</a></li>
                        </ul>
                    </li>
                    <li class=\"nav-item pd10\">
                        <span class=\"\">{{'Hi' | trans}}</span> <span class=\"\">{{session['user']['first_name']}}</span>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"{{constant('HTTP_SERVER')}}{{lang}}/logout\"><img src=\"{{constant('HTTP_SERVER')}}images/logout-pwc.svg\" alt=\"\"> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id=\"main1\" role=\"main\">
    {% block content %}{% endblock%}
    </div>

    <span id=\"getConstant\" HTTP_SERVER=\"{{constant('HTTP_SERVER')}}\">
    
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\"
        integrity=\"sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4\"
        crossorigin=\"anonymous\"></script>
    <script src=\"{{constant('HTTP_SERVER')}}js/pagejs/app_home.js\"></script>
    <script>
        
        function getFormData(d) {\t\t\t
            \$.ajax({
                url: '{{path_for(\"getFormData\")}}',
                type: 'POST',
                data: d,
                success: function success(response) {
                    var data = response.data;
                    data = JSON.stringify(data);
                    data = data.replace(/\"true\"/g, true);
                    data = data.replace(/\"false\"/g, false);
                    data = JSON.parse(data);
                    if (d.id !== undefined && d.id !== null && d.id != '') {
                        loadForm(data, d.id);
                    } else {
                        loadForm(data, '{{form_id}}');
                    }
                },
                error: function (err) {
                    if (err.status == 401) {
                        location.reload();
                    } else {
                        console.log('it failed!');
                    }
                }
            })
        }
    </script>
    {% block scriptBlock %}{% endblock %}
</body>

</html>", "Org_1/Layout/app_home.twig", "C:\\xampp\\htdocs\\pwc\\templates\\Org_1\\Layout\\app_home.twig");
    }
}
