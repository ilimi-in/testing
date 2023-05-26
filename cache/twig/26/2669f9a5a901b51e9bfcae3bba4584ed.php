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

/* Org_1/Home/form.twig */
class __TwigTemplate_6294483a22ef89a88d97e86fe48f694c extends Template
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
        $this->parent = $this->loadTemplate("Org_1/Layout/app_home.twig", "Org_1/Home/form.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "   
   <!-- <div class=\"connectmid-sec darkblue-bg\">
\t<nav aria-label=\"breadcrumb\" class=\"nav-bread breadcrump-click-stream\">
\t\t<ol class=\"breadcrumb breadcrumbCustom\">
\t\t\t<li class=\"breadcrumb-item \">
\t\t\t\t<a href=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_constant("HTTP_SERVER"), "html", null, true);
        echo twig_escape_filter($this->env, ($context["lang"] ?? null), "html", null, true);
        echo "\">Home</a>
\t\t\t\t<img class=\"breadcrumbIconbtn\" alt=\"breadcrumbIcon\"/>
\t\t\t</li>

                ";
        // line 12
        if (((($context["formKey"] ?? null) != "help") && (($context["formKey"] ?? null) != "home-banner"))) {
            // line 13
            echo "
                <li class=\"breadcrumb-item\">
\t\t\t\t<a href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("taskList", ["lang" => ($context["lang"] ?? null)]), "html", null, true);
            echo "\">Pathway List (s)</a>
\t\t\t\t<img class=\"breadcrumbIconbtn\" alt=\"breadcrumbIcon\"/>
\t\t\t</li>
                ";
        }
        // line 18
        echo "              
                
            </ol>
\t</nav>
</div> -->

<div class=\"formsection\">
\t\t";
        // line 25
        if ((($context["formKey"] ?? null) == "pwc-create-pathway")) {
            // line 26
            echo "\t\t\t<div>
\t\t\t\t<h1 class=\"headingbar\">Create pathway</h1>
\t\t\t\t<span class=\"field-required\">Required information</span>
\t\t\t</div>
\t\t";
        } elseif ((        // line 30
($context["formKey"] ?? null) == "pwc-section-details")) {
            // line 31
            echo "\t\t\t<div class=\"mb-32\">
\t\t\t\t<h1 class=\"headingbar\">Add section</h1>
\t\t\t\t<span class=\"field-required\">Required information</span>
\t\t\t</div>
\t\t";
        } elseif ((        // line 35
($context["formKey"] ?? null) == "pwc-sub-section-details")) {
            // line 36
            echo "\t\t\t<div class=\"mb-32\">
\t\t\t\t<h1 class=\"headingbar\">Add subsection</h1>
\t\t\t\t<span class=\"field-required\">Required information</span>
\t\t\t</div>
\t\t";
        } elseif ((        // line 40
($context["formKey"] ?? null) == "pwc-external-learning-object")) {
            // line 41
            echo "\t\t\t<div class=\"mb-32\">
\t\t\t\t<h1 class=\"headingbar\"> Add learning item</h1>
\t\t\t</div>
\t\t";
        }
        // line 44
        echo "  
      <div id=\"formio-id\" class=\"request-custom-form\"/></div>
</div>

<footer>
    <div class=\"footersection\">
        <p>©2023 PwC. All rights reserved. PwC refers to the US member firm of the PwC network or one of Its subsidiaries or affiliates.</p>

        <ul>
            <li><a href=\"#\"> Help Center </a></li>
            <li><a href=\"#\"> Privacy Policy</a></li>
            <li><a href=\"#\"> Cookie Notice</a></li>
            <li><a href=\"#\"> Terms & Conditions</a></li>            
        </ul>
    </div>
</footer>

<!-- add custom filter popup -->

<div class=\"modal fade\" id=\"customFilterModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"customFilterModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"customFilterLabel\">Edit custom filter</h5>
        <button type=\"button\" class=\"close\" data-bs-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <form id=\"customFormSubmit\" type=\"post\">
\t      <div class=\"modal-body\">
\t\t\t  <div class=\"form-group\">
\t\t\t    <label for=\"customFilterName\">Custom filter name</label>
\t\t\t    <input type=\"text\" class=\"form-control\" name=\"customFilterName\" id=\"customFilterName\" placeholder=\"Example Priority\">
\t\t\t  </div>
\t\t\t  <input type=\"hidden\" name=\"customFilterId\" id=\"customFilterId\">
\t\t\t  <div id=\"customFilterValueShow\">
\t\t\t\t  
\t\t\t  </div>
\t\t\t  <a id=\"addAdditionalValue\">+ Add additional value</a>
\t      </div>
\t      <div class=\"modal-footer\">
\t        <button type=\"button\" class=\"cancelbtn\" data-bs-dismiss=\"modal\">Close</button>
\t        <button type=\"submit\" class=\"publishbtn\">Save changes</button>
\t      </div>
      </form>
    </div>
  </div>
</div>

<!-- add custom filter popup -->

<span id=\"formData\" pathwayId=\"";
        // line 95
        echo twig_escape_filter($this->env, ($context["pathwayId"] ?? null), "html", null, true);
        echo "\" sectionId=\"";
        echo twig_escape_filter($this->env, ($context["sectionId"] ?? null), "html", null, true);
        echo "\" HTTP_REFERER=";
        echo twig_escape_filter($this->env, ($context["HTTP_REFERER"] ?? null), "html", null, true);
        echo " mongoId=\"\"></span>
<script>
\t  var FORM_URL = '";
        // line 97
        echo twig_escape_filter($this->env, ($context["FORM_URL"] ?? null), "html", null, true);
        echo "';
      var form_id = '";
        // line 98
        echo twig_escape_filter($this->env, ($context["form_id"] ?? null), "html", null, true);
        echo "';
      var formKey = '";
        // line 99
        echo twig_escape_filter($this->env, ($context["formKey"] ?? null), "html", null, true);
        echo "';
      var customForm = ''; 
      var formsaveddata='';
      var formDataChanged = false;
\t  var tpId = '";
        // line 103
        echo twig_escape_filter($this->env, ($context["type_id"] ?? null), "html", null, true);
        echo "';
      
\t        window.onload = function () {
\t        \t\$(\"#home-loader-overlay\").show();
\t        \twindow.addEventListener(\"beforeunload\", function (e) {
\t\t\t        var confirmationMessage = 'It looks like you have been editing something. If you leave before saving, your changes will be lost.';
\t\t\t        if(typeof(formDataChanged)!='undefined' && formDataChanged){
\t\t\t            (e || window.event).returnValue = confirmationMessage; //Gecko + IE
\t\t\t            return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
\t\t\t        }
\t\t\t    });
                loadForm(null, null);
            };
\t\t\t 
\t\t\tfunction loadForm(form_data, selected_value) {
                Formio.createForm(document.getElementById('formio-id'), FORM_URL, {
                    noAlerts: false,
                    hooks: {
                        beforeSubmit: function (submission, next) {
                            \$('.btn').prop('disabled', true);
                            var message = [];
                            var error = false;
                            setTimeout(function () {
                                
                                if (error) {
                                    \$('.btn').prop('disabled', false);
                                    next(message);
                                } else {
                                    next();
                                }
                            }, 10);
                        }
                    }
                }).then(function (form) {
                customForm = form;\t
                form.loading = false;
                form.nosubmit = true;
                form.submitMessage = '';


                
                \t\t
                form.on('change', function (changed) {

                \t/////////////////------------page on load  finished - on change start ---------------------//
\t\t            // check if saved data is different 
\t\t            if(form.loading==false && formsaveddata==''){
\t\t                formsaveddata=JSON.stringify(form.submission.data);
\t\t            }\t\t\t
\t\t            if(formsaveddata != JSON.stringify(form.submission.data)){
\t\t                formDataChanged =true;  
\t\t            }else if(formsaveddata == JSON.stringify(form.submission.data)){
\t\t                formDataChanged =false; 
\t\t            }  
\t\t            ///////////////----------------on change end -----------------//

                    \$(\".control-label--hidden\").replaceWith('<label class=\"control-label control-label--hidden\" style=\"display:none;\">control-label</label>');
\t\t\t\t\t//tab code start
\t\t\t\t\t\$('.pagination .page-item').each(function(i){
\t\t\t\t\t\tvar text = \$(this).text();\t\t\t\t\t\t
\t\t\t\t\t\tif(text == 'Proedge catalog'){
\t\t\t\t\t\t   \$(this).addClass('proedge_catalog');
\t\t\t\t\t\t}
\t\t\t\t\t\tif(text == 'External content'){
\t\t\t\t\t\t   \$(this).addClass('external_content');
\t\t\t\t\t\t}
\t\t\t\t\t\tif(text == 'Custom filter'){
\t\t\t\t\t\t   \$(this).addClass('pwc_settings');
\t\t\t\t\t\t   
\t\t\t\t\t\t}
\t\t\t\t\t   
\t\t\t\t\t});
                    //\$('.page-item').removeClass('active');\t\t\t\t\t
\t\t\t\t\t\$('.pwc_settings').hide()
\t\t\t\t\t\$(\".btn-wizard-nav-cancel\").hide();
\t\t\t\t\t\$(\".btn-wizard-nav-next\").hide();
\t\t\t\t\t
\t\t\t\t\t
                //tab code end
\t\t\t\t\t
                });
\t\t\t\t
\t\t\t\t
\t\t\t       
\t\t\t      

                form.on('render', function () {
\t\t\t\t/* ----- start ckeditor 5 ------*/
                var cid = '';
                if (formKey == 'pwc-create-pathway') {

                \tchangeComponentDynamicURL(form,'pathwayAvailability','get-field-master-data');
                \tchangeComponentDynamicURL(form,'pathwayLevel','get-field-master-data');
                \tchangeComponentDynamicURL(form,'pathwaySkills','get-skills-data');

                \tcid = 'pathwayDescription';
                }
\t\t\t\telse if (formKey == 'pwc-section-details') {
                \tcid = 'sectiondetailsDescription';
                }
\t\t\t\telse if (formKey == 'pwc-sub-section-details') {
                \tcid = 'subSectiondetailsDescription';
                }
\t\t\t\telse if (formKey == 'pwc-external-learning-object') {

\t\t\t\t\tchangeComponentDynamicURL(form,'loContentType','get-field-master-data');
\t\t\t\t\tchangeComponentDynamicURL(form,'loLevel','get-field-master-data');
\t\t\t\t\tsetTimeout(function() {
\t\t\t\t\t\tif(\$('.external_content').hasClass('active')) {
\t\t\t\t\t\t\tcid = 'loDescription';
\t\t\t\t\t\t}
\t\t\t\t\t}, 100)
\t\t\t\t\t
                }


\t\t\t\t
\t\t\t\t
                setTimeout(function() {
\t                if(cid) {
\t                ClassicEditor
\t\t\t\t\t\t// Note that you do not have to specify the plugin and toolbar configuration — using defaults from the build.
\t\t\t\t\t\t.create( document.querySelector( '#'+cid ) , {
\t\t\t\t\t\t\t// https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t// 'style' is pending
\t\t\t\t\t\t\t// Removed 'fontSize',
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\ttoolbar: {                                                                              
\t\t\t\t\t\t\t  items: ['bold', 'italic', 'strikethrough', 'underline', 'RemoveFormat', '|','numberedList','bulletedList', 'todoList', '|','outdent', 'indent','blockQuote', 'alignment','|','link', 'horizontalLine','specialCharacters','|', '|','heading','|',    '|','-','fontSize', 'fontColor','|', 'SelectAll', 'findAndReplace', 'wproofreader', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '|','sourceEditing','undo', 'redo'], 
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t//,'highlight', 'fontColor', 'fontBackgroundColor', 'insertImage', 'insertTable'
\t\t\t\t\t\t\t //items: ['bold', 'italic', 'strikethrough', 'underline', '|','numberedList','bulletedList','|','link','|','sourceEditing'],
\t\t\t\t\t\t\tshouldNotGroupWhenFull: true
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t                                                                            htmlEmbed: {showPreviews: true },
\t\t\t\t\t\t\timage: {styles: ['alignCenter', 'alignLeft','alignRight'],
\t\t\t\t\t\t\tresizeOptions: [
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tname: 'resizeImage:original',
\t\t\t\t\t\t\t\tlabel: 'Original',
\t\t\t\t\t\t\t\tvalue: null
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tname: 'resizeImage:50',
\t\t\t\t\t\t\t\tlabel: '50%',
\t\t\t\t\t\t\t\tvalue: '50'
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tname: 'resizeImage:75',
\t\t\t\t\t\t\t\tlabel: '75%',
\t\t\t\t\t\t\t\tvalue: '75'
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t],
\t\t\t\t\t\t\ttoolbar: ['imageTextAlternative', 'toggleImageCaption', '|','imageStyle:inline', 'imageStyle:wrapText', 'imageStyle:breakText', 'imageStyle:side', '|','resizeImage' ],
\t\t\t\t\t\t\tinsert: {
\t\t\t\t\t\t\t\tintegrations: ['insertImageViaUrl']
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\tlist: {properties: {styles: false,startIndex: false,reversed: false}},
\t\t\t\t\t\t\tlink: {decorators: {addTargetToExternalLinks: true,
\t\t\t\t\t\t\t\t\t\t\tdefaultProtocol: 'https://',
\t\t\t\t\t\t\t\t\t\t\ttoggleDownloadable: { mode: 'manual',
\t\t\t\t\t\t\t\t\t\t\tlabel: 'Downloadable',attributes: {download: 'file'}
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\tstyle: {
\t\t\t\t\t\t\t\tdefinitions: [
\t\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\t\tname: 'Article category',
\t\t\t\t\t\t\t\t\t\telement: 'h3',
\t\t\t\t\t\t\t\t\t\tclasses: [ 'category' ]
\t\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\t\tname: 'Info box',
\t\t\t\t\t\t\t\t\t\telement: 'p',
\t\t\t\t\t\t\t\t\t\tclasses: [ 'info-box' ]
\t\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t]
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t})
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t.then( editor => {                                     
\t\t\t\t\t\t\t
\t\t\t\t\t\t\tif (formKey == 'pwc-create-pathway') {
\t                            editor.model.document.on('change:data', (evt, data) => {
\t                                const editorData = editor.getData();    
\t                                form.getComponent(cid).setValue(editorData);
\t                            });
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\telse if (formKey == 'pwc-section-details') {
\t                            editor.model.document.on('change:data', (evt, data) => {
\t                                const editorData = editor.getData();    
\t                                form.getComponent(cid).setValue(editorData);\t\t\t\t\t\t\t\t
\t                            });
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\telse if (formKey == 'pwc-sub-section-details') {
\t                            editor.model.document.on('change:data', (evt, data) => {
\t                                const editorData = editor.getData();    
\t                                form.getComponent(cid).setValue(editorData);\t\t\t\t\t\t\t\t
\t                            });
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\telse if (formKey == 'pwc-external-learning-object') {
\t                            editor.model.document.on('change:data', (evt, data) => {
\t                                const editorData = editor.getData();    
\t                                form.getComponent(cid).setValue(editorData);
\t\t\t\t\t\t\t\t\t//console.log('testing111', form.getComponent(cid).getValue());
\t                            });
\t\t\t\t\t\t\t}
\t\t\t\t\t\t})
\t\t\t\t\t\t.catch( error => {
\t\t\t\t\t\t\tconsole.error( error.stack );
\t\t\t\t\t\t});
\t\t\t\t\t}
\t\t\t\t\t}, 1000)
                
                /* ------ end ckeditor 5 -------*/
                    
                \tif(formKey == 'pwc-section-details') {
                \t\tvar pathwayId = \$('#formData').attr('pathwayId');
                \t\tvar pathwayIdCom = customForm.getComponent('pathwayId');\t\t\t\t\t\t
                \t\t\$('.formio-component-pathwayId').hide()
                \t\tpathwayIdCom.setValue(pathwayId)
\t\t\t\t\t\t
\t\t\t\t\t\t//\$('#sectiondetailsCancel').addClass('secondary-btn');
\t\t\t\t\t\t//\$('#submit').addClass('primary-btn');\t\t
\t\t\t\t\t\t\$('#sectiondetailsSectiontitle').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t
                \t}
                \telse if(formKey == 'pwc-sub-section-details') {
                \t\tvar pathwayId = \$('#formData').attr('pathwayId');
                \t\tvar sectionId = \$('#formData').attr('sectionId');
                \t\tvar pathwayIdCom = customForm.getComponent('pathwayId');
                \t\tvar sectionIdCom = customForm.getComponent('sectionId');
                \t\t\$('.formio-component-pathwayId').hide()
                \t\t\$('.formio-component-sectionId').hide()
                \t\tpathwayIdCom.setValue(pathwayId)
                \t\tsectionIdCom.setValue(sectionId)
\t\t\t\t\t\t
\t\t\t\t\t\t\$('#subSectiondetailsCancel').addClass('secondary-btn');
\t\t\t\t\t\t\$('#submit').addClass('primary-btn');
\t\t\t\t\t\t\$('#subSectiondetailsSubSectiontitle').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t
                \t}
                \telse if(formKey == 'pwc-external-learning-object') {
                \t\tvar pathwayId = \$('#formData').attr('pathwayId');
                \t\tvar sectionId = \$('#formData').attr('sectionId');
                \t\tvar pathwayIdCom = customForm.getComponent('pathwayId');
                \t\tvar sectionIdCom = customForm.getComponent('sectionId');
                \t\t\$('.formio-component-pathwayId').hide()
                \t\t\$('.formio-component-sectionId').hide()
                \t\tif(pathwayIdCom) {
                \t\t\tpathwayIdCom.setValue(pathwayId)
                \t\t\tsectionIdCom.setValue(sectionId)
                \t\t}
\t\t\t\t\t\t\$('#page1ExternalLearningObjectButtonCancel').addClass('secondary-btn');
\t\t\t\t\t\t\$('#submit').addClass('primary-btn');
\t\t\t\t\t\t
\t\t\t\t\t\t\$('.formio-component-loHours .control-label').removeClass('field-required');
\t\t\t\t\t\t\$('.formio-component-loMinutes .control-label').removeClass('field-required');
\t\t\t\t\t\t\$('.formio-component-loThumbnail .control-label').removeClass('field-required');
\t\t\t\t\t\t\$('.list-inline').css(\"display\",\"none\");
\t\t\t\t\t\t//\$('.pagination').css(\"display\",\"none\");
\t\t\t\t\t\t\$('.formio-component-loDescriptionRadio').css(\"display\",\"none\");
\t\t\t\t\t\t\$('.formio-component-loDescription2').css(\"display\",\"none\");
\t\t\t\t\t\t\$('.formio-component-page1ExternalLearningObject').removeClass('formsection');
\t\t\t\t\t\t
\t\t\t\t\t\tif(tpId == 1) {
\t\t\t\t\t\t  \$('.formio-component-thisMandatory').show();
\t\t\t\t\t\t  \$('.formio-component-page1ExternalLearningObjectContent4').show();
\t\t\t\t\t\t}else{
\t\t\t\t\t\t  \$('.formio-component-thisMandatory').hide();
\t\t\t\t\t\t  \$('.formio-component-page1ExternalLearningObjectContent4').hide();
\t\t\t\t\t\t}
\t\t\t\t\t\t\$('#loTitle').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t\$('#sourceUrl').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t\$('#loHours').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t\$('#loMinutes').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t\$('#loProvider').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t\$('.addToggle').find('label').addClass('switch')
\t\t\t\t\t\t\$('.addToggle').find('span').addClass('slider')\t
                        var toggleCom = ['formio-component-thisMandatory']
\t\t\t\t\t\tvar inct;
\t\t\t\t\t\tfor(inct = 0; inct < toggleCom.length; inct++) {
\t\t\t\t\t\t\tvar toggleMsg = \$('.'+toggleCom[inct]).find('.slider').text();
\t\t\t\t\t\t\t\$('.'+toggleCom[inct]).find('.slider').html(`<p>\${toggleMsg}</p>`)
\t\t\t\t\t\t}\t\t\t\t\t\t
\t\t\t\t\t
                \t}
\t\t\t\t\telse if(formKey == 'pwc-create-pathway') {

                \t\tvar pathwaySetting = ['A pathway with no branching or sequencing rules.', 
                \t\t\t\t\t\t\t'The admin gives the learner a choice between two branches at the section level.',
                \t\t\t\t\t\t\t'The admin requires the learner to complete the sections in a linear path.',
                \t\t\t\t\t\t\t'The admin specifies the number of sections the learner must complete in order to receive credit for the pathway.'];
\t\t\t\t\t\t\$('.formio-component-pathwayType').find('.form-group div').each(function(index) {
\t\t\t\t\t\t\t\$(this).addClass('mb-4');
\t\t\t\t\t\t\t \$(this).append(`<div class=\"pathway-type-desc\"> - \${pathwaySetting[index]}</div>`)
\t\t\t\t\t\t})

\t\t\t\t\t\t\$('.addToggle').find('label').addClass('switch')
\t\t\t\t\t\t\$('.addToggle').find('span').addClass('slider')

\t\t\t\t\t\tvar toggleCom = ['formio-component-pathwayAccreditation', 'formio-component-pathwaySearchRecom', 'formio-component-proedgeRecom', 'formio-component-proedgeRatingReview', 'formio-component-pathwaySearch', 'formio-component-displayProgress', 'formio-component-enableFilters', 'formio-component-contentType', 'formio-component-provider', 'formio-component-duration']
\t\t\t\t\t\tvar inct;
\t\t\t\t\t\tfor(inct = 0; inct < toggleCom.length; inct++) {
\t\t\t\t\t\t\tvar toggleMsg = \$('.'+toggleCom[inct]).find('.slider').text();
\t\t\t\t\t\t\t\$('.'+toggleCom[inct]).find('.slider').html(`<p>\${toggleMsg}</p>`)
\t\t\t\t\t\t}
\t\t\t\t\t\t
                \t}
                \t
                })
                
                form.on('submit', function (submission) {
\t\t\t\tform.submission.form = form.wizard !== undefined ? form.wizard._id : form._form._id;
                    form.submission.owner = form.wizard !== undefined ? form.wizard.owner : form._form.owner;
                    if (selected_value !== undefined && selected_value !== null) {
                        form.submission.submission_id = selected_value;
                    } else {
                        form.submission.submission_id = '';
                    } 
\t\t\t\t\t
\t\t\t\t\tif(formKey == 'pwc-create-pathway') {
\t\t\t\t\t\tvar filterIds = [];
\t\t\t\t\t\t\$('.customFilterShowRecord').each(function(i){
\t\t\t\t\t\t\tvar filId = \$(this).attr('filId');
\t\t\t\t\t\t\tvar filName = \$(this).attr('filName');
\t\t\t\t\t\t\tvar radioValue = \$(\"input[name='\"+filId+\"']:checked\").val();
\t\t\t\t\t\t\tif(!radioValue) {
\t\t\t\t\t\t\t\tradioValue = '0';
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\tvar filterData = {
\t\t\t\t\t\t\t\tid: filId,
\t\t\t\t\t\t\t\tname: filName,
\t\t\t\t\t\t\t\tvalue: radioValue
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\tfilterIds.push(filterData)
\t\t\t\t\t\t})

\t\t\t\t\t    \$.ajax({
\t\t\t\t\t\t\turl: '";
        // line 447
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("addPathwayData", ["lang" => ($context["lang"] ?? null)]), "html", null, true);
        echo "',
\t\t\t\t\t\t\ttype: 'POST',
\t\t\t\t\t\t\tdata: {data: submission, formKey: formKey, FORM_URL: FORM_URL, filterIds:filterIds},
\t\t\t\t\t\t\tsuccess: function success(response) {
\t\t\t\t\t\t\t  if (response.success) {
\t\t\t\t\t\t\t  \t\tformDataChanged = false;
\t\t\t\t\t\t\t\t   window.location.href = '";
        // line 453
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("taskList", ["lang" => ($context["lang"] ?? null)]), "html", null, true);
        echo "'
\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t   
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}               
\t\t\t\t\t\t});
\t\t\t\t\t
\t\t\t\t\t}

\t\t\t\t\tif(formKey == 'pwc-section-details') {

\t\t\t\t\t\tvar pathwayId = \$('#formData').attr('pathwayId');
\t\t\t\t\t
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\turl: '";
        // line 467
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("addSectionDetails", ["lang" => ($context["lang"] ?? null)]), "html", null, true);
        echo "',
\t\t\t\t\t\t\t\ttype: 'POST',
\t\t\t\t\t\t\t\tdata: {data: submission, formKey: formKey, FORM_URL: FORM_URL},
\t\t\t\t\t\t\t\tsuccess: function success(response) {
\t\t\t\t\t\t\t\t  if (response.success) {
\t\t\t\t\t\t\t\t  \t\tformDataChanged = false;
\t\t\t\t\t\t\t\t\t   window.location.href = '";
        // line 473
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("pathwayDetails", ["lang" => ($context["lang"] ?? null), "id" => ($context["pathwayId"] ?? null)]), "html", null, true);
        echo "'
\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t   
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}               
\t\t\t\t\t\t\t  });
\t\t\t\t\t\t  
\t\t\t\t\t}\t
\t\t\t\t\t
\t\t\t\t\tif(formKey == 'pwc-sub-section-details') {
\t\t\t\t\t
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\turl: '";
        // line 485
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("addSectionDetails", ["lang" => ($context["lang"] ?? null)]), "html", null, true);
        echo "',
\t\t\t\t\t\t\t\ttype: 'POST',
\t\t\t\t\t\t\t\tdata: {data: submission, formKey: formKey, FORM_URL: FORM_URL},
\t\t\t\t\t\t\t\tsuccess: function success(response) {
\t\t\t\t\t\t\t\t  if (response.success) {
\t\t\t\t\t\t\t\t  \t\tformDataChanged = false;
\t\t\t\t\t\t\t\t\t \twindow.location.href = '";
        // line 491
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("pathwayDetails", ["lang" => ($context["lang"] ?? null), "id" => ($context["pathwayId"] ?? null)]), "html", null, true);
        echo "'
\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t   
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}               
\t\t\t\t\t\t\t  });
\t\t\t\t\t\t  
\t\t\t\t\t}

\t\t\t\t\tif(formKey == 'pwc-external-learning-object') {
\t\t\t\t\t\t
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\turl: '";
        // line 503
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("addExternalLearning", ["lang" => ($context["lang"] ?? null)]), "html", null, true);
        echo "',
\t\t\t\t\t\t\t\ttype: 'POST',
\t\t\t\t\t\t\t\tdata: {data: submission, formKey: formKey, FORM_URL: FORM_URL, tpId:tpId},
\t\t\t\t\t\t\t\tsuccess: function success(response) {
\t\t\t\t\t\t\t\t  if (response.success) {
\t\t\t\t\t\t\t\t  \t\tformDataChanged = false;
\t\t\t\t\t\t\t\t\t \twindow.location.href = '";
        // line 509
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("pathwayDetails", ["lang" => ($context["lang"] ?? null), "id" => ($context["pathwayId"] ?? null)]), "html", null, true);
        echo "'
\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t   
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}               
\t\t\t\t\t\t\t  });
\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t
                      


\t\t\t\t\t
\t\t\t\t});
\t\t\t 
\t\t\t    
\t\t\t       
\t\t\t 
\t\t\t\t\t\t
\t\t\t});
\t\t\t
\t\t\t}
             
\t\t\t\$(document).on('click', '#editCustomFilter', function() {
\t\t\t\t\$('#customFilterName').val('')
\t\t\t\t\$('#customFilterId').val('')
        \t\tvar inc;
        \t\tvar customFilterValue = '';
        \t\t\$(\"#customFilterValueShow\").html(customFilterValue)
        \t\tfor(inc = 0; inc < 4; inc++) {
        \t\t\tvar numCount = inc+1;
        \t\t\tcustomFilterValue = `<div class=\"form-group\">
\t\t\t\t\t\t    <label for=\"customFilterValue\${numCount}\">Custom filter value \${numCount}</label>
\t\t\t\t\t\t    <input type=\"text\" class=\"form-control\" name=\"customFilterValue[]\" id=\"customFilterValue\${numCount}\" value=\"\" placeholder=\"Value\">
\t\t\t\t\t\t</div>`;
\t\t\t\t\t\$(\"#customFilterValueShow\").append(customFilterValue)
        \t\t}
\t\t\t\t\$('#customFilterModal').modal('show')
\t\t\t})

\t\t\t\$(document).on('click', '#addAdditionalValue', function() {
\t            var inc = 0;
\t            \$('#customFilterValueShow div').each(function(index) {
\t                inc++;
\t            })
\t            var numCount = inc+1;
\t            var customFilterValue = `<div class=\"form-group\">
\t                        <label for=\"customFilterValue\${numCount}\">Custom filter value \${numCount}</label>
\t                        <input type=\"text\" class=\"form-control\" name=\"customFilterValue[]\" id=\"customFilterValue\${numCount}\" value=\"\" placeholder=\"Value\">
\t                    </div>`;
\t            \$(\"#customFilterValueShow\").append(customFilterValue)
\t        })
\t         
\t        \$( \"#customFormSubmit\" ).submit(function( event ) {
\t\t\t  \tevent.preventDefault();

\t\t\t    var form = \$(this);
\t\t\t    var actionUrl = '";
        // line 565
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("saveCustomFilter"), "html", null, true);
        echo "';
\t\t\t    
\t\t\t    \$.ajax({
\t\t\t        type: \"POST\",
\t\t\t        url: actionUrl,
\t\t\t        data: form.serialize(), // serializes the form's elements.
\t\t\t        success: function(data)
\t\t\t        {
\t\t\t          if(data.success) {
\t\t\t          \tvar customFilterName = data.customFilterName;
\t\t\t          \tvar insertedId = JSON.stringify(data.insertedId);
\t\t\t          \tinsertedId = insertedId.split('\"');
\t\t\t          \tinsertedId = insertedId[3]
\t\t\t          \tif(data.mode == \"add\") {
\t\t\t\t          \tvar showData = `
\t\t\t\t          \t\t<div class=\"customFilterShowRecord\" id=\"cfilter-\${insertedId}\" filId=\"\${insertedId}\" filName=\"\${customFilterName}\">
\t\t\t\t          \t\t\t<label class=\"control-label form-check-label switch cus-filter-pathway\">
\t\t\t\t          \t\t\t\t<input type=\"checkbox\" name=\"\${insertedId}\" value=\"1\" checked>
\t\t\t\t          \t\t\t\t<span class=\"slider\">
\t\t\t\t          \t\t\t\t\t<p id=\"fil-\${insertedId}\">\${customFilterName}</p>
\t\t\t\t          \t\t\t\t</span>
\t\t\t\t          \t\t\t</label>
\t\t\t\t          \t\t\t<a class=\"editCustomFilter\" filterId=\"\${insertedId}\"> <i class=\"edit-btnbar\"></i> Edit</a> 
\t\t\t\t          \t\t\t<a class=\"deleteCustomFilter\" filterId=\"\${insertedId}\"> <i class=\"delete-btnbar\"></i> Delete</a>
\t\t\t\t          \t\t<div>`;
\t\t\t\t          \t\$('#showCustomFilterDiv').append(showData);
\t\t\t          \t}
\t\t\t          \telse {
\t\t\t          \t\t\$('#fil-'+insertedId).html(customFilterName);
\t\t\t          \t}
\t\t\t          \tform[0].reset()
\t\t\t          \t\$('.close').trigger('click')
\t\t\t          }
\t\t\t        }
\t\t\t    });
\t\t\t});

\t\t\t\$(document).on('click', '.editCustomFilter', function() {

\t\t\t\tvar filterId = \$(this).attr('filterId')
\t\t\t\tvar actionUrl = '";
        // line 605
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("getCustomFilter"), "html", null, true);
        echo "';
\t\t\t\t\$.ajax({
\t\t\t        type: \"POST\",
\t\t\t        url: actionUrl,
\t\t\t        data: {filterId:filterId},
\t\t\t        success: function(data)
\t\t\t        {
\t\t\t        \tif(data.success) {
\t\t\t        \t\tvar filterValues = data.filterData.customFilterValue;
\t\t\t        \t\t\$('#customFilterName').val(data.filterData.customFilterName)
\t\t\t        \t\t\$('#customFilterId').val(filterId);
\t\t\t        \t\t
\t\t\t        \t\tvar inc;
\t\t\t        \t\tvar customFilterValue = '';
\t\t\t        \t\t\$(\"#customFilterValueShow\").html(customFilterValue)
\t\t\t        \t\tfor(inc = 0; inc < filterValues.length; inc++) {
\t\t\t        \t\t\tvar numCount = inc+1;
\t\t\t        \t\t\tcustomFilterValue = `<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t    <label for=\"customFilterValue\${numCount}\">Custom filter value \${numCount}</label>
\t\t\t\t\t\t\t\t\t    <input type=\"text\" class=\"form-control\" name=\"customFilterValue[]\" id=\"customFilterValue\${numCount}\" value=\"\${filterValues[inc]}\" placeholder=\"Value\">
\t\t\t\t\t\t\t\t\t</div>`;
\t\t\t\t\t\t\t\t\$(\"#customFilterValueShow\").append(customFilterValue)
\t\t\t        \t\t}
\t\t\t        \t\t
\t\t\t        \t\t\$('#customFilterModal').modal('show')
\t\t\t        \t}
\t\t\t        }
\t\t\t    })
\t\t\t\t
\t\t\t})

\t\t\t\$(document).on('click', '.deleteCustomFilter', function() {
\t\t\t\tif(confirm(\"Are you sure to delete the custom filter!\")) {
\t\t\t\t\tvar filterId = \$(this).attr('filterId');
\t\t\t\t\t\$(\"#cfilter-\"+filterId).remove();
\t\t\t\t}
\t\t\t})

\t\t\t\$(document).on('click', 'button.back-btn', function(e){
\t\t\t    e.preventDefault();
\t\t\t    window.history.back();
\t\t\t});
\t\t\t
\t\t\t
\t\t\t\t
\t  </script>

";
    }

    // line 653
    public function block_scriptBlock($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 654
        echo "    
";
    }

    public function getTemplateName()
    {
        return "Org_1/Home/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  784 => 654,  780 => 653,  728 => 605,  685 => 565,  626 => 509,  617 => 503,  602 => 491,  593 => 485,  578 => 473,  569 => 467,  552 => 453,  543 => 447,  196 => 103,  189 => 99,  185 => 98,  181 => 97,  172 => 95,  119 => 44,  113 => 41,  111 => 40,  105 => 36,  103 => 35,  97 => 31,  95 => 30,  89 => 26,  87 => 25,  78 => 18,  71 => 15,  67 => 13,  65 => 12,  57 => 8,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'Org_1/Layout/app_home.twig' %}

{% block content %}   
   <!-- <div class=\"connectmid-sec darkblue-bg\">
\t<nav aria-label=\"breadcrumb\" class=\"nav-bread breadcrump-click-stream\">
\t\t<ol class=\"breadcrumb breadcrumbCustom\">
\t\t\t<li class=\"breadcrumb-item \">
\t\t\t\t<a href=\"{{constant('HTTP_SERVER')}}{{lang}}\">Home</a>
\t\t\t\t<img class=\"breadcrumbIconbtn\" alt=\"breadcrumbIcon\"/>
\t\t\t</li>

                {% if (formKey != 'help' and formKey != 'home-banner') %}

                <li class=\"breadcrumb-item\">
\t\t\t\t<a href=\"{{path_for('taskList', {lang: lang})}}\">Pathway List (s)</a>
\t\t\t\t<img class=\"breadcrumbIconbtn\" alt=\"breadcrumbIcon\"/>
\t\t\t</li>
                {%endif%}              
                
            </ol>
\t</nav>
</div> -->

<div class=\"formsection\">
\t\t{% if (formKey == 'pwc-create-pathway') %}
\t\t\t<div>
\t\t\t\t<h1 class=\"headingbar\">Create pathway</h1>
\t\t\t\t<span class=\"field-required\">Required information</span>
\t\t\t</div>
\t\t{% elseif (formKey == 'pwc-section-details') %}
\t\t\t<div class=\"mb-32\">
\t\t\t\t<h1 class=\"headingbar\">Add section</h1>
\t\t\t\t<span class=\"field-required\">Required information</span>
\t\t\t</div>
\t\t{% elseif (formKey == 'pwc-sub-section-details') %}
\t\t\t<div class=\"mb-32\">
\t\t\t\t<h1 class=\"headingbar\">Add subsection</h1>
\t\t\t\t<span class=\"field-required\">Required information</span>
\t\t\t</div>
\t\t{% elseif (formKey == 'pwc-external-learning-object') %}
\t\t\t<div class=\"mb-32\">
\t\t\t\t<h1 class=\"headingbar\"> Add learning item</h1>
\t\t\t</div>
\t\t{%endif%}  
      <div id=\"formio-id\" class=\"request-custom-form\"/></div>
</div>

<footer>
    <div class=\"footersection\">
        <p>©2023 PwC. All rights reserved. PwC refers to the US member firm of the PwC network or one of Its subsidiaries or affiliates.</p>

        <ul>
            <li><a href=\"#\"> Help Center </a></li>
            <li><a href=\"#\"> Privacy Policy</a></li>
            <li><a href=\"#\"> Cookie Notice</a></li>
            <li><a href=\"#\"> Terms & Conditions</a></li>            
        </ul>
    </div>
</footer>

<!-- add custom filter popup -->

<div class=\"modal fade\" id=\"customFilterModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"customFilterModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"customFilterLabel\">Edit custom filter</h5>
        <button type=\"button\" class=\"close\" data-bs-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <form id=\"customFormSubmit\" type=\"post\">
\t      <div class=\"modal-body\">
\t\t\t  <div class=\"form-group\">
\t\t\t    <label for=\"customFilterName\">Custom filter name</label>
\t\t\t    <input type=\"text\" class=\"form-control\" name=\"customFilterName\" id=\"customFilterName\" placeholder=\"Example Priority\">
\t\t\t  </div>
\t\t\t  <input type=\"hidden\" name=\"customFilterId\" id=\"customFilterId\">
\t\t\t  <div id=\"customFilterValueShow\">
\t\t\t\t  
\t\t\t  </div>
\t\t\t  <a id=\"addAdditionalValue\">+ Add additional value</a>
\t      </div>
\t      <div class=\"modal-footer\">
\t        <button type=\"button\" class=\"cancelbtn\" data-bs-dismiss=\"modal\">Close</button>
\t        <button type=\"submit\" class=\"publishbtn\">Save changes</button>
\t      </div>
      </form>
    </div>
  </div>
</div>

<!-- add custom filter popup -->

<span id=\"formData\" pathwayId=\"{{pathwayId}}\" sectionId=\"{{sectionId}}\" HTTP_REFERER={{HTTP_REFERER}} mongoId=\"\"></span>
<script>
\t  var FORM_URL = '{{FORM_URL}}';
      var form_id = '{{form_id}}';
      var formKey = '{{formKey}}';
      var customForm = ''; 
      var formsaveddata='';
      var formDataChanged = false;
\t  var tpId = '{{type_id}}';
      
\t        window.onload = function () {
\t        \t\$(\"#home-loader-overlay\").show();
\t        \twindow.addEventListener(\"beforeunload\", function (e) {
\t\t\t        var confirmationMessage = 'It looks like you have been editing something. If you leave before saving, your changes will be lost.';
\t\t\t        if(typeof(formDataChanged)!='undefined' && formDataChanged){
\t\t\t            (e || window.event).returnValue = confirmationMessage; //Gecko + IE
\t\t\t            return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
\t\t\t        }
\t\t\t    });
                loadForm(null, null);
            };
\t\t\t 
\t\t\tfunction loadForm(form_data, selected_value) {
                Formio.createForm(document.getElementById('formio-id'), FORM_URL, {
                    noAlerts: false,
                    hooks: {
                        beforeSubmit: function (submission, next) {
                            \$('.btn').prop('disabled', true);
                            var message = [];
                            var error = false;
                            setTimeout(function () {
                                
                                if (error) {
                                    \$('.btn').prop('disabled', false);
                                    next(message);
                                } else {
                                    next();
                                }
                            }, 10);
                        }
                    }
                }).then(function (form) {
                customForm = form;\t
                form.loading = false;
                form.nosubmit = true;
                form.submitMessage = '';


                
                \t\t
                form.on('change', function (changed) {

                \t/////////////////------------page on load  finished - on change start ---------------------//
\t\t            // check if saved data is different 
\t\t            if(form.loading==false && formsaveddata==''){
\t\t                formsaveddata=JSON.stringify(form.submission.data);
\t\t            }\t\t\t
\t\t            if(formsaveddata != JSON.stringify(form.submission.data)){
\t\t                formDataChanged =true;  
\t\t            }else if(formsaveddata == JSON.stringify(form.submission.data)){
\t\t                formDataChanged =false; 
\t\t            }  
\t\t            ///////////////----------------on change end -----------------//

                    \$(\".control-label--hidden\").replaceWith('<label class=\"control-label control-label--hidden\" style=\"display:none;\">control-label</label>');
\t\t\t\t\t//tab code start
\t\t\t\t\t\$('.pagination .page-item').each(function(i){
\t\t\t\t\t\tvar text = \$(this).text();\t\t\t\t\t\t
\t\t\t\t\t\tif(text == 'Proedge catalog'){
\t\t\t\t\t\t   \$(this).addClass('proedge_catalog');
\t\t\t\t\t\t}
\t\t\t\t\t\tif(text == 'External content'){
\t\t\t\t\t\t   \$(this).addClass('external_content');
\t\t\t\t\t\t}
\t\t\t\t\t\tif(text == 'Custom filter'){
\t\t\t\t\t\t   \$(this).addClass('pwc_settings');
\t\t\t\t\t\t   
\t\t\t\t\t\t}
\t\t\t\t\t   
\t\t\t\t\t});
                    //\$('.page-item').removeClass('active');\t\t\t\t\t
\t\t\t\t\t\$('.pwc_settings').hide()
\t\t\t\t\t\$(\".btn-wizard-nav-cancel\").hide();
\t\t\t\t\t\$(\".btn-wizard-nav-next\").hide();
\t\t\t\t\t
\t\t\t\t\t
                //tab code end
\t\t\t\t\t
                });
\t\t\t\t
\t\t\t\t
\t\t\t       
\t\t\t      

                form.on('render', function () {
\t\t\t\t/* ----- start ckeditor 5 ------*/
                var cid = '';
                if (formKey == 'pwc-create-pathway') {

                \tchangeComponentDynamicURL(form,'pathwayAvailability','get-field-master-data');
                \tchangeComponentDynamicURL(form,'pathwayLevel','get-field-master-data');
                \tchangeComponentDynamicURL(form,'pathwaySkills','get-skills-data');

                \tcid = 'pathwayDescription';
                }
\t\t\t\telse if (formKey == 'pwc-section-details') {
                \tcid = 'sectiondetailsDescription';
                }
\t\t\t\telse if (formKey == 'pwc-sub-section-details') {
                \tcid = 'subSectiondetailsDescription';
                }
\t\t\t\telse if (formKey == 'pwc-external-learning-object') {

\t\t\t\t\tchangeComponentDynamicURL(form,'loContentType','get-field-master-data');
\t\t\t\t\tchangeComponentDynamicURL(form,'loLevel','get-field-master-data');
\t\t\t\t\tsetTimeout(function() {
\t\t\t\t\t\tif(\$('.external_content').hasClass('active')) {
\t\t\t\t\t\t\tcid = 'loDescription';
\t\t\t\t\t\t}
\t\t\t\t\t}, 100)
\t\t\t\t\t
                }


\t\t\t\t
\t\t\t\t
                setTimeout(function() {
\t                if(cid) {
\t                ClassicEditor
\t\t\t\t\t\t// Note that you do not have to specify the plugin and toolbar configuration — using defaults from the build.
\t\t\t\t\t\t.create( document.querySelector( '#'+cid ) , {
\t\t\t\t\t\t\t// https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t// 'style' is pending
\t\t\t\t\t\t\t// Removed 'fontSize',
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\ttoolbar: {                                                                              
\t\t\t\t\t\t\t  items: ['bold', 'italic', 'strikethrough', 'underline', 'RemoveFormat', '|','numberedList','bulletedList', 'todoList', '|','outdent', 'indent','blockQuote', 'alignment','|','link', 'horizontalLine','specialCharacters','|', '|','heading','|',    '|','-','fontSize', 'fontColor','|', 'SelectAll', 'findAndReplace', 'wproofreader', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '|','sourceEditing','undo', 'redo'], 
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t//,'highlight', 'fontColor', 'fontBackgroundColor', 'insertImage', 'insertTable'
\t\t\t\t\t\t\t //items: ['bold', 'italic', 'strikethrough', 'underline', '|','numberedList','bulletedList','|','link','|','sourceEditing'],
\t\t\t\t\t\t\tshouldNotGroupWhenFull: true
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t                                                                            htmlEmbed: {showPreviews: true },
\t\t\t\t\t\t\timage: {styles: ['alignCenter', 'alignLeft','alignRight'],
\t\t\t\t\t\t\tresizeOptions: [
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tname: 'resizeImage:original',
\t\t\t\t\t\t\t\tlabel: 'Original',
\t\t\t\t\t\t\t\tvalue: null
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tname: 'resizeImage:50',
\t\t\t\t\t\t\t\tlabel: '50%',
\t\t\t\t\t\t\t\tvalue: '50'
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tname: 'resizeImage:75',
\t\t\t\t\t\t\t\tlabel: '75%',
\t\t\t\t\t\t\t\tvalue: '75'
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t],
\t\t\t\t\t\t\ttoolbar: ['imageTextAlternative', 'toggleImageCaption', '|','imageStyle:inline', 'imageStyle:wrapText', 'imageStyle:breakText', 'imageStyle:side', '|','resizeImage' ],
\t\t\t\t\t\t\tinsert: {
\t\t\t\t\t\t\t\tintegrations: ['insertImageViaUrl']
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\tlist: {properties: {styles: false,startIndex: false,reversed: false}},
\t\t\t\t\t\t\tlink: {decorators: {addTargetToExternalLinks: true,
\t\t\t\t\t\t\t\t\t\t\tdefaultProtocol: 'https://',
\t\t\t\t\t\t\t\t\t\t\ttoggleDownloadable: { mode: 'manual',
\t\t\t\t\t\t\t\t\t\t\tlabel: 'Downloadable',attributes: {download: 'file'}
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\tstyle: {
\t\t\t\t\t\t\t\tdefinitions: [
\t\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\t\tname: 'Article category',
\t\t\t\t\t\t\t\t\t\telement: 'h3',
\t\t\t\t\t\t\t\t\t\tclasses: [ 'category' ]
\t\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\t\tname: 'Info box',
\t\t\t\t\t\t\t\t\t\telement: 'p',
\t\t\t\t\t\t\t\t\t\tclasses: [ 'info-box' ]
\t\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t]
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t})
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t.then( editor => {                                     
\t\t\t\t\t\t\t
\t\t\t\t\t\t\tif (formKey == 'pwc-create-pathway') {
\t                            editor.model.document.on('change:data', (evt, data) => {
\t                                const editorData = editor.getData();    
\t                                form.getComponent(cid).setValue(editorData);
\t                            });
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\telse if (formKey == 'pwc-section-details') {
\t                            editor.model.document.on('change:data', (evt, data) => {
\t                                const editorData = editor.getData();    
\t                                form.getComponent(cid).setValue(editorData);\t\t\t\t\t\t\t\t
\t                            });
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\telse if (formKey == 'pwc-sub-section-details') {
\t                            editor.model.document.on('change:data', (evt, data) => {
\t                                const editorData = editor.getData();    
\t                                form.getComponent(cid).setValue(editorData);\t\t\t\t\t\t\t\t
\t                            });
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\telse if (formKey == 'pwc-external-learning-object') {
\t                            editor.model.document.on('change:data', (evt, data) => {
\t                                const editorData = editor.getData();    
\t                                form.getComponent(cid).setValue(editorData);
\t\t\t\t\t\t\t\t\t//console.log('testing111', form.getComponent(cid).getValue());
\t                            });
\t\t\t\t\t\t\t}
\t\t\t\t\t\t})
\t\t\t\t\t\t.catch( error => {
\t\t\t\t\t\t\tconsole.error( error.stack );
\t\t\t\t\t\t});
\t\t\t\t\t}
\t\t\t\t\t}, 1000)
                
                /* ------ end ckeditor 5 -------*/
                    
                \tif(formKey == 'pwc-section-details') {
                \t\tvar pathwayId = \$('#formData').attr('pathwayId');
                \t\tvar pathwayIdCom = customForm.getComponent('pathwayId');\t\t\t\t\t\t
                \t\t\$('.formio-component-pathwayId').hide()
                \t\tpathwayIdCom.setValue(pathwayId)
\t\t\t\t\t\t
\t\t\t\t\t\t//\$('#sectiondetailsCancel').addClass('secondary-btn');
\t\t\t\t\t\t//\$('#submit').addClass('primary-btn');\t\t
\t\t\t\t\t\t\$('#sectiondetailsSectiontitle').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t
                \t}
                \telse if(formKey == 'pwc-sub-section-details') {
                \t\tvar pathwayId = \$('#formData').attr('pathwayId');
                \t\tvar sectionId = \$('#formData').attr('sectionId');
                \t\tvar pathwayIdCom = customForm.getComponent('pathwayId');
                \t\tvar sectionIdCom = customForm.getComponent('sectionId');
                \t\t\$('.formio-component-pathwayId').hide()
                \t\t\$('.formio-component-sectionId').hide()
                \t\tpathwayIdCom.setValue(pathwayId)
                \t\tsectionIdCom.setValue(sectionId)
\t\t\t\t\t\t
\t\t\t\t\t\t\$('#subSectiondetailsCancel').addClass('secondary-btn');
\t\t\t\t\t\t\$('#submit').addClass('primary-btn');
\t\t\t\t\t\t\$('#subSectiondetailsSubSectiontitle').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t
                \t}
                \telse if(formKey == 'pwc-external-learning-object') {
                \t\tvar pathwayId = \$('#formData').attr('pathwayId');
                \t\tvar sectionId = \$('#formData').attr('sectionId');
                \t\tvar pathwayIdCom = customForm.getComponent('pathwayId');
                \t\tvar sectionIdCom = customForm.getComponent('sectionId');
                \t\t\$('.formio-component-pathwayId').hide()
                \t\t\$('.formio-component-sectionId').hide()
                \t\tif(pathwayIdCom) {
                \t\t\tpathwayIdCom.setValue(pathwayId)
                \t\t\tsectionIdCom.setValue(sectionId)
                \t\t}
\t\t\t\t\t\t\$('#page1ExternalLearningObjectButtonCancel').addClass('secondary-btn');
\t\t\t\t\t\t\$('#submit').addClass('primary-btn');
\t\t\t\t\t\t
\t\t\t\t\t\t\$('.formio-component-loHours .control-label').removeClass('field-required');
\t\t\t\t\t\t\$('.formio-component-loMinutes .control-label').removeClass('field-required');
\t\t\t\t\t\t\$('.formio-component-loThumbnail .control-label').removeClass('field-required');
\t\t\t\t\t\t\$('.list-inline').css(\"display\",\"none\");
\t\t\t\t\t\t//\$('.pagination').css(\"display\",\"none\");
\t\t\t\t\t\t\$('.formio-component-loDescriptionRadio').css(\"display\",\"none\");
\t\t\t\t\t\t\$('.formio-component-loDescription2').css(\"display\",\"none\");
\t\t\t\t\t\t\$('.formio-component-page1ExternalLearningObject').removeClass('formsection');
\t\t\t\t\t\t
\t\t\t\t\t\tif(tpId == 1) {
\t\t\t\t\t\t  \$('.formio-component-thisMandatory').show();
\t\t\t\t\t\t  \$('.formio-component-page1ExternalLearningObjectContent4').show();
\t\t\t\t\t\t}else{
\t\t\t\t\t\t  \$('.formio-component-thisMandatory').hide();
\t\t\t\t\t\t  \$('.formio-component-page1ExternalLearningObjectContent4').hide();
\t\t\t\t\t\t}
\t\t\t\t\t\t\$('#loTitle').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t\$('#sourceUrl').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t\$('#loHours').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t\$('#loMinutes').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t\$('#loProvider').attr( 'autocomplete', 'off' );
\t\t\t\t\t\t\$('.addToggle').find('label').addClass('switch')
\t\t\t\t\t\t\$('.addToggle').find('span').addClass('slider')\t
                        var toggleCom = ['formio-component-thisMandatory']
\t\t\t\t\t\tvar inct;
\t\t\t\t\t\tfor(inct = 0; inct < toggleCom.length; inct++) {
\t\t\t\t\t\t\tvar toggleMsg = \$('.'+toggleCom[inct]).find('.slider').text();
\t\t\t\t\t\t\t\$('.'+toggleCom[inct]).find('.slider').html(`<p>\${toggleMsg}</p>`)
\t\t\t\t\t\t}\t\t\t\t\t\t
\t\t\t\t\t
                \t}
\t\t\t\t\telse if(formKey == 'pwc-create-pathway') {

                \t\tvar pathwaySetting = ['A pathway with no branching or sequencing rules.', 
                \t\t\t\t\t\t\t'The admin gives the learner a choice between two branches at the section level.',
                \t\t\t\t\t\t\t'The admin requires the learner to complete the sections in a linear path.',
                \t\t\t\t\t\t\t'The admin specifies the number of sections the learner must complete in order to receive credit for the pathway.'];
\t\t\t\t\t\t\$('.formio-component-pathwayType').find('.form-group div').each(function(index) {
\t\t\t\t\t\t\t\$(this).addClass('mb-4');
\t\t\t\t\t\t\t \$(this).append(`<div class=\"pathway-type-desc\"> - \${pathwaySetting[index]}</div>`)
\t\t\t\t\t\t})

\t\t\t\t\t\t\$('.addToggle').find('label').addClass('switch')
\t\t\t\t\t\t\$('.addToggle').find('span').addClass('slider')

\t\t\t\t\t\tvar toggleCom = ['formio-component-pathwayAccreditation', 'formio-component-pathwaySearchRecom', 'formio-component-proedgeRecom', 'formio-component-proedgeRatingReview', 'formio-component-pathwaySearch', 'formio-component-displayProgress', 'formio-component-enableFilters', 'formio-component-contentType', 'formio-component-provider', 'formio-component-duration']
\t\t\t\t\t\tvar inct;
\t\t\t\t\t\tfor(inct = 0; inct < toggleCom.length; inct++) {
\t\t\t\t\t\t\tvar toggleMsg = \$('.'+toggleCom[inct]).find('.slider').text();
\t\t\t\t\t\t\t\$('.'+toggleCom[inct]).find('.slider').html(`<p>\${toggleMsg}</p>`)
\t\t\t\t\t\t}
\t\t\t\t\t\t
                \t}
                \t
                })
                
                form.on('submit', function (submission) {
\t\t\t\tform.submission.form = form.wizard !== undefined ? form.wizard._id : form._form._id;
                    form.submission.owner = form.wizard !== undefined ? form.wizard.owner : form._form.owner;
                    if (selected_value !== undefined && selected_value !== null) {
                        form.submission.submission_id = selected_value;
                    } else {
                        form.submission.submission_id = '';
                    } 
\t\t\t\t\t
\t\t\t\t\tif(formKey == 'pwc-create-pathway') {
\t\t\t\t\t\tvar filterIds = [];
\t\t\t\t\t\t\$('.customFilterShowRecord').each(function(i){
\t\t\t\t\t\t\tvar filId = \$(this).attr('filId');
\t\t\t\t\t\t\tvar filName = \$(this).attr('filName');
\t\t\t\t\t\t\tvar radioValue = \$(\"input[name='\"+filId+\"']:checked\").val();
\t\t\t\t\t\t\tif(!radioValue) {
\t\t\t\t\t\t\t\tradioValue = '0';
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\tvar filterData = {
\t\t\t\t\t\t\t\tid: filId,
\t\t\t\t\t\t\t\tname: filName,
\t\t\t\t\t\t\t\tvalue: radioValue
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\tfilterIds.push(filterData)
\t\t\t\t\t\t})

\t\t\t\t\t    \$.ajax({
\t\t\t\t\t\t\turl: '{{path_for('addPathwayData',{lang: lang})}}',
\t\t\t\t\t\t\ttype: 'POST',
\t\t\t\t\t\t\tdata: {data: submission, formKey: formKey, FORM_URL: FORM_URL, filterIds:filterIds},
\t\t\t\t\t\t\tsuccess: function success(response) {
\t\t\t\t\t\t\t  if (response.success) {
\t\t\t\t\t\t\t  \t\tformDataChanged = false;
\t\t\t\t\t\t\t\t   window.location.href = '{{path_for('taskList', {lang: lang})}}'
\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t   
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}               
\t\t\t\t\t\t});
\t\t\t\t\t
\t\t\t\t\t}

\t\t\t\t\tif(formKey == 'pwc-section-details') {

\t\t\t\t\t\tvar pathwayId = \$('#formData').attr('pathwayId');
\t\t\t\t\t
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\turl: '{{path_for('addSectionDetails', {lang: lang})}}',
\t\t\t\t\t\t\t\ttype: 'POST',
\t\t\t\t\t\t\t\tdata: {data: submission, formKey: formKey, FORM_URL: FORM_URL},
\t\t\t\t\t\t\t\tsuccess: function success(response) {
\t\t\t\t\t\t\t\t  if (response.success) {
\t\t\t\t\t\t\t\t  \t\tformDataChanged = false;
\t\t\t\t\t\t\t\t\t   window.location.href = '{{path_for('pathwayDetails', {lang: lang, id:pathwayId})}}'
\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t   
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}               
\t\t\t\t\t\t\t  });
\t\t\t\t\t\t  
\t\t\t\t\t}\t
\t\t\t\t\t
\t\t\t\t\tif(formKey == 'pwc-sub-section-details') {
\t\t\t\t\t
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\turl: '{{path_for('addSectionDetails', {lang: lang})}}',
\t\t\t\t\t\t\t\ttype: 'POST',
\t\t\t\t\t\t\t\tdata: {data: submission, formKey: formKey, FORM_URL: FORM_URL},
\t\t\t\t\t\t\t\tsuccess: function success(response) {
\t\t\t\t\t\t\t\t  if (response.success) {
\t\t\t\t\t\t\t\t  \t\tformDataChanged = false;
\t\t\t\t\t\t\t\t\t \twindow.location.href = '{{path_for('pathwayDetails', {lang: lang, id:pathwayId})}}'
\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t   
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}               
\t\t\t\t\t\t\t  });
\t\t\t\t\t\t  
\t\t\t\t\t}

\t\t\t\t\tif(formKey == 'pwc-external-learning-object') {
\t\t\t\t\t\t
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\turl: '{{path_for('addExternalLearning', {lang: lang})}}',
\t\t\t\t\t\t\t\ttype: 'POST',
\t\t\t\t\t\t\t\tdata: {data: submission, formKey: formKey, FORM_URL: FORM_URL, tpId:tpId},
\t\t\t\t\t\t\t\tsuccess: function success(response) {
\t\t\t\t\t\t\t\t  if (response.success) {
\t\t\t\t\t\t\t\t  \t\tformDataChanged = false;
\t\t\t\t\t\t\t\t\t \twindow.location.href = '{{path_for('pathwayDetails', {lang: lang, id:pathwayId})}}'
\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t   
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}               
\t\t\t\t\t\t\t  });
\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t
                      


\t\t\t\t\t
\t\t\t\t});
\t\t\t 
\t\t\t    
\t\t\t       
\t\t\t 
\t\t\t\t\t\t
\t\t\t});
\t\t\t
\t\t\t}
             
\t\t\t\$(document).on('click', '#editCustomFilter', function() {
\t\t\t\t\$('#customFilterName').val('')
\t\t\t\t\$('#customFilterId').val('')
        \t\tvar inc;
        \t\tvar customFilterValue = '';
        \t\t\$(\"#customFilterValueShow\").html(customFilterValue)
        \t\tfor(inc = 0; inc < 4; inc++) {
        \t\t\tvar numCount = inc+1;
        \t\t\tcustomFilterValue = `<div class=\"form-group\">
\t\t\t\t\t\t    <label for=\"customFilterValue\${numCount}\">Custom filter value \${numCount}</label>
\t\t\t\t\t\t    <input type=\"text\" class=\"form-control\" name=\"customFilterValue[]\" id=\"customFilterValue\${numCount}\" value=\"\" placeholder=\"Value\">
\t\t\t\t\t\t</div>`;
\t\t\t\t\t\$(\"#customFilterValueShow\").append(customFilterValue)
        \t\t}
\t\t\t\t\$('#customFilterModal').modal('show')
\t\t\t})

\t\t\t\$(document).on('click', '#addAdditionalValue', function() {
\t            var inc = 0;
\t            \$('#customFilterValueShow div').each(function(index) {
\t                inc++;
\t            })
\t            var numCount = inc+1;
\t            var customFilterValue = `<div class=\"form-group\">
\t                        <label for=\"customFilterValue\${numCount}\">Custom filter value \${numCount}</label>
\t                        <input type=\"text\" class=\"form-control\" name=\"customFilterValue[]\" id=\"customFilterValue\${numCount}\" value=\"\" placeholder=\"Value\">
\t                    </div>`;
\t            \$(\"#customFilterValueShow\").append(customFilterValue)
\t        })
\t         
\t        \$( \"#customFormSubmit\" ).submit(function( event ) {
\t\t\t  \tevent.preventDefault();

\t\t\t    var form = \$(this);
\t\t\t    var actionUrl = '{{path_for('saveCustomFilter')}}';
\t\t\t    
\t\t\t    \$.ajax({
\t\t\t        type: \"POST\",
\t\t\t        url: actionUrl,
\t\t\t        data: form.serialize(), // serializes the form's elements.
\t\t\t        success: function(data)
\t\t\t        {
\t\t\t          if(data.success) {
\t\t\t          \tvar customFilterName = data.customFilterName;
\t\t\t          \tvar insertedId = JSON.stringify(data.insertedId);
\t\t\t          \tinsertedId = insertedId.split('\"');
\t\t\t          \tinsertedId = insertedId[3]
\t\t\t          \tif(data.mode == \"add\") {
\t\t\t\t          \tvar showData = `
\t\t\t\t          \t\t<div class=\"customFilterShowRecord\" id=\"cfilter-\${insertedId}\" filId=\"\${insertedId}\" filName=\"\${customFilterName}\">
\t\t\t\t          \t\t\t<label class=\"control-label form-check-label switch cus-filter-pathway\">
\t\t\t\t          \t\t\t\t<input type=\"checkbox\" name=\"\${insertedId}\" value=\"1\" checked>
\t\t\t\t          \t\t\t\t<span class=\"slider\">
\t\t\t\t          \t\t\t\t\t<p id=\"fil-\${insertedId}\">\${customFilterName}</p>
\t\t\t\t          \t\t\t\t</span>
\t\t\t\t          \t\t\t</label>
\t\t\t\t          \t\t\t<a class=\"editCustomFilter\" filterId=\"\${insertedId}\"> <i class=\"edit-btnbar\"></i> Edit</a> 
\t\t\t\t          \t\t\t<a class=\"deleteCustomFilter\" filterId=\"\${insertedId}\"> <i class=\"delete-btnbar\"></i> Delete</a>
\t\t\t\t          \t\t<div>`;
\t\t\t\t          \t\$('#showCustomFilterDiv').append(showData);
\t\t\t          \t}
\t\t\t          \telse {
\t\t\t          \t\t\$('#fil-'+insertedId).html(customFilterName);
\t\t\t          \t}
\t\t\t          \tform[0].reset()
\t\t\t          \t\$('.close').trigger('click')
\t\t\t          }
\t\t\t        }
\t\t\t    });
\t\t\t});

\t\t\t\$(document).on('click', '.editCustomFilter', function() {

\t\t\t\tvar filterId = \$(this).attr('filterId')
\t\t\t\tvar actionUrl = '{{path_for('getCustomFilter')}}';
\t\t\t\t\$.ajax({
\t\t\t        type: \"POST\",
\t\t\t        url: actionUrl,
\t\t\t        data: {filterId:filterId},
\t\t\t        success: function(data)
\t\t\t        {
\t\t\t        \tif(data.success) {
\t\t\t        \t\tvar filterValues = data.filterData.customFilterValue;
\t\t\t        \t\t\$('#customFilterName').val(data.filterData.customFilterName)
\t\t\t        \t\t\$('#customFilterId').val(filterId);
\t\t\t        \t\t
\t\t\t        \t\tvar inc;
\t\t\t        \t\tvar customFilterValue = '';
\t\t\t        \t\t\$(\"#customFilterValueShow\").html(customFilterValue)
\t\t\t        \t\tfor(inc = 0; inc < filterValues.length; inc++) {
\t\t\t        \t\t\tvar numCount = inc+1;
\t\t\t        \t\t\tcustomFilterValue = `<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t    <label for=\"customFilterValue\${numCount}\">Custom filter value \${numCount}</label>
\t\t\t\t\t\t\t\t\t    <input type=\"text\" class=\"form-control\" name=\"customFilterValue[]\" id=\"customFilterValue\${numCount}\" value=\"\${filterValues[inc]}\" placeholder=\"Value\">
\t\t\t\t\t\t\t\t\t</div>`;
\t\t\t\t\t\t\t\t\$(\"#customFilterValueShow\").append(customFilterValue)
\t\t\t        \t\t}
\t\t\t        \t\t
\t\t\t        \t\t\$('#customFilterModal').modal('show')
\t\t\t        \t}
\t\t\t        }
\t\t\t    })
\t\t\t\t
\t\t\t})

\t\t\t\$(document).on('click', '.deleteCustomFilter', function() {
\t\t\t\tif(confirm(\"Are you sure to delete the custom filter!\")) {
\t\t\t\t\tvar filterId = \$(this).attr('filterId');
\t\t\t\t\t\$(\"#cfilter-\"+filterId).remove();
\t\t\t\t}
\t\t\t})

\t\t\t\$(document).on('click', 'button.back-btn', function(e){
\t\t\t    e.preventDefault();
\t\t\t    window.history.back();
\t\t\t});
\t\t\t
\t\t\t
\t\t\t\t
\t  </script>

{% endblock %}
{% block scriptBlock %}
    
{% endblock %}

", "Org_1/Home/form.twig", "C:\\xampp\\htdocs\\pwc\\templates\\Org_1\\Home\\form.twig");
    }
}
