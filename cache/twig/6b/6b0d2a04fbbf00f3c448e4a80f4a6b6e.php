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

/* Login/pwc_login.twig */
class __TwigTemplate_10ce27142385ed96175a377974e1fe53 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'scriptBlock' => [$this, 'block_scriptBlock'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "Org_1/Layout/app.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("Org_1/Layout/app.twig", "Login/pwc_login.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "
<div class=\"container-fluid mrg main-container\">
<div class=\"login-cont\">

    <div class=\"logo\" style=\"display: none;\">
            <label class=\"logoheading mr-auto\">";
        // line 8
        echo "Pathway | trans";
        echo "</label>
    </div>

    <div class=\"logo-row\"></div>
    <div class=\"hero_img\">        
        </div>        
            <div class=\"form_bg\">

                <div class=\"dropdown navbar-right\" style=\"display:none;\">
                    <a href=\"\" class=\"dropdown-toggle header-link\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">";
        // line 17
        echo twig_escape_filter($this->env, ($context["lang"] ?? null), "html", null, true);
        echo " <i class=\"la la-angle-down\" style=\"margin-left: 5px;\"></i></a>
                    <!--ul class=\"dropdown-menu language\"-->
                    <ul>
                        <li><a href=\"";
        // line 20
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "en/";
        echo twig_escape_filter($this->env, ($context["routeName"] ?? null), "html", null, true);
        echo "\">";
        echo "English";
        echo "</a></li>
                        <li><a href=\"";
        // line 21
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "pt/";
        echo twig_escape_filter($this->env, ($context["routeName"] ?? null), "html", null, true);
        echo "\">";
        echo "Portugese";
        echo "</a></li>
                    </ul>
                    <!--/ul-->
                </div>   
                
                <div class=\"lform\">
                    <form method=\"post\" action=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("ProedgeLoginSubmit", ["lang" => ($context["lang"] ?? null)]), "html", null, true);
        echo "\" id=\"login-form\">
                        ";
        // line 28
        if (twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", [], "array", true, true, false, 28)) {
            // line 29
            echo "                            <div class=\"col-sm-12 text-center\">
                                <div class=\"alert alert-danger\">
                                    ";
            // line 31
            echo twig_escape_filter($this->env, (($__internal_compile_0 = (($__internal_compile_1 = ($context["messages"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["error"] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["0"] ?? null) : null), "html", null, true);
            echo "
                                </div>
                            </div>
                        ";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 34
($context["messages"] ?? null), "success", [], "array", true, true, false, 34)) {
            // line 35
            echo "                            <div class=\"col-sm-12 text-center\">
                                <div class=\"alert alert-success\">
                                    ";
            // line 37
            echo twig_escape_filter($this->env, (($__internal_compile_2 = (($__internal_compile_3 = ($context["messages"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["success"] ?? null) : null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["0"] ?? null) : null), "html", null, true);
            echo "
                                </div>
                            </div>
                        ";
        }
        // line 41
        echo "                        <div class=\"formrow form-group\"><label class=\"control-label\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Your_Username"), "html", null, true);
        echo "</label>
                            <span class=\"user\"><img src=\"images/org_1/images/user.png\" alt=\"\"></span>
                            <input type=\"text\" name=\"username\" id=\"username\" class=\"required-entry validate-email\" autocomplete=\"off\">
                        </div>
                        <div class=\"formrow form-group mgt-20\"><label class=\"control-label\">";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Your_Password"), "html", null, true);
        echo "</label>
                            <span class=\"p_word\"><img src=\"images/org_1/images/password.png\" alt=\"\"></span>
                            <input type=\"password\" class=\"required-entry validate-password\" name=\"password\" id=\"pass\" value=\"\" autocomplete=\"off\">
                        </div>
                            <div class=\"button-section\">
                            
                            <button type=\"submit\" class=\"loginbtn\" title=\"Sign in\" name=\"send\" id=\"send2\">Log in</button>
                            </div>

                            <div class=\"text-center\">
                                <a href=\"\" class=\"reset-btn\">Reset Password</a>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    
</div>
</div>

";
    }

    // line 68
    public function block_scriptBlock($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 69
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "js/pagejs/login.js?v=";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_date_converter($this->env), "timestamp", [], "any", false, false, false, 69), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "Login/pwc_login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 69,  160 => 68,  134 => 45,  126 => 41,  119 => 37,  115 => 35,  113 => 34,  107 => 31,  103 => 29,  101 => 28,  97 => 27,  84 => 21,  76 => 20,  70 => 17,  58 => 8,  51 => 3,  47 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{%extends 'Org_1/Layout/app.twig'%} 
{% block content %}

<div class=\"container-fluid mrg main-container\">
<div class=\"login-cont\">

    <div class=\"logo\" style=\"display: none;\">
            <label class=\"logoheading mr-auto\">{{'Pathway | trans'}}</label>
    </div>

    <div class=\"logo-row\"></div>
    <div class=\"hero_img\">        
        </div>        
            <div class=\"form_bg\">

                <div class=\"dropdown navbar-right\" style=\"display:none;\">
                    <a href=\"\" class=\"dropdown-toggle header-link\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">{{lang}} <i class=\"la la-angle-down\" style=\"margin-left: 5px;\"></i></a>
                    <!--ul class=\"dropdown-menu language\"-->
                    <ul>
                        <li><a href=\"{{constant('HTTP_SERVER')}}en/{{routeName}}\">{{'English'}}</a></li>
                        <li><a href=\"{{constant('HTTP_SERVER')}}pt/{{routeName}}\">{{'Portugese'}}</a></li>
                    </ul>
                    <!--/ul-->
                </div>   
                
                <div class=\"lform\">
                    <form method=\"post\" action=\"{{path_for('ProedgeLoginSubmit', {lang: lang})}}\" id=\"login-form\">
                        {% if messages['error'] is defined %}
                            <div class=\"col-sm-12 text-center\">
                                <div class=\"alert alert-danger\">
                                    {{ messages['error']['0'] }}
                                </div>
                            </div>
                        {% elseif messages['success'] is defined %}
                            <div class=\"col-sm-12 text-center\">
                                <div class=\"alert alert-success\">
                                    {{ messages['success']['0'] }}
                                </div>
                            </div>
                        {% endif %}
                        <div class=\"formrow form-group\"><label class=\"control-label\">{{\"Your_Username\" | trans}}</label>
                            <span class=\"user\"><img src=\"images/org_1/images/user.png\" alt=\"\"></span>
                            <input type=\"text\" name=\"username\" id=\"username\" class=\"required-entry validate-email\" autocomplete=\"off\">
                        </div>
                        <div class=\"formrow form-group mgt-20\"><label class=\"control-label\">{{\"Your_Password\" | trans}}</label>
                            <span class=\"p_word\"><img src=\"images/org_1/images/password.png\" alt=\"\"></span>
                            <input type=\"password\" class=\"required-entry validate-password\" name=\"password\" id=\"pass\" value=\"\" autocomplete=\"off\">
                        </div>
                            <div class=\"button-section\">
                            
                            <button type=\"submit\" class=\"loginbtn\" title=\"Sign in\" name=\"send\" id=\"send2\">Log in</button>
                            </div>

                            <div class=\"text-center\">
                                <a href=\"\" class=\"reset-btn\">Reset Password</a>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    
</div>
</div>

{% endblock %}

{% block scriptBlock %}
    <script src=\"{{constant('HTTP_SERVER')}}js/pagejs/login.js?v={{ date().timestamp }}\"></script>
{% endblock %}", "Login/pwc_login.twig", "C:\\xampp\\htdocs\\pwc\\templates\\Login\\pwc_login.twig");
    }
}
