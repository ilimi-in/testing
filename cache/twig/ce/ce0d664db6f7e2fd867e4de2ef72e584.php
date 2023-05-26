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

/* Org_1/Home/task_data.twig */
class __TwigTemplate_7a30eba2e3e272ca770351de3f2d0472 extends Template
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
        echo "<div class=\"pathwaytable\">
                        <table class=\"table pathwaytable\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">
                                        <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"flexCheckDefault\">
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/sorting-icon.svg\" alt=\"\"> Title
                                    </th>
                                    <th scope=\"col\"> <img class=\"sorting-btn\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/sorting-icon.svg\" alt=\"\"> Duration
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/sorting-icon.svg\" alt=\"\"> Level
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/sorting-icon.svg\" alt=\"\"> Availability
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/sorting-icon.svg\" alt=\"\"> Pathway type
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/sorting-icon.svg\" alt=\"\"> Status</th>
                                    <th scope=\"col\">Actions</th>
                                </tr>
                            </thead>\t\t\t\t\t\t\t
                            <tbody id=\"fbody\">\t\t
                            ";
        // line 23
        if ((twig_length_filter($this->env, ($context["pathwayList"] ?? null)) > 0)) {
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            // line 24
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["pathwayList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                echo "\t

                                <tr>
                                    <th scope=\"row\" class=\"move-btnrow\">
                                        <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"flexCheckDefault\">
                                        <!-- <a href=\"#\" class=\"\"> <img src=\"images/moveup-icon.svg\" alt=\"\"></a>
                                        <a href=\"#\" class=\"\"><img src=\"images/movedown-icon.svg\" alt=\"\"></a> -->
                                    </th>
                                    <td>";
                // line 32
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "title", [], "any", false, false, false, 32), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t
                                    <td>";
                // line 34
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "duration", [], "any", false, false, false, 34)), "html", null, true);
                echo "</td>
                                    <td>";
                // line 35
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, (($__internal_compile_0 = ($context["level_map"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["data"], "proficency_level", [], "any", false, false, false, 35)] ?? null) : null)), "html", null, true);
                echo "</td>
                                    <td>";
                // line 36
                echo twig_escape_filter($this->env, (($__internal_compile_1 = ($context["avl_arr"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["data"], "availability", [], "any", false, false, false, 36)] ?? null) : null), "html", null, true);
                echo "</td>
                                    
                                   ";
                // line 38
                if ((twig_get_attribute($this->env, $this->source, $context["data"], "pathway_type", [], "any", false, false, false, 38) == "completionRule")) {
                    // line 39
                    echo "                                    <td>Completion rules</td>
                                    ";
                } else {
                    // line 41
                    echo "                                    <td>";
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "pathway_type", [], "any", false, false, false, 41)), "html", null, true);
                    echo "</td>
                                    ";
                }
                // line 42
                echo " 

                                    ";
                // line 44
                if ((twig_get_attribute($this->env, $this->source, $context["data"], "is_active", [], "any", false, false, false, 44) == "1")) {
                    // line 45
                    echo "                                    <td>Active</td>
                                    ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 46
$context["data"], "is_active", [], "any", false, false, false, 46) == "2")) {
                    // line 47
                    echo "                                    <td>Inactive</td>
                                    ";
                }
                // line 48
                echo " 
                                    <!--<td><a href=\"";
                // line 49
                echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("pathwayDetails", ["id" => twig_get_attribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 49), "lang" => ($context["lang"] ?? null)]), "html", null, true);
                echo "\" class=\"table-circlebtn \"> <img src=\"images/more-icon.svg\" alt=\"\">
                                        </a></td> -->
\t\t\t\t\t\t\t\t\t <td>
                                        <div class=\"dropdown elipses-btn\">
                                            <a class=\"table-circlebtn dropdown-toggle\" href=\"#\" role=\"button\"
                                                data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                                <img src=\"";
                // line 55
                echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
                echo "images/more-icon.svg\" alt=\"\">
                                            </a>

                                            <ul class=\"dropdown-menu\">
                                                <li><a class=\"dropdown-item\" href=\"#\">Preview pathway </a></li>
                                                <li><a class=\"dropdown-item\" href=\"";
                // line 60
                echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("editDraft", ["id" => twig_get_attribute($this->env, $this->source, $context["data"], "mongo_id", [], "any", false, false, false, 60), "form_type" => "pwc-create-pathway", "lang" => ($context["lang"] ?? null)]), "html", null, true);
                echo "\">Edit details </a></li>
                                                <li><a class=\"dropdown-item\" href=\"";
                // line 61
                echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("pathwayDetails", ["id" => twig_get_attribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 61), "lang" => ($context["lang"] ?? null)]), "html", null, true);
                echo "\">Edit pathway </a></li>
                                                <li><a class=\"dropdown-item\" href=\"#\">Manage people </a></li>

                                                ";
                // line 64
                if ((twig_get_attribute($this->env, $this->source, $context["data"], "is_active", [], "any", false, false, false, 64) == "1")) {
                    // line 65
                    echo "                                                <li class=\"inactive\" id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 65), "html", null, true);
                    echo "\" data-active=\"inactive\"><a class=\"dropdown-item\" href=\"javascript:void(0)\">Make pathway inactive</a></li>
                                                ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 66
$context["data"], "is_active", [], "any", false, false, false, 66) == "2")) {
                    // line 67
                    echo "                                                <li class=\"inactive\" id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 67), "html", null, true);
                    echo "\" data-active=\"active\"><a class=\"dropdown-item\" href=\"javascript:void(0)\">Make pathway active</a></li>
                                                ";
                }
                // line 68
                echo " 

                                            </ul>
                                        </div>
                                    </td>
                                </tr> 
\t\t\t\t\t\t\t\t
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 75
            echo "\t\t\t\t\t\t
                                ";
        } else {
            // line 77
            echo "                                  <tr>
\t\t\t\t\t\t\t\t      <td colspan=\"8\"> <p>No record found.</p></td>
\t\t\t\t\t\t\t\t  </tr>
                                ";
        }
        // line 81
        echo "                            </tbody>
\t\t\t\t\t\t\t
                        </table>
\t\t\t\t\t";
        // line 84
        if ((($context["total_pages"] ?? null) > 0)) {
            // line 85
            echo "    \t\t\t\t\t\t
\t\t\t\t\t\t\t<nav aria-label=\"Page navigation example\" class=\"pagination-sec\">
\t\t\t\t\t\t\t  <ul class=\"pagination\">
\t\t\t\t\t\t\t  ";
            // line 88
            if ((($context["left_arrow"] ?? null) == "yes")) {
                // line 89
                echo "\t\t\t\t\t\t\t\t<li class=\"page-item\">
\t\t\t\t\t\t\t\t  <a class=\"page-link\"  aria-label=\"Previous\" onclick=\"loadPagingData(";
                // line 90
                echo twig_escape_filter($this->env, ($context["prev_page"] ?? null), "html", null, true);
                echo ", 'yes')\" style=\"cursor:pointer;\">
\t\t\t\t\t\t\t\t\t<i class=\"paginationarrow-left\"></i>
\t\t\t\t\t\t\t\t  </a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 95
            echo "\t\t\t\t\t\t\t\t";
            echo ($context["li_html"] ?? null);
            echo "
\t\t\t\t\t\t\t\t";
            // line 96
            if ((($context["right_arrow"] ?? null) == "yes")) {
                // line 97
                echo "\t\t\t\t\t\t\t\t<li class=\"page-item\">
\t\t\t\t\t\t\t\t  <a class=\"page-link\"  aria-label=\"Next\" onclick=\"loadPagingData(";
                // line 98
                echo twig_escape_filter($this->env, ($context["next_page"] ?? null), "html", null, true);
                echo ", 'yes')\" style=\"cursor:pointer;\">
\t\t\t\t\t\t\t\t\t<i class=\"paginationarrow-right\"></i>
\t\t\t\t\t\t\t\t  </a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 103
            echo "\t\t\t\t\t\t\t  </ul>
\t\t\t\t\t\t\t</nav>

\t\t\t\t\t";
        }
        // line 107
        echo "



                        
</div>";
    }

    public function getTemplateName()
    {
        return "Org_1/Home/task_data.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  258 => 107,  252 => 103,  244 => 98,  241 => 97,  239 => 96,  234 => 95,  226 => 90,  223 => 89,  221 => 88,  216 => 85,  214 => 84,  209 => 81,  203 => 77,  199 => 75,  186 => 68,  180 => 67,  178 => 66,  173 => 65,  171 => 64,  165 => 61,  161 => 60,  153 => 55,  144 => 49,  141 => 48,  137 => 47,  135 => 46,  132 => 45,  130 => 44,  126 => 42,  120 => 41,  116 => 39,  114 => 38,  109 => 36,  105 => 35,  101 => 34,  96 => 32,  83 => 24,  79 => 23,  71 => 18,  66 => 16,  61 => 14,  56 => 12,  51 => 10,  46 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"pathwaytable\">
                        <table class=\"table pathwaytable\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">
                                        <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"flexCheckDefault\">
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"{{constant('HTTP_SERVER')}}images/sorting-icon.svg\" alt=\"\"> Title
                                    </th>
                                    <th scope=\"col\"> <img class=\"sorting-btn\" src=\"{{constant('HTTP_SERVER')}}images/sorting-icon.svg\" alt=\"\"> Duration
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"{{constant('HTTP_SERVER')}}images/sorting-icon.svg\" alt=\"\"> Level
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"{{constant('HTTP_SERVER')}}images/sorting-icon.svg\" alt=\"\"> Availability
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"{{constant('HTTP_SERVER')}}images/sorting-icon.svg\" alt=\"\"> Pathway type
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"{{constant('HTTP_SERVER')}}images/sorting-icon.svg\" alt=\"\"> Status</th>
                                    <th scope=\"col\">Actions</th>
                                </tr>
                            </thead>\t\t\t\t\t\t\t
                            <tbody id=\"fbody\">\t\t
                            {% if pathwayList|length > 0 %}\t\t\t\t\t\t\t
\t\t\t\t\t\t\t{% for data in pathwayList %}\t

                                <tr>
                                    <th scope=\"row\" class=\"move-btnrow\">
                                        <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"flexCheckDefault\">
                                        <!-- <a href=\"#\" class=\"\"> <img src=\"images/moveup-icon.svg\" alt=\"\"></a>
                                        <a href=\"#\" class=\"\"><img src=\"images/movedown-icon.svg\" alt=\"\"></a> -->
                                    </th>
                                    <td>{{data.title}}</td>
\t\t\t\t\t\t\t\t\t
                                    <td>{{data.duration |capitalize}}</td>
                                    <td>{{level_map[data.proficency_level] |capitalize}}</td>
                                    <td>{{avl_arr[data.availability]}}</td>
                                    
                                   {% if(data.pathway_type == 'completionRule') %}
                                    <td>Completion rules</td>
                                    {% else %}
                                    <td>{{data.pathway_type |capitalize }}</td>
                                    {%endif%} 

                                    {% if(data.is_active == '1') %}
                                    <td>Active</td>
                                    {% elseif(data.is_active == '2') %}
                                    <td>Inactive</td>
                                    {%endif%} 
                                    <!--<td><a href=\"{{path_for('pathwayDetails',{id: data.id, lang: lang})}}\" class=\"table-circlebtn \"> <img src=\"images/more-icon.svg\" alt=\"\">
                                        </a></td> -->
\t\t\t\t\t\t\t\t\t <td>
                                        <div class=\"dropdown elipses-btn\">
                                            <a class=\"table-circlebtn dropdown-toggle\" href=\"#\" role=\"button\"
                                                data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                                <img src=\"{{constant('HTTP_SERVER')}}images/more-icon.svg\" alt=\"\">
                                            </a>

                                            <ul class=\"dropdown-menu\">
                                                <li><a class=\"dropdown-item\" href=\"#\">Preview pathway </a></li>
                                                <li><a class=\"dropdown-item\" href=\"{{path_for('editDraft',{id: data.mongo_id,form_type: \"pwc-create-pathway\", lang: lang})}}\">Edit details </a></li>
                                                <li><a class=\"dropdown-item\" href=\"{{path_for('pathwayDetails',{id: data.id, lang: lang})}}\">Edit pathway </a></li>
                                                <li><a class=\"dropdown-item\" href=\"#\">Manage people </a></li>

                                                {% if(data.is_active == '1') %}
                                                <li class=\"inactive\" id=\"{{data.id}}\" data-active=\"inactive\"><a class=\"dropdown-item\" href=\"javascript:void(0)\">Make pathway inactive</a></li>
                                                {% elseif(data.is_active == '2') %}
                                                <li class=\"inactive\" id=\"{{data.id}}\" data-active=\"active\"><a class=\"dropdown-item\" href=\"javascript:void(0)\">Make pathway active</a></li>
                                                {%endif%} 

                                            </ul>
                                        </div>
                                    </td>
                                </tr> 
\t\t\t\t\t\t\t\t
                            {% endfor %}\t\t\t\t\t\t
                                {% else %}
                                  <tr>
\t\t\t\t\t\t\t\t      <td colspan=\"8\"> <p>No record found.</p></td>
\t\t\t\t\t\t\t\t  </tr>
                                {% endif %}
                            </tbody>
\t\t\t\t\t\t\t
                        </table>
\t\t\t\t\t{% if total_pages > 0 %}
    \t\t\t\t\t\t
\t\t\t\t\t\t\t<nav aria-label=\"Page navigation example\" class=\"pagination-sec\">
\t\t\t\t\t\t\t  <ul class=\"pagination\">
\t\t\t\t\t\t\t  {% if left_arrow=='yes' %}
\t\t\t\t\t\t\t\t<li class=\"page-item\">
\t\t\t\t\t\t\t\t  <a class=\"page-link\"  aria-label=\"Previous\" onclick=\"loadPagingData({{prev_page}}, 'yes')\" style=\"cursor:pointer;\">
\t\t\t\t\t\t\t\t\t<i class=\"paginationarrow-left\"></i>
\t\t\t\t\t\t\t\t  </a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t{{li_html|raw}}
\t\t\t\t\t\t\t\t{% if right_arrow == 'yes' %}
\t\t\t\t\t\t\t\t<li class=\"page-item\">
\t\t\t\t\t\t\t\t  <a class=\"page-link\"  aria-label=\"Next\" onclick=\"loadPagingData({{next_page}}, 'yes')\" style=\"cursor:pointer;\">
\t\t\t\t\t\t\t\t\t<i class=\"paginationarrow-right\"></i>
\t\t\t\t\t\t\t\t  </a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t  </ul>
\t\t\t\t\t\t\t</nav>

\t\t\t\t\t{% endif %}




                        
</div>", "Org_1/Home/task_data.twig", "C:\\xampp\\htdocs\\pwc\\templates\\Org_1\\Home\\task_data.twig");
    }
}
