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

/* Org_1/Home/task_list.twig */
class __TwigTemplate_611657bc4a8d622af2534f4e9a674dfd extends Template
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
        return "Org_1/Layout/app_home.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("Org_1/Layout/app_home.twig", "Org_1/Home/task_list.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "
<style type=\"text/css\">
    .modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  text-align: center;
}

/* Button styles */
#myBtn {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 5px;
}

#confirmBtn, #cancelBtn {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 5px;
  margin: 10px;
}

#cancelBtn {
  background-color: #f44336;
}

/* Button hover styles */
#myBtn:hover, #confirmBtn:hover, #cancelBtn:hover {
  cursor: pointer;
  opacity: 0.8;
}
</style>
  <section class=\"\">
        <div class=\"pathwaytable-section\">

            <div >

                <div class=\"d-flex justify-content-between custom-ul pathwayheader\">

                    <ul class=\"mb-0\">
                        <li>
                            <h1 class=\"serifb-text\">Pathway</h1>
                        </li>
                    </ul>

                </div>


                <ul class=\"nav nav-tabs customtab\" id=\"myTab\" role=\"tablist\">
                    <li class=\"nav-item\" role=\"presentation\">
                        <a class=\"nav-link active\" id=\"home-tab\" data-bs-toggle=\"tab\"
                            href=\"#home-tab-pane\" type=\"button\" role=\"tab\" aria-controls=\"home-tab-pane\"
                            aria-selected=\"true\" onclick=\"loadFilter()\">Draft</a>
                    </li>
                    <li class=\"nav-item\" role=\"presentation\">
                        <a class=\"nav-link\" id=\"profile-tab\" data-bs-toggle=\"tab\"
                            href=\"#home-tab-pane\" type=\"button\" role=\"tab\" aria-controls=\"home-tab-pane\"
                            aria-selected=\"false\" onclick=\"loadFilter()\">Published</a>
                    </li>
                </ul>
                <div class=\"tab-content\" id=\"myTabContent\">
                    <div class=\"tab-pane fade show active\" id=\"home-tab-pane\" role=\"tabpanel\" aria-labelledby=\"home-tab\"
                        tabindex=\"0\">


                        <div class=\"d-flex justify-content-between custom-ul pathwaysubhead\">

                            <ul class=\"mb-0\">
                                <li>
                                </li>
                            </ul>
                            <ul class=\"mb-0\">
                                <li><a href=\"\" class=\"secondarybtn mgr-20\">Download</a></li>
                                <li>
                                    <a href=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("newFormRender", ["lang" => ($context["lang"] ?? null), "formName" => "pwc-create-pathway
"]), "html", null, true);
        // line 97
        echo "
\" class=\"primarybtn\"> Add Pathway </a>
                                </li>
                                
                            </ul>
                        </div>


                        <div class=\"custom-ul filtersection\">

                            <ul class=\"mb-0 searchsection\">
                                <li class=\"pathwaysearch-row position-relative\">
                                    <input type=\"text\" class=\"form-control\" id=\"filterTextBox\"
                                        aria-describedby=\"search\" placeholder=\"Search pathway\">
                                    <img class=\"pathwaysearchinput-icon\" src=\"";
        // line 111
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/search-icon.svg\" alt=\"\">
                                </li>
                                <li>

                                </li>
                            </ul>
                            <ul class=\"mb-0 dropdown-row mt-32\">

                                <li>
                                <label class=\"filter-bar\">Filter</label>
                                </li>

                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Duration
                                        </button>
                                        <ul class=\"dropdown-menu\">
                                            <li><a class=\"dropdown-item\" href=\"#\">Action</a></li>
                                            <li><a class=\"dropdown-item\" href=\"#\">Another action</a></li>
                                            <li><a class=\"dropdown-item\" href=\"#\">Something else here</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle level\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Level
                                        </button>\t\t\t\t\t\t\t\t\t\t
                                        <ul class=\"dropdown-menu\" id=\"level_sel_id\">\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
        // line 143
        if ((twig_length_filter($this->env, ($context["level"] ?? null)) > 0)) {
            $context["nos"] = 1;
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t             \t";
            // line 144
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["level"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 145
                echo "\t\t\t\t\t\t\t\t\t\t<li class=\"dropdown-item\">
                                                <div class=\"form-check\">
                                                    <input type=\"checkbox\" class=\"form-check-input\" id=\"check_child_";
                // line 147
                echo twig_escape_filter($this->env, ($context["nos"] ?? null), "html", null, true);
                echo "\">
                                                    <label class=\"form-check-label\" for=\"check_child_";
                // line 148
                echo twig_escape_filter($this->env, ($context["nos"] ?? null), "html", null, true);
                echo "\" id=\"level_child_";
                echo twig_escape_filter($this->env, ($context["nos"] ?? null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "value_of_data", [], "any", false, false, false, 148), "html", null, true);
                echo "</label>
                                                </div>
                                            </li> ";
                // line 150
                $context["nos"] = (($context["nos"] ?? null) + 1);
                // line 151
                echo "\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            echo "\t\t\t\t\t\t\t\t\t\t<li><button type=\"button\" class=\"cancelbtn d-inline\" id=\"cancelbtn\">Cancel</button>
                                        <button type=\"submit\" class=\"publishbtn d-inline\" id=\"submit\" onclick=\"addSelection()\">Apply</button></li>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 155
        echo "\t\t\t\t\t\t\t\t\t\t
                                        </ul>\t\t\t\t\t\t\t\t\t\t
                                    </div>
                                </li>
                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Availability
                                        </button>
                                        <ul class=\"dropdown-menu\" id=\"avail_menu\">

                                        <li class=\"dropdown-item pos-r\">
                                        <input type=\"text\" class=\"form-control-search\" placeholder=\"Search\">

                                        <i class=\"filter-searchicon\"></i>
                                        </li>

<li class=\"dropdown-item\">
<div class=\"form-check\">
                                                    <input type=\"checkbox\" class=\"form-check-input\" id=\"avl_";
        // line 175
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "value_of_data", [], "any", false, false, false, 175), "html", null, true);
        echo "\">
                                                    <label class=\"form-check-label\" for=\"avl_";
        // line 176
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "value_of_data", [], "any", false, false, false, 176), "html", null, true);
        echo "\" id=\"level_avl_";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "value_of_data", [], "any", false, false, false, 176), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "value_of_data", [], "any", false, false, false, 176), "html", null, true);
        echo "</label>
                                                </div>
</li>

\t\t\t\t\t\t\t\t\t\t";
        // line 180
        if ((twig_length_filter($this->env, ($context["availability"] ?? null)) > 0)) {
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t             \t";
            // line 181
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["availability"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 182
                echo "                                             
\t\t\t\t\t\t\t\t\t\t\t <li class=\"dropdown-item bdr-row\">
                                                <div class=\"form-check\">
                                                    <input type=\"checkbox\" class=\"form-check-input\" id=\"avl_";
                // line 185
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "value_of_data", [], "any", false, false, false, 185), "html", null, true);
                echo "\">
                                                    <label class=\"form-check-label\" for=\"avl_";
                // line 186
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "value_of_data", [], "any", false, false, false, 186), "html", null, true);
                echo "\" id=\"level_avl_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "value_of_data", [], "any", false, false, false, 186), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "value_of_data", [], "any", false, false, false, 186), "html", null, true);
                echo "</label>
                                                </div>
                                            </li>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 190
            echo "\t\t\t\t\t\t\t\t\t\t<li class=\"filter-btnrow\">
                                        <button type=\"button\" class=\"cancelbtn d-inline\"  style=\"cursor:pointer\" onclick=\"\">Cancel</button>
\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"publishbtn d-inline\"  onclick=\"addSelection()\">Apply</button></li>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 194
        echo "                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class=\"dropdown\" id=\"pathway_type_menu\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Pathway type
                                        </button>
                                        <ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t\t";
        // line 204
        if ((twig_length_filter($this->env, ($context["pathway_type"] ?? null)) > 0)) {
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t             \t";
            // line 205
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["pathway_type"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                echo "                                            
\t\t\t\t\t\t\t\t\t\t\t<li class=\"dropdown-item\">
                                                <div class=\"form-check\">
                                                    <input type=\"checkbox\" class=\"form-check-input\" id=\"ptype_";
                // line 208
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "value_of_data", [], "any", false, false, false, 208), "html", null, true);
                echo "\">
                                                    <label class=\"form-check-label\" for=\"avl_";
                // line 209
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "value_of_data", [], "any", false, false, false, 209), "html", null, true);
                echo "\" id=\"level_ptype_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "value_of_data", [], "any", false, false, false, 209), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "value_of_data", [], "any", false, false, false, 209), "html", null, true);
                echo "</label>
                                                </div>
                                            </li>
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 213
            echo "\t\t\t\t\t\t\t\t\t\t<li><button type=\"button\" class=\"cancelbtn d-inline\"  style=\"cursor:pointer\" onclick=\"\">Cancel</button>
\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"publishbtn d-inline\"  onclick=\"addSelection()\">Apply</button></li>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 216
        echo "                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Status
                                        </button>
                                        <ul class=\"dropdown-menu\" id=\"status_menu\">
\t\t\t\t\t\t\t\t\t\t<li class=\"dropdown-item\">
                                                <div class=\"form-check\">
                                                    <input type=\"checkbox\" class=\"form-check-input\" id=\"check_active\">
                                                    <label class=\"form-check-label\" for=\"check_active\" id=\"level_active\">Active</label>
                                                </div>
                                            </li>
\t\t\t\t\t\t\t\t\t\t\t<li class=\"dropdown-item\">
                                                <div class=\"form-check\">
                                                    <input type=\"checkbox\" class=\"form-check-input\" id=\"check_inactive\">
                                                    <label class=\"form-check-label\" for=\"check_inactive\" id=\"level_inactive\">Inactive</label>
                                                </div>
                                            </li>
                                            <li><button type=\"button\" class=\"cancelbtn d-inline\"  style=\"cursor:pointer\" onclick=\"\">Cancel</button>
\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"publishbtn d-inline\"  onclick=\"addSelection()\">Apply</button></li>                                                                                         
                                        </ul>
                                    </div>
                                </li>
                            </ul>
\t\t\t\t\t\t\t<ul class=\"mb-0 mt-32\" id=\"fSelSection\" style=\"display:none\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<label class=\"filter-bar\">Selected</label>
                                </li> 
                            </ul>
\t\t\t\t\t\t
                        </div>

\t\t\t\t\t\t<!-- ############### -->
\t\t\t\t\t\t<div class=\"task-list-data\">
\t\t\t\t\t\t   <div class=\"spinner-border\" role=\"status\" style=\"margin:50px 0px 0px 50%\">
\t\t\t\t\t\t\t  <span class=\"visually-hidden\">Loading...</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- ################ -->

                    </div>
                    <div class=\"tab-pane fade\" id=\"profile-tab-pane\" role=\"tabpanel\" aria-labelledby=\"profile-tab\"
                        tabindex=\"0\">
                       <!-- <div class=\"d-flex justify-content-between custom-ul pathwaysubhead\">

                            <ul class=\"mb-0\">
                                <li>
                                </li>
                            </ul>
                            <ul class=\"mb-0\">
                                <li><a href=\"\" class=\"secondarybtn mgr-20\">Download</a></li>
                                <li>
                                    <a href=\"";
        // line 273
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("newFormRender", ["lang" => ($context["lang"] ?? null), "formName" => "pwc-create-pathway
"]), "html", null, true);
        // line 274
        echo "
\" class=\"primarybtn\"> Add Pathway </a>
                                </li>
                                
                            </ul>
                        </div>

\t\t\t\t\t <!--
                        <div class=\"custom-ul filtersection\">

                            <ul class=\"mb-0 searchsection\">
                                <li class=\"pathwaysearch-row position-relative\">
                                    <input type=\"text\" class=\"form-control\" id=\"exampleInputsearch2\"
                                        aria-describedby=\"search\" placeholder=\"Search pathway\">
                                    <img class=\"pathwaysearchinput-icon\" src=\"";
        // line 288
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/search-icon.svg\" alt=\"\">
                                </li>
                                <li>

                                </li>
                            </ul>
                            <ul class=\"mb-0 dropdown-row mt-32\">

                                <li>
                                <label class=\"filter-bar\">Filter</label>
                                </li>

                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Duration
                                        </button>
                                        <ul class=\"dropdown-menu\">
                                            <li><a class=\"dropdown-item\" href=\"#\">Action</a></li>
                                            <li><a class=\"dropdown-item\" href=\"#\">Another action</a></li>
                                            <li><a class=\"dropdown-item\" href=\"#\">Something else here</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Level
                                        </button>
                                        <ul class=\"dropdown-menu\">                                      
                                        ";
        // line 320
        if ((twig_length_filter($this->env, ($context["level"] ?? null)) > 0)) {
            echo "                           
                                        ";
            // line 321
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["level"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 322
                echo "                                            <li><a class=\"dropdown-item\" href=\"#\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "value_of_data", [], "any", false, false, false, 322), "html", null, true);
                echo "</a></li>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 324
            echo "                                        ";
        }
        // line 325
        echo "                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Availability
                                        </button>
                                        <ul class=\"dropdown-menu\">
                                        ";
        // line 335
        if ((twig_length_filter($this->env, ($context["availability"] ?? null)) > 0)) {
            echo "                            
                                        ";
            // line 336
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["availability"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 337
                echo "                                             <li><a class=\"dropdown-item\" href=\"#\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "value_of_data", [], "any", false, false, false, 337), "html", null, true);
                echo "</a></li>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 339
            echo "                                        ";
        }
        // line 340
        echo "                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Pathway type
                                        </button>
                                        <ul class=\"dropdown-menu\">
                                        ";
        // line 350
        if ((twig_length_filter($this->env, ($context["pathway_type"] ?? null)) > 0)) {
            echo "                            
                                        ";
            // line 351
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["pathway_type"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 352
                echo "                                            <li><a class=\"dropdown-item\" href=\"#\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "value_of_data", [], "any", false, false, false, 352), "html", null, true);
                echo "</a></li>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 354
            echo "                                        ";
        }
        // line 355
        echo "                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Status
                                        </button>
                                        <ul class=\"dropdown-menu\">
                                            <li><a class=\"dropdown-item\" href=\"#\">Action</a></li>
                                            <li><a class=\"dropdown-item\" href=\"#\">Another action</a></li>
                                            <li><a class=\"dropdown-item\" href=\"#\">Something else here</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div> -->

<div class=\"pathwaytable\">
                        <table class=\"table pathwaytable\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">
                                        <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"flexCheckDefault\">
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"";
        // line 382
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/sorting-icon.svg\" alt=\"\"> Title
                                    </th>
                                    <th scope=\"col\"> <img class=\"sorting-btn\" src=\"";
        // line 384
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/sorting-icon.svg\" alt=\"\"> Duration
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"";
        // line 386
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/sorting-icon.svg\" alt=\"\"> Level
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"";
        // line 388
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/sorting-icon.svg\" alt=\"\"> Availability
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"";
        // line 390
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/sorting-icon.svg\" alt=\"\"> Pathway type
                                    </th>
                                    <th scope=\"col\"><img class=\"sorting-btn\" src=\"";
        // line 392
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo "images/sorting-icon.svg\" alt=\"\"> Status</th>
                                    <th scope=\"col\">Actions</th>
                                </tr>
                            </thead>                            
                            <tbody id=\"fbody1\">     
                            ";
        // line 397
        if ((twig_length_filter($this->env, ($context["pathwayListPub"] ?? null)) > 0)) {
            echo "                         
                            ";
            // line 398
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["pathwayListPub"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                echo "   

                                <tr>
                                    <th scope=\"row\" class=\"move-btnrow\">
                                        <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"flexCheckDefault\">
                                        <!-- <a href=\"#\" class=\"\"> <img src=\"images/moveup-icon.svg\" alt=\"\"></a>
                                        <a href=\"#\" class=\"\"><img src=\"images/movedown-icon.svg\" alt=\"\"></a> -->
                                    </th>
                                    <td>";
                // line 406
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "title", [], "any", false, false, false, 406), "html", null, true);
                echo "</td>
                                    
                                    <td>";
                // line 408
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "duration", [], "any", false, false, false, 408)), "html", null, true);
                echo "</td>
                                    <td>";
                // line 409
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "proficency_level", [], "any", false, false, false, 409)), "html", null, true);
                echo "</td>
                                    <td>";
                // line 410
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "availability", [], "any", false, false, false, 410), "html", null, true);
                echo "</td>
                                    ";
                // line 411
                if ((twig_get_attribute($this->env, $this->source, $context["data"], "pathway_type", [], "any", false, false, false, 411) == "completionRule")) {
                    // line 412
                    echo "                                    <td>Completion rules</td>
                                    ";
                } else {
                    // line 414
                    echo "                                    <td>";
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "pathway_type", [], "any", false, false, false, 414)), "html", null, true);
                    echo "</td>
                                    ";
                }
                // line 415
                echo " 


                                    ";
                // line 418
                if ((twig_get_attribute($this->env, $this->source, $context["data"], "is_active", [], "any", false, false, false, 418) == "1")) {
                    // line 419
                    echo "                                    <td>Active</td>
                                    ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 420
$context["data"], "is_active", [], "any", false, false, false, 420) == "2")) {
                    // line 421
                    echo "                                    <td>Inactive</td>
                                    ";
                }
                // line 422
                echo " 
                                    <!--<td><a href=\"";
                // line 423
                echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("pathwayDetails", ["id" => twig_get_attribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 423), "lang" => ($context["lang"] ?? null)]), "html", null, true);
                echo "\" class=\"table-circlebtn \"> <img src=\"images/more-icon.svg\" alt=\"\">
                                        </a></td> -->
                                     <td>
                                        <div class=\"dropdown elipses-btn\">
                                            <a class=\"table-circlebtn dropdown-toggle\" href=\"#\" role=\"button\"
                                                data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                                <img src=\"";
                // line 429
                echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
                echo "images/more-icon.svg\" alt=\"\">
                                            </a>

                                            <ul class=\"dropdown-menu\">
                                                <li><a class=\"dropdown-item\" href=\"#\">Preview pathway </a></li>
                                                <li><a class=\"dropdown-item\" href=\"";
                // line 434
                echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("editDraft", ["id" => twig_get_attribute($this->env, $this->source, $context["data"], "mongo_id", [], "any", false, false, false, 434), "form_type" => "pwc-create-pathway", "lang" => ($context["lang"] ?? null)]), "html", null, true);
                echo "\">Edit details </a></li>
                                                <li><a class=\"dropdown-item\" href=\"";
                // line 435
                echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("pathwayDetails", ["id" => twig_get_attribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 435), "lang" => ($context["lang"] ?? null)]), "html", null, true);
                echo "\">Edit pathway </a></li>
                                                <li><a class=\"dropdown-item\" href=\"#\">Manage people </a></li>

                                                ";
                // line 438
                if ((twig_get_attribute($this->env, $this->source, $context["data"], "is_active", [], "any", false, false, false, 438) == "1")) {
                    // line 439
                    echo "                                                <li class=\"inactive\" id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 439), "html", null, true);
                    echo "\" data-active=\"inactive\"><a class=\"dropdown-item\" href=\"javascript:void(0)\">Make pathway inactive</a></li>
                                                ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 440
$context["data"], "is_active", [], "any", false, false, false, 440) == "2")) {
                    // line 441
                    echo "                                                <li class=\"inactive\" id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 441), "html", null, true);
                    echo "\" data-active=\"active\"><a class=\"dropdown-item\" href=\"javascript:void(0)\">Make pathway active</a></li>
                                                ";
                }
                // line 442
                echo " 



                                            </ul>
                                        </div>
                                    </td>
                                </tr> 
                                
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 451
            echo "                        
                                ";
        } else {
            // line 453
            echo "                                  <tr>
                                      <td> <p>No record found.</p></td>
                                  </tr>
                                ";
        }
        // line 457
        echo "                            </tbody>
                            
                        </table>

                    </div>
                    </div>
                </div>





            </div>
        </div>
    </section>   


<div id=\"myModal\" class=\"modal\">
  <div class=\"modal-content\">
    <p>Are you sure you want to inactivate this item?</p>
    <button id=\"confirmBtn\">Yes</button>
    <button id=\"cancelBtn\">Cancel</button>
  </div>
</div>
    
";
    }

    // line 484
    public function block_scriptBlock($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 485
        echo " <script>
document.querySelectorAll(\".inactive\").forEach(function(li) {
    li.addEventListener(\"click\", function() {
    var id = \$(li).attr('id');

    var active = \$(li).attr('data-active');

    \$(\"#myModal\").show();
      
    \$(\"#cancelBtn\").click(function(){
        \$(\"#myModal\").hide();
        return false;
    });

      \$(\"#confirmBtn\").click(function(){
         \$.ajax({
                url: '";
        // line 501
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("inactivatePathway"), "html", null, true);
        echo "',
                type: 'POST',
                data: {'id': id,'active': active},
                success: function success(response) {
                  if (response.success) {
                    location.reload();
                    } else {
                       
                    }
                }               
              });
        \$(\"#myModal\").hide();
      });
  
      
  
    });
});



  

  


\$(function() {
  
  \$('a[data-bs-toggle=\"tab\"]').on('shown.bs.tab', function (e) {
    localStorage.setItem('lastTab', \$(this).attr('href'));
  });
  var lastTab = localStorage.getItem('lastTab');
  
  if (lastTab) {
    \$('[href=\"' + lastTab + '\"]').tab('show');
  }
  
});


function loadPagingData(page_no, move=''){
\t\$('.task-list-data').html('<div class=\"spinner-border\" role=\"status\" style=\"margin:50px 0px 0px 50%\"><span class=\"visually-hidden\">Loading...</span></div>');
\t\$.ajax({
\t   url: 'task-list-data?page='+page_no+((move=='yes')?'&move=y':''),
\t\ttype: 'POST',
\t\tdata: {'level':'', 'is_published' : 0},                
\t\tsuccess: function success(response) {
\t\t\t//console.log('non',response); return;
\t\t\t\$('.task-list-data').html('');
\t\t\t\$('.task-list-data').append(response);
\t\t\t
\t\t},
\t\terror: function error(err) {
\t\t\tif (err.status == 401) {
\t\t\t\tlocation.reload();
\t\t\t}
\t\t}
\t});

}

\$(document).ready(function () {
\t\$('ul#myTab  a#home-tab').addClass('active');
\t\$('ul#myTab  a#profile-tab').removeClass('active');
\t//\$(\".lds-spinner\").show();\t
\t\$.ajax({
               url: 'task-list-data',
                type: 'POST',
                data: {'level':'', 'is_published' : 0},                
                success: function success(response) {
                    //console.log('non',response); return;
                    \$('.task-list-data').html('');
                    \$('.task-list-data').append(response);
                    
                },
                error: function error(err) {
                    if (err.status == 401) {
                        location.reload();
                    }
                }
            });
});
\$('#filterTextBox').keydown(function (event) {
    let keyPressed = event.keyCode || event.which;
    if (keyPressed === 13) {
        var classes = \$('ul#myTab  a#profile-tab').attr('class');
\t\tvar clsArr = classes.split(' ');
\t\tvar actCls = \$.trim(clsArr[1]);
\t\tvar\tpublished = 0;
\t\tif(actCls=='active'){
\t\t   published = 1;
\t\t}
\t\t
\t\tvar obj = \$.trim(\$('button.level').text());\t
\t\t
\t\tvar flevel = '';
\t\tif(obj != 'Level'){
\t\t\t flevel =  obj;
\t\t}
\t\tvar searchText = '';
\t\tif(\$.trim(\$('#filterTextBox').val()) != ''){
\t\t\t searchText = \$.trim(\$('#filterTextBox').val());
\t\t}
\t   \$('.task-list-data').html('<div class=\"spinner-border\" role=\"status\" style=\"margin:50px 0px 0px 50%\"><span class=\"visually-hidden\">Loading...</span></div>');
\t   \$.ajax({
               url: 'task-list-data',
                type: 'POST',
                data: {'level':flevel, 'is_published' : published, 'searchText': searchText},                
                success: function success(response) {
                    //console.log('non',response); return;
                    \$('.task-list-data').html('');
                    \$('.task-list-data').append(response);
                    
                },
                error: function error(err) {
                    if (err.status == 401) {
                        location.reload();
                    }
                }
            });
    }
});

function addSelection(){
\t\$('#fSelSection li').remove();
\t\$('#fSelSection').append('<li><label class=\"filter-bar\">Selected</label></li>');
\t\$('#fSelSection').show();
\t\$('#level_sel_id li input[type=checkbox]:checked').each(function(){
\t\tvar ids = \$(this).attr('id');
\t\tidsArr = ids.split('_');
\t\tvar leveText = \$('#level_child_'+idsArr[2]).text();
\t\t\$('#fSelSection').append('<li class=\"filterbar\" id=\"level_li_'+idsArr[2]+'\"><span>'+leveText+'</span><button type=\"button\" class=\"closebtn\" data-bs-dismiss=\"alert\" onclick=\"removeElem(\\'level\\', '+idsArr[2]+')\"></button></li>');
\t});
\t
\t\$('#avail_menu li input[type=checkbox]:checked').each(function(){
\t\tvar ids = \$(this).attr('id');
\t\tidsArr = ids.split('_');
\t\tvar leveText = \$('#level_avl_'+idsArr[1]).text();
\t\t\$('#fSelSection').append('<li class=\"filterbar\" id=\"avail_li_'+idsArr[1]+'\"><span>'+leveText+'</span><button type=\"button\" class=\"closebtn\" data-bs-dismiss=\"alert\" onclick=\"removeElem(\\'avail\\', \\''+idsArr[1]+'\\')\"></button></li>');
\t});
\t\$('#pathway_type_menu li input[type=checkbox]:checked').each(function(){
\t\tvar ids = \$(this).attr('id');
\t\tidsArr = ids.split('_');
\t\tvar leveText = \$('#level_ptype_'+idsArr[1]).text();
\t\t\$('#fSelSection').append('<li class=\"filterbar\" id=\"ptype_li_'+idsArr[1]+'\"><span>'+leveText+'</span><button type=\"button\" class=\"closebtn\" data-bs-dismiss=\"alert\" onclick=\"removeElem(\\'ptype\\', \\''+idsArr[1]+'\\')\"></button></li>');
\t});
\t\$('#status_menu li input[type=checkbox]:checked').each(function(){
\t\tvar ids = \$(this).attr('id');
\t\tidsArr = ids.split('_');
\t\tvar leveText = \$('#level_'+idsArr[1]).text();
\t\t\$('#fSelSection').append('<li class=\"filterbar\" id=\"status_li_'+idsArr[1]+'\"><span>'+leveText+'</span><button type=\"button\" class=\"closebtn\" data-bs-dismiss=\"alert\" onclick=\"removeElem(\\'status\\', \\''+idsArr[1]+'\\')\"></button></li>');
\t});
\t\$('#fSelSection').append('<li><label class=\"clearfilters\" onclick=\"clearAllFil()\" style=\"cursor:pointer\">&nbsp;Clear all filters</label></li>');
\t //if(\$('#check_child_'+id).is(':checked')){
\t \t// var leveText = \$('#level_child_'+id).text();
\t\t //\$('#fSelSection').append('<div class=\"alert alert-primary alert-dismissible fade show\" style=\"width:120px;\"><strong>'+leveText+'</strong><button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
\t //}

}
function removeElem(wFil, id){
\tif(wFil == 'level'){
\t  \$('#level_li_'+id).remove();
\t  
\t  \$('#check_child_'+id).prop('checked', false);
\t}
\tif(wFil == 'status'){
\t  \$('#status_li_'+id).remove();\t  
\t  \$('#check_'+id).prop('checked', false);
\t}
\tif(wFil == 'avail'){
\t  \$('#avail_li_'+id).remove();\t  
\t  \$('#avl_'+id).prop('checked', false);
\t}
\tif(wFil == 'ptype'){
\t  \$('#ptype_li_'+id).remove();\t  
\t  \$('#ptype_'+id).prop('checked', false);
\t}
}
function clearAllFil(){
\t\$('#filterTextBox').val('');
\t\$('#fSelSection li').remove();
\t\$('#level_sel_id li input[type=checkbox]').each(function(){
\t\t\t\t  \$(this).prop('checked', false);
\t
\t});
\t\$('#status_menu li input[type=checkbox]').each(function(){
\t\t\t\t  \$(this).prop('checked', false);
\t
\t});
\t\$('#avail_menu li input[type=checkbox]').each(function(){
\t\t\t\t  \$(this).prop('checked', false);
\t
\t});
\t\$('#pathway_type_menu li input[type=checkbox]').each(function(){
\t\t\t\t  \$(this).prop('checked', false);
\t
\t});
\t\$('#fSelSection').append('<li><label class=\"filter-bar\">Selected</label></li>');
\t\$('#fSelSection').hide();
}
function loadFilter(){
\tvar classes = \$('ul#myTab  a#profile-tab').attr('class');
\tvar clsArr = classes.split(' ');
\tvar actCls = \$.trim(clsArr[1]);
\tvar\tpublished = 0;
\tif(actCls=='active'){
\t   published = 1;
\t}
\tif(obj != ''){
\t//\$('button.level').text(obj);
\t}else{
\t  obj = \$.trim(\$('button.level').text());\t
\t}
\tvar flevel = '';
\tif(obj != 'Level'){
\t\t flevel =  obj;
\t}
\tvar searchText = '';
\tif(\$.trim(\$('#filterTextBox').val()) != ''){
\t\t searchText = \$.trim(\$('#filterTextBox').val());
\t}
   \$('.task-list-data').html('<div class=\"spinner-border\" role=\"status\" style=\"margin:50px 0px 0px 50%\"><span class=\"visually-hidden\">Loading...</span></div>');
   \$.ajax({
               url: 'task-list-data',
                type: 'POST',
                data: {'level':flevel, 'is_published' : published, 'searchText': searchText},                
                success: function success(response) {
                    //console.log('non',response); return;
                    \$('.task-list-data').html('');
                    \$('.task-list-data').append(response);
                    
                },
                error: function error(err) {
                    if (err.status == 401) {
                        location.reload();
                    }
                }
            });
}




 </script>

";
    }

    public function getTemplateName()
    {
        return "Org_1/Home/task_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  802 => 501,  784 => 485,  780 => 484,  751 => 457,  745 => 453,  741 => 451,  726 => 442,  720 => 441,  718 => 440,  713 => 439,  711 => 438,  705 => 435,  701 => 434,  693 => 429,  684 => 423,  681 => 422,  677 => 421,  675 => 420,  672 => 419,  670 => 418,  665 => 415,  659 => 414,  655 => 412,  653 => 411,  649 => 410,  645 => 409,  641 => 408,  636 => 406,  623 => 398,  619 => 397,  611 => 392,  606 => 390,  601 => 388,  596 => 386,  591 => 384,  586 => 382,  557 => 355,  554 => 354,  545 => 352,  541 => 351,  537 => 350,  525 => 340,  522 => 339,  513 => 337,  509 => 336,  505 => 335,  493 => 325,  490 => 324,  481 => 322,  477 => 321,  473 => 320,  438 => 288,  422 => 274,  419 => 273,  360 => 216,  355 => 213,  341 => 209,  337 => 208,  329 => 205,  325 => 204,  313 => 194,  307 => 190,  293 => 186,  289 => 185,  284 => 182,  280 => 181,  276 => 180,  265 => 176,  261 => 175,  239 => 155,  234 => 152,  228 => 151,  226 => 150,  217 => 148,  213 => 147,  209 => 145,  205 => 144,  200 => 143,  165 => 111,  149 => 97,  146 => 96,  51 => 3,  47 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'Org_1/Layout/app_home.twig' %}
{% block content %}

<style type=\"text/css\">
    .modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  text-align: center;
}

/* Button styles */
#myBtn {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 5px;
}

#confirmBtn, #cancelBtn {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 5px;
  margin: 10px;
}

#cancelBtn {
  background-color: #f44336;
}

/* Button hover styles */
#myBtn:hover, #confirmBtn:hover, #cancelBtn:hover {
  cursor: pointer;
  opacity: 0.8;
}
</style>
  <section class=\"\">
        <div class=\"pathwaytable-section\">

            <div >

                <div class=\"d-flex justify-content-between custom-ul pathwayheader\">

                    <ul class=\"mb-0\">
                        <li>
                            <h1 class=\"serifb-text\">Pathway</h1>
                        </li>
                    </ul>

                </div>


                <ul class=\"nav nav-tabs customtab\" id=\"myTab\" role=\"tablist\">
                    <li class=\"nav-item\" role=\"presentation\">
                        <a class=\"nav-link active\" id=\"home-tab\" data-bs-toggle=\"tab\"
                            href=\"#home-tab-pane\" type=\"button\" role=\"tab\" aria-controls=\"home-tab-pane\"
                            aria-selected=\"true\" onclick=\"loadFilter()\">Draft</a>
                    </li>
                    <li class=\"nav-item\" role=\"presentation\">
                        <a class=\"nav-link\" id=\"profile-tab\" data-bs-toggle=\"tab\"
                            href=\"#home-tab-pane\" type=\"button\" role=\"tab\" aria-controls=\"home-tab-pane\"
                            aria-selected=\"false\" onclick=\"loadFilter()\">Published</a>
                    </li>
                </ul>
                <div class=\"tab-content\" id=\"myTabContent\">
                    <div class=\"tab-pane fade show active\" id=\"home-tab-pane\" role=\"tabpanel\" aria-labelledby=\"home-tab\"
                        tabindex=\"0\">


                        <div class=\"d-flex justify-content-between custom-ul pathwaysubhead\">

                            <ul class=\"mb-0\">
                                <li>
                                </li>
                            </ul>
                            <ul class=\"mb-0\">
                                <li><a href=\"\" class=\"secondarybtn mgr-20\">Download</a></li>
                                <li>
                                    <a href=\"{{path_for('newFormRender',{lang: lang, formName:\"pwc-create-pathway
\"})}}
\" class=\"primarybtn\"> Add Pathway </a>
                                </li>
                                
                            </ul>
                        </div>


                        <div class=\"custom-ul filtersection\">

                            <ul class=\"mb-0 searchsection\">
                                <li class=\"pathwaysearch-row position-relative\">
                                    <input type=\"text\" class=\"form-control\" id=\"filterTextBox\"
                                        aria-describedby=\"search\" placeholder=\"Search pathway\">
                                    <img class=\"pathwaysearchinput-icon\" src=\"{{constant('HTTP_SERVER')}}images/search-icon.svg\" alt=\"\">
                                </li>
                                <li>

                                </li>
                            </ul>
                            <ul class=\"mb-0 dropdown-row mt-32\">

                                <li>
                                <label class=\"filter-bar\">Filter</label>
                                </li>

                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Duration
                                        </button>
                                        <ul class=\"dropdown-menu\">
                                            <li><a class=\"dropdown-item\" href=\"#\">Action</a></li>
                                            <li><a class=\"dropdown-item\" href=\"#\">Another action</a></li>
                                            <li><a class=\"dropdown-item\" href=\"#\">Something else here</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle level\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Level
                                        </button>\t\t\t\t\t\t\t\t\t\t
                                        <ul class=\"dropdown-menu\" id=\"level_sel_id\">\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{% if level|length > 0 %}{% set nos=1 %}\t\t\t\t\t\t\t
\t\t\t\t\t\t             \t{% for data in level %}
\t\t\t\t\t\t\t\t\t\t<li class=\"dropdown-item\">
                                                <div class=\"form-check\">
                                                    <input type=\"checkbox\" class=\"form-check-input\" id=\"check_child_{{nos}}\">
                                                    <label class=\"form-check-label\" for=\"check_child_{{nos}}\" id=\"level_child_{{nos}}\">{{data.value_of_data}}</label>
                                                </div>
                                            </li> {% set nos=nos+1 %}
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t<li><button type=\"button\" class=\"cancelbtn d-inline\" id=\"cancelbtn\">Cancel</button>
                                        <button type=\"submit\" class=\"publishbtn d-inline\" id=\"submit\" onclick=\"addSelection()\">Apply</button></li>
\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t
                                        </ul>\t\t\t\t\t\t\t\t\t\t
                                    </div>
                                </li>
                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Availability
                                        </button>
                                        <ul class=\"dropdown-menu\" id=\"avail_menu\">

                                        <li class=\"dropdown-item pos-r\">
                                        <input type=\"text\" class=\"form-control-search\" placeholder=\"Search\">

                                        <i class=\"filter-searchicon\"></i>
                                        </li>

<li class=\"dropdown-item\">
<div class=\"form-check\">
                                                    <input type=\"checkbox\" class=\"form-check-input\" id=\"avl_{{data.value_of_data}}\">
                                                    <label class=\"form-check-label\" for=\"avl_{{data.value_of_data}}\" id=\"level_avl_{{data.value_of_data}}\">{{data.value_of_data}}</label>
                                                </div>
</li>

\t\t\t\t\t\t\t\t\t\t{% if availability|length > 0 %}\t\t\t\t\t\t\t
\t\t\t\t\t\t             \t{% for data in availability %}
                                             
\t\t\t\t\t\t\t\t\t\t\t <li class=\"dropdown-item bdr-row\">
                                                <div class=\"form-check\">
                                                    <input type=\"checkbox\" class=\"form-check-input\" id=\"avl_{{data.value_of_data}}\">
                                                    <label class=\"form-check-label\" for=\"avl_{{data.value_of_data}}\" id=\"level_avl_{{data.value_of_data}}\">{{data.value_of_data}}</label>
                                                </div>
                                            </li>
                                        {% endfor %}
\t\t\t\t\t\t\t\t\t\t<li class=\"filter-btnrow\">
                                        <button type=\"button\" class=\"cancelbtn d-inline\"  style=\"cursor:pointer\" onclick=\"\">Cancel</button>
\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"publishbtn d-inline\"  onclick=\"addSelection()\">Apply</button></li>
\t\t\t\t\t\t\t\t\t\t{% endif %}
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class=\"dropdown\" id=\"pathway_type_menu\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Pathway type
                                        </button>
                                        <ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t\t{% if pathway_type|length > 0 %}\t\t\t\t\t\t\t
\t\t\t\t\t\t             \t{% for data in pathway_type %}                                            
\t\t\t\t\t\t\t\t\t\t\t<li class=\"dropdown-item\">
                                                <div class=\"form-check\">
                                                    <input type=\"checkbox\" class=\"form-check-input\" id=\"ptype_{{data.value_of_data}}\">
                                                    <label class=\"form-check-label\" for=\"avl_{{data.value_of_data}}\" id=\"level_ptype_{{data.value_of_data}}\">{{data.value_of_data}}</label>
                                                </div>
                                            </li>
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t<li><button type=\"button\" class=\"cancelbtn d-inline\"  style=\"cursor:pointer\" onclick=\"\">Cancel</button>
\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"publishbtn d-inline\"  onclick=\"addSelection()\">Apply</button></li>
\t\t\t\t\t\t\t\t\t\t{% endif %}
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Status
                                        </button>
                                        <ul class=\"dropdown-menu\" id=\"status_menu\">
\t\t\t\t\t\t\t\t\t\t<li class=\"dropdown-item\">
                                                <div class=\"form-check\">
                                                    <input type=\"checkbox\" class=\"form-check-input\" id=\"check_active\">
                                                    <label class=\"form-check-label\" for=\"check_active\" id=\"level_active\">Active</label>
                                                </div>
                                            </li>
\t\t\t\t\t\t\t\t\t\t\t<li class=\"dropdown-item\">
                                                <div class=\"form-check\">
                                                    <input type=\"checkbox\" class=\"form-check-input\" id=\"check_inactive\">
                                                    <label class=\"form-check-label\" for=\"check_inactive\" id=\"level_inactive\">Inactive</label>
                                                </div>
                                            </li>
                                            <li><button type=\"button\" class=\"cancelbtn d-inline\"  style=\"cursor:pointer\" onclick=\"\">Cancel</button>
\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"publishbtn d-inline\"  onclick=\"addSelection()\">Apply</button></li>                                                                                         
                                        </ul>
                                    </div>
                                </li>
                            </ul>
\t\t\t\t\t\t\t<ul class=\"mb-0 mt-32\" id=\"fSelSection\" style=\"display:none\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<label class=\"filter-bar\">Selected</label>
                                </li> 
                            </ul>
\t\t\t\t\t\t
                        </div>

\t\t\t\t\t\t<!-- ############### -->
\t\t\t\t\t\t<div class=\"task-list-data\">
\t\t\t\t\t\t   <div class=\"spinner-border\" role=\"status\" style=\"margin:50px 0px 0px 50%\">
\t\t\t\t\t\t\t  <span class=\"visually-hidden\">Loading...</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- ################ -->

                    </div>
                    <div class=\"tab-pane fade\" id=\"profile-tab-pane\" role=\"tabpanel\" aria-labelledby=\"profile-tab\"
                        tabindex=\"0\">
                       <!-- <div class=\"d-flex justify-content-between custom-ul pathwaysubhead\">

                            <ul class=\"mb-0\">
                                <li>
                                </li>
                            </ul>
                            <ul class=\"mb-0\">
                                <li><a href=\"\" class=\"secondarybtn mgr-20\">Download</a></li>
                                <li>
                                    <a href=\"{{path_for('newFormRender',{lang: lang, formName:\"pwc-create-pathway
\"})}}
\" class=\"primarybtn\"> Add Pathway </a>
                                </li>
                                
                            </ul>
                        </div>

\t\t\t\t\t <!--
                        <div class=\"custom-ul filtersection\">

                            <ul class=\"mb-0 searchsection\">
                                <li class=\"pathwaysearch-row position-relative\">
                                    <input type=\"text\" class=\"form-control\" id=\"exampleInputsearch2\"
                                        aria-describedby=\"search\" placeholder=\"Search pathway\">
                                    <img class=\"pathwaysearchinput-icon\" src=\"{{constant('HTTP_SERVER')}}images/search-icon.svg\" alt=\"\">
                                </li>
                                <li>

                                </li>
                            </ul>
                            <ul class=\"mb-0 dropdown-row mt-32\">

                                <li>
                                <label class=\"filter-bar\">Filter</label>
                                </li>

                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Duration
                                        </button>
                                        <ul class=\"dropdown-menu\">
                                            <li><a class=\"dropdown-item\" href=\"#\">Action</a></li>
                                            <li><a class=\"dropdown-item\" href=\"#\">Another action</a></li>
                                            <li><a class=\"dropdown-item\" href=\"#\">Something else here</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Level
                                        </button>
                                        <ul class=\"dropdown-menu\">                                      
                                        {% if level|length > 0 %}                           
                                        {% for data in level %}
                                            <li><a class=\"dropdown-item\" href=\"#\">{{data.value_of_data}}</a></li>
                                        {% endfor %}
                                        {% endif %}
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Availability
                                        </button>
                                        <ul class=\"dropdown-menu\">
                                        {% if availability|length > 0 %}                            
                                        {% for data in availability %}
                                             <li><a class=\"dropdown-item\" href=\"#\">{{data.value_of_data}}</a></li>
                                        {% endfor %}
                                        {% endif %}
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Pathway type
                                        </button>
                                        <ul class=\"dropdown-menu\">
                                        {% if pathway_type|length > 0 %}                            
                                        {% for data in pathway_type %}
                                            <li><a class=\"dropdown-item\" href=\"#\">{{data.value_of_data}}</a></li>
                                        {% endfor %}
                                        {% endif %}
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\"
                                            data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                            Status
                                        </button>
                                        <ul class=\"dropdown-menu\">
                                            <li><a class=\"dropdown-item\" href=\"#\">Action</a></li>
                                            <li><a class=\"dropdown-item\" href=\"#\">Another action</a></li>
                                            <li><a class=\"dropdown-item\" href=\"#\">Something else here</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div> -->

<div class=\"pathwaytable\">
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
                            </thead>                            
                            <tbody id=\"fbody1\">     
                            {% if pathwayListPub|length > 0 %}                         
                            {% for data in pathwayListPub %}   

                                <tr>
                                    <th scope=\"row\" class=\"move-btnrow\">
                                        <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"flexCheckDefault\">
                                        <!-- <a href=\"#\" class=\"\"> <img src=\"images/moveup-icon.svg\" alt=\"\"></a>
                                        <a href=\"#\" class=\"\"><img src=\"images/movedown-icon.svg\" alt=\"\"></a> -->
                                    </th>
                                    <td>{{data.title}}</td>
                                    
                                    <td>{{data.duration |capitalize}}</td>
                                    <td>{{data.proficency_level |capitalize}}</td>
                                    <td>{{data.availability}}</td>
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
                                     <td>
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
                                
                            {% endfor %}                        
                                {% else %}
                                  <tr>
                                      <td> <p>No record found.</p></td>
                                  </tr>
                                {% endif %}
                            </tbody>
                            
                        </table>

                    </div>
                    </div>
                </div>





            </div>
        </div>
    </section>   


<div id=\"myModal\" class=\"modal\">
  <div class=\"modal-content\">
    <p>Are you sure you want to inactivate this item?</p>
    <button id=\"confirmBtn\">Yes</button>
    <button id=\"cancelBtn\">Cancel</button>
  </div>
</div>
    
{% endblock %}

{% block scriptBlock %}
 <script>
document.querySelectorAll(\".inactive\").forEach(function(li) {
    li.addEventListener(\"click\", function() {
    var id = \$(li).attr('id');

    var active = \$(li).attr('data-active');

    \$(\"#myModal\").show();
      
    \$(\"#cancelBtn\").click(function(){
        \$(\"#myModal\").hide();
        return false;
    });

      \$(\"#confirmBtn\").click(function(){
         \$.ajax({
                url: '{{path_for(\"inactivatePathway\")}}',
                type: 'POST',
                data: {'id': id,'active': active},
                success: function success(response) {
                  if (response.success) {
                    location.reload();
                    } else {
                       
                    }
                }               
              });
        \$(\"#myModal\").hide();
      });
  
      
  
    });
});



  

  


\$(function() {
  
  \$('a[data-bs-toggle=\"tab\"]').on('shown.bs.tab', function (e) {
    localStorage.setItem('lastTab', \$(this).attr('href'));
  });
  var lastTab = localStorage.getItem('lastTab');
  
  if (lastTab) {
    \$('[href=\"' + lastTab + '\"]').tab('show');
  }
  
});


function loadPagingData(page_no, move=''){
\t\$('.task-list-data').html('<div class=\"spinner-border\" role=\"status\" style=\"margin:50px 0px 0px 50%\"><span class=\"visually-hidden\">Loading...</span></div>');
\t\$.ajax({
\t   url: 'task-list-data?page='+page_no+((move=='yes')?'&move=y':''),
\t\ttype: 'POST',
\t\tdata: {'level':'', 'is_published' : 0},                
\t\tsuccess: function success(response) {
\t\t\t//console.log('non',response); return;
\t\t\t\$('.task-list-data').html('');
\t\t\t\$('.task-list-data').append(response);
\t\t\t
\t\t},
\t\terror: function error(err) {
\t\t\tif (err.status == 401) {
\t\t\t\tlocation.reload();
\t\t\t}
\t\t}
\t});

}

\$(document).ready(function () {
\t\$('ul#myTab  a#home-tab').addClass('active');
\t\$('ul#myTab  a#profile-tab').removeClass('active');
\t//\$(\".lds-spinner\").show();\t
\t\$.ajax({
               url: 'task-list-data',
                type: 'POST',
                data: {'level':'', 'is_published' : 0},                
                success: function success(response) {
                    //console.log('non',response); return;
                    \$('.task-list-data').html('');
                    \$('.task-list-data').append(response);
                    
                },
                error: function error(err) {
                    if (err.status == 401) {
                        location.reload();
                    }
                }
            });
});
\$('#filterTextBox').keydown(function (event) {
    let keyPressed = event.keyCode || event.which;
    if (keyPressed === 13) {
        var classes = \$('ul#myTab  a#profile-tab').attr('class');
\t\tvar clsArr = classes.split(' ');
\t\tvar actCls = \$.trim(clsArr[1]);
\t\tvar\tpublished = 0;
\t\tif(actCls=='active'){
\t\t   published = 1;
\t\t}
\t\t
\t\tvar obj = \$.trim(\$('button.level').text());\t
\t\t
\t\tvar flevel = '';
\t\tif(obj != 'Level'){
\t\t\t flevel =  obj;
\t\t}
\t\tvar searchText = '';
\t\tif(\$.trim(\$('#filterTextBox').val()) != ''){
\t\t\t searchText = \$.trim(\$('#filterTextBox').val());
\t\t}
\t   \$('.task-list-data').html('<div class=\"spinner-border\" role=\"status\" style=\"margin:50px 0px 0px 50%\"><span class=\"visually-hidden\">Loading...</span></div>');
\t   \$.ajax({
               url: 'task-list-data',
                type: 'POST',
                data: {'level':flevel, 'is_published' : published, 'searchText': searchText},                
                success: function success(response) {
                    //console.log('non',response); return;
                    \$('.task-list-data').html('');
                    \$('.task-list-data').append(response);
                    
                },
                error: function error(err) {
                    if (err.status == 401) {
                        location.reload();
                    }
                }
            });
    }
});

function addSelection(){
\t\$('#fSelSection li').remove();
\t\$('#fSelSection').append('<li><label class=\"filter-bar\">Selected</label></li>');
\t\$('#fSelSection').show();
\t\$('#level_sel_id li input[type=checkbox]:checked').each(function(){
\t\tvar ids = \$(this).attr('id');
\t\tidsArr = ids.split('_');
\t\tvar leveText = \$('#level_child_'+idsArr[2]).text();
\t\t\$('#fSelSection').append('<li class=\"filterbar\" id=\"level_li_'+idsArr[2]+'\"><span>'+leveText+'</span><button type=\"button\" class=\"closebtn\" data-bs-dismiss=\"alert\" onclick=\"removeElem(\\'level\\', '+idsArr[2]+')\"></button></li>');
\t});
\t
\t\$('#avail_menu li input[type=checkbox]:checked').each(function(){
\t\tvar ids = \$(this).attr('id');
\t\tidsArr = ids.split('_');
\t\tvar leveText = \$('#level_avl_'+idsArr[1]).text();
\t\t\$('#fSelSection').append('<li class=\"filterbar\" id=\"avail_li_'+idsArr[1]+'\"><span>'+leveText+'</span><button type=\"button\" class=\"closebtn\" data-bs-dismiss=\"alert\" onclick=\"removeElem(\\'avail\\', \\''+idsArr[1]+'\\')\"></button></li>');
\t});
\t\$('#pathway_type_menu li input[type=checkbox]:checked').each(function(){
\t\tvar ids = \$(this).attr('id');
\t\tidsArr = ids.split('_');
\t\tvar leveText = \$('#level_ptype_'+idsArr[1]).text();
\t\t\$('#fSelSection').append('<li class=\"filterbar\" id=\"ptype_li_'+idsArr[1]+'\"><span>'+leveText+'</span><button type=\"button\" class=\"closebtn\" data-bs-dismiss=\"alert\" onclick=\"removeElem(\\'ptype\\', \\''+idsArr[1]+'\\')\"></button></li>');
\t});
\t\$('#status_menu li input[type=checkbox]:checked').each(function(){
\t\tvar ids = \$(this).attr('id');
\t\tidsArr = ids.split('_');
\t\tvar leveText = \$('#level_'+idsArr[1]).text();
\t\t\$('#fSelSection').append('<li class=\"filterbar\" id=\"status_li_'+idsArr[1]+'\"><span>'+leveText+'</span><button type=\"button\" class=\"closebtn\" data-bs-dismiss=\"alert\" onclick=\"removeElem(\\'status\\', \\''+idsArr[1]+'\\')\"></button></li>');
\t});
\t\$('#fSelSection').append('<li><label class=\"clearfilters\" onclick=\"clearAllFil()\" style=\"cursor:pointer\">&nbsp;Clear all filters</label></li>');
\t //if(\$('#check_child_'+id).is(':checked')){
\t \t// var leveText = \$('#level_child_'+id).text();
\t\t //\$('#fSelSection').append('<div class=\"alert alert-primary alert-dismissible fade show\" style=\"width:120px;\"><strong>'+leveText+'</strong><button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
\t //}

}
function removeElem(wFil, id){
\tif(wFil == 'level'){
\t  \$('#level_li_'+id).remove();
\t  
\t  \$('#check_child_'+id).prop('checked', false);
\t}
\tif(wFil == 'status'){
\t  \$('#status_li_'+id).remove();\t  
\t  \$('#check_'+id).prop('checked', false);
\t}
\tif(wFil == 'avail'){
\t  \$('#avail_li_'+id).remove();\t  
\t  \$('#avl_'+id).prop('checked', false);
\t}
\tif(wFil == 'ptype'){
\t  \$('#ptype_li_'+id).remove();\t  
\t  \$('#ptype_'+id).prop('checked', false);
\t}
}
function clearAllFil(){
\t\$('#filterTextBox').val('');
\t\$('#fSelSection li').remove();
\t\$('#level_sel_id li input[type=checkbox]').each(function(){
\t\t\t\t  \$(this).prop('checked', false);
\t
\t});
\t\$('#status_menu li input[type=checkbox]').each(function(){
\t\t\t\t  \$(this).prop('checked', false);
\t
\t});
\t\$('#avail_menu li input[type=checkbox]').each(function(){
\t\t\t\t  \$(this).prop('checked', false);
\t
\t});
\t\$('#pathway_type_menu li input[type=checkbox]').each(function(){
\t\t\t\t  \$(this).prop('checked', false);
\t
\t});
\t\$('#fSelSection').append('<li><label class=\"filter-bar\">Selected</label></li>');
\t\$('#fSelSection').hide();
}
function loadFilter(){
\tvar classes = \$('ul#myTab  a#profile-tab').attr('class');
\tvar clsArr = classes.split(' ');
\tvar actCls = \$.trim(clsArr[1]);
\tvar\tpublished = 0;
\tif(actCls=='active'){
\t   published = 1;
\t}
\tif(obj != ''){
\t//\$('button.level').text(obj);
\t}else{
\t  obj = \$.trim(\$('button.level').text());\t
\t}
\tvar flevel = '';
\tif(obj != 'Level'){
\t\t flevel =  obj;
\t}
\tvar searchText = '';
\tif(\$.trim(\$('#filterTextBox').val()) != ''){
\t\t searchText = \$.trim(\$('#filterTextBox').val());
\t}
   \$('.task-list-data').html('<div class=\"spinner-border\" role=\"status\" style=\"margin:50px 0px 0px 50%\"><span class=\"visually-hidden\">Loading...</span></div>');
   \$.ajax({
               url: 'task-list-data',
                type: 'POST',
                data: {'level':flevel, 'is_published' : published, 'searchText': searchText},                
                success: function success(response) {
                    //console.log('non',response); return;
                    \$('.task-list-data').html('');
                    \$('.task-list-data').append(response);
                    
                },
                error: function error(err) {
                    if (err.status == 401) {
                        location.reload();
                    }
                }
            });
}




 </script>

{% endblock %}", "Org_1/Home/task_list.twig", "C:\\xampp\\htdocs\\pwc\\templates\\Org_1\\Home\\task_list.twig");
    }
}
